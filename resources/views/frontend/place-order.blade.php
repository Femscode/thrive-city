@extends('frontend.master')

@section('header')
    <link rel="stylesheet" href="{{ url('assets/css/checkout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Checkout</h1>
                <p>Review your cart and enter your details to complete your order</p>
            </div>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-section">
        <div class="container">
            @php($cart = session('cart', []))
            @if(empty($cart))
                <div class="empty-cart">
                    <p>Your cart is currently empty.</p>
                    <a href="{{ route('marketplace') }}" class="btn-primary">Go to Marketplace</a>
                </div>
            @else
            <div class="checkout-grid">
                <div class="checkout-summary">
                    <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                    <div class="summary-list">
                        @php($total = 0)
                        @foreach($cart as $item)
                            @php($subtotal = $item['price'] * $item['qty'])
                            @php($total += $subtotal)
                            <div class="summary-row">
                                <div class="summary-info">
                                    <div class="summary-name">{{ $item['name'] }}</div>
                                    <div class="summary-meta">
                                        <span>Qty: {{ $item['qty'] }}</span>
                                        @if(!empty($item['color']))<span>• Color: {{ ucfirst($item['color']) }}</span>@endif
                                        @if(!empty($item['placements']))<span>• Placement: {{ is_array($item['placements']) ? implode(', ', $item['placements']) : $item['placements'] }}</span>@endif
                                    </div>
                                </div>
                                <div class="summary-price">${{ number_format($subtotal, 2) }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="summary-row">
                        <div class="summary-info"><div class="summary-name">Subtotal</div></div>
                        <div class="summary-price">${{ number_format($total, 2) }}</div>
                    </div>
                    <div class="summary-row">
                        <div class="summary-info"><div class="summary-name">Delivery</div></div>
                        <div class="summary-price">${{ number_format($deliveryPrice ?? 0, 2) }}</div>
                    </div>
                    <div class="summary-total">
                        <span>Grand Total</span>
                        <span class="total-amount">${{ number_format(($total + ($deliveryPrice ?? 0)), 2) }}</span>
                    </div>
                </div>

                <div class="checkout-form">
                    <h2><i class="fas fa-user"></i> Customer Information</h2>
                    <form id="checkoutForm" action="{{ route('payment.checkout') }}" method="POST">
                        @csrf
                        <div class="form-grid">
                            <div class="input-group">
                                <label for="customer_name">Full Name *</label>
                                <input type="text" id="customer_name" name="customer_name" required>
                            </div>
                            <div class="input-group">
                                <label for="customer_email">Email Address *</label>
                                <input type="email" id="customer_email" name="customer_email" required>
                            </div>
                            <div class="input-group">
                                <label for="customer_phone">Phone Number</label>
                                <input type="tel" id="customer_phone" name="customer_phone">
                            </div>
                            <div class="input-group">
                                <label for="customer_address">Full Address </label>
                                <input id="customer_address" name="customer_address">
                            </div>
                        </div>
                        <div class="input-group full-width">
                            <label for="special_instructions">Special Instructions</label>
                            <textarea id="special_instructions" name="special_instructions" rows="4" placeholder="Any special requirements or notes for your order..."></textarea>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="submit-btn">
                                <i class="fas fa-paper-plane"></i>
                                Place Order
                            </button>
                            <p class="submit-note">We will contact you within 24 hours.</p>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </section>

    <script>
        var formEl = document.getElementById('checkoutForm');
        if (formEl) {
            formEl.addEventListener('submit', function(e) {
                e.preventDefault();
                var name = document.getElementById('customer_name').value.trim();
                var email = document.getElementById('customer_email').value.trim();
                if (!name || !email) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing Information',
                        text: 'Please fill in your name and email.',
                        confirmButtonColor: '#390466'
                    });
                    return;
                }

                Swal.fire({
                    title: 'Placing Order...',
                    text: 'Please wait while we process your request.',
                    allowOutsideClick: false,
                    didOpen: function () { Swal.showLoading(); }
                });

                var fd = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    body: fd,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                }).then(function(r) { return r.json(); }).then(function(data) {
                    if (data && data.success && data.url) {
                        // Redirect to Stripe Checkout
                        window.location.href = data.url;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Payment Initialization Failed',
                            text: (data && data.message) ? data.message : 'There was an error initializing payment. Please try again.',
                            confirmButtonColor: '#390466'
                        });
                    }
                }).catch(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error',
                        text: 'There was a problem connecting to the server. Please try again.',
                        confirmButtonColor: '#390466'
                    });
                });
            });
        }
    </script>
@endsection