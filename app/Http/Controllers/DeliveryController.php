<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $delivery = Delivery::first();
        if (!$delivery) {
            $delivery = Delivery::create(['price' => 0]);
        }
        return view('admin.delivery.index', compact('delivery'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $delivery = Delivery::first();
        if (!$delivery) {
            $delivery = Delivery::create(['price' => 0]);
        }

        $delivery->price = $validated['price'];
        $delivery->save();

        return redirect()->route('admin.delivery')->with('success', 'Delivery price updated successfully');
    }
}