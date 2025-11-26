@extends('frontend.master')

@section('header')
    <link rel="stylesheet" href="{{ url('assets/css/cart.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url('assets/js/cart.js') }}" defer></script>
@endsection

@section('content')
    <!-- Cart Hero -->
    <section class="cart-hero">
        <div class="cart-container">
            <div class="cart-hero-content">
                <h1 class="cart-title">Your Cart</h1>
                <p class="cart-subtitle">Review items, edit quantities, and proceed to checkout.</p>
                <div class="cart-actions">
                    <a href="{{ route('marketplace') }}" class="btn-secondary">Continue Shopping</a>
                    <a href="{{ route('place-order') }}" class="btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Items -->
    <section class="cart-section">
        <div class="cart-container">
            @if(session('success'))
                <div class="notice notice-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="notice notice-error">{{ session('error') }}</div>
            @endif

            @if(empty($cart))
                <div class="empty-state">Your cart is empty.</div>
            @else
                <div class="cart-list">
                    @foreach($cart as $item)
                        <div class="cart-item">
                            <div class="cart-item-image">
                                @if($item['image'])
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                                @else
                                    <div class="image-fallback">No Image</div>
                                @endif
                            </div>
                            <div class="cart-item-info">
                                <div class="cart-item-header">
                                    <div>
                                        <div class="item-name">{{ $item['name'] }}</div>
                                        <div class="item-price">${{ number_format($item['price'], 2) }}</div>
                                    </div>
                                    <div class="item-subtotal">${{ number_format($item['price'] * $item['qty'], 2) }}</div>
                                </div>
                                <div class="cart-item-actions">
                                    <form action="{{ route('cart.update') }}" method="POST" class="qty-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <label class="qty-label" for="qty-{{ $item['id'] }}">Qty</label>
                                        <input id="qty-{{ $item['id'] }}" type="number" name="qty" min="1" value="{{ $item['qty'] }}" class="qty-input">
                                        <button type="submit" class="btn-primary btn-sm">Update</button>
                                    </form>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn-danger btn-sm">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="cart-summary">
                    <div class="cart-total">Total: ${{ number_format($total, 2) }}</div>
                    <a href="{{ route('place-order') }}" class="btn-primary">Proceed to Checkout</a>
                </div>
            @endif
        </div>
    </section>
@endsection