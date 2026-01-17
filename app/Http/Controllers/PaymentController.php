<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as LaravelSession;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Admin payments overview placeholder (existing route references this).
     */
    public function index(Request $request)
    {
        $defaultFrom = now()->subDays(30)->toDateString();
        $defaultTo = now()->toDateString();

        $fromInput = $request->query('from', $defaultFrom);
        $toInput = $request->query('to', $defaultTo);

        $from = Carbon::parse($fromInput)->startOfDay();
        $to = Carbon::parse($toInput)->endOfDay();

        // Paid orders in range
        $paidOrdersQuery = OrderRequest::where('status', 'paid')
            ->whereBetween('created_at', [$from, $to]);

        // Total sales = sum of item price * qty for paid orders
        $totalSales = OrderItem::whereIn('order_request_id', $paidOrdersQuery->pluck('id'))
            ->select(DB::raw('COALESCE(SUM(price * qty), 0) as total'))
            ->value('total');

        // Paid orders per day
        $ordersPerDay = OrderRequest::where('status', 'paid')
            ->whereBetween('created_at', [$from, $to])
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as day'), DB::raw('COUNT(*) as count'))
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->get();

        $days = $ordersPerDay->pluck('day');
        $counts = $ordersPerDay->pluck('count');

        return view('admin.payments.index', [
            'from' => $from->toDateString(),
            'to' => $to->toDateString(),
            'totalSales' => number_format((float) $totalSales, 2),
            'days' => $days,
            'counts' => $counts,
        ]);
    }

    /**
     * Create a Stripe Checkout Session for the current cart and customer info.
     */
    public function createCheckoutSession(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:255',
            'special_instructions' => 'nullable|string|max:1000',
        ]);

        $cart = $request->session()->get('cart', []);
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty. Please add items before checkout.'
            ], 422);
        }

        // Create a single OrderRequest (status pending)
        $order = OrderRequest::create([
            'product_type' => 'mixed',
            'tshirt_type' => null,
            'size' => null,
            'color' => null,
            'placements' => null,
            'design_file' => null,
            'back_design' => null,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'] ?? null,
            'customer_address' => $validated['customer_address'] ?? null,
            'special_instructions' => $validated['special_instructions'] ?? null,
            'status' => 'pending',
        ]);

        // Persist each cart item as an OrderItem
        foreach ($cart as $item) {
            OrderItem::create([
                'order_request_id' => $order->id,
                'product_id' => $item['id'] ?? null,
                'product_name' => $item['name'] ?? 'Item',
                'product_type' => $item['product_type'] ?? 'general',
                'size' => $item['size'] ?? null,
                'color' => $item['color'] ?? null,
                'placements' => $item['placements'] ?? null,
                'design_file' => $item['design_file'] ?? null,
                'back_design' => $item['back_design'] ?? null,
                'price' => $item['price'] ?? 0,
                'qty' => $item['qty'] ?? 1,
            ]);
        }

        // Prepare line items for Stripe Checkout
        $lineItems = [];
        foreach ($cart as $item) {
            $unitAmount = (int) round(($item['price'] ?? 0) * 100);
            $qty = (int) ($item['qty'] ?? 1);
            $name = $item['name'] ?? 'Item';
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => [
                        'name' => $name,
                    ],
                    'unit_amount' => $unitAmount,
                ],
                'quantity' => max(1, $qty),
            ];
        }

        // Include delivery as a separate line item if present
        $deliveryPrice = optional(\App\Models\Delivery::first())->price ?? 0;
        if ($deliveryPrice > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => ['name' => 'Delivery'],
                    'unit_amount' => (int) round($deliveryPrice * 100),
                ],
                'quantity' => 1,
            ];
        }

        // Create Stripe Checkout Session
        $secretKey = env('STRIPE_PRIVATE_KEY');
        if (!$secretKey) {
            return response()->json([
                'success' => false,
                'message' => 'Stripe configuration error: missing secret key.'
            ], 500);
        }

        \Stripe\Stripe::setApiKey($secretKey);
        try {
            $session = \Stripe\Checkout\Session::create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'customer_email' => $validated['customer_email'],
                'metadata' => [
                    'order_id' => (string) $order->id,
                    'customer_name' => $validated['customer_name'],
                ],
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to initiate payment. Please try again later.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'url' => $session->url,
        ]);
    }

    /**
     * Handle success return from Stripe Checkout.
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        if (!$sessionId) {
            return redirect()->route('marketplace')->with('error', 'Missing payment session.');
        }

        $secretKey = env('STRIPE_PRIVATE_KEY');
        \Stripe\Stripe::setApiKey($secretKey);
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
        } catch (\Throwable $e) {
            Log::error('Stripe retrieve error: ' . $e->getMessage());
            return redirect()->route('marketplace')->with('error', 'Unable to verify payment.');
        }

        // Confirm payment status and update order
        if ($session && (isset($session->payment_status) && $session->payment_status === 'paid')) {
            $metadata = $session->metadata ?? null;
            if ($metadata && !empty($metadata['order_id'])) {
                $orderId = (int) $metadata['order_id'];
                if ($orderId) {
                    OrderRequest::where('id', $orderId)->update(['status' => 'paid']);
                }
            }
            // Clear cart after successful payment
            $request->session()->forget('cart');
            return view('frontend.payment-success');
        }

        return redirect()->route('place-order')->with('error', 'Payment not completed.');
    }

    /**
     * Thank You page for previewing the success UI without Stripe.
     */
    public function thankYou()
    {
        return view('frontend.payment-success');
    }

    /**
     * Handle cancel return from Stripe Checkout.
     */
    public function cancel()
    {
        return redirect()->route('place-order')->with('error', 'Payment was canceled. You can try again.');
    }

    public function webhook(Request $request)
    {
        // The incoming Stripe webhook payload
        $payload = $request->all();

        // JSON format for readability
        $content = "[" . now() . "] " . json_encode($payload, JSON_PRETTY_PRINT) . "\n\n";

        // Build the file path (same folder as this controller)
        $filePath = __DIR__ . '/stripe_webhook_logs.txt';

        // Append to file (create if not exists)
        file_put_contents($filePath, $content, FILE_APPEND);

        // Return simple response
        return response()->json(['status' => 'received'], 200);
    }
}
