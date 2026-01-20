@extends('frontend.master')

@section('header')
    <link rel="stylesheet" href="{{ url('assets/css/marketplace.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="{{ url('assets/js/marketplace2.js') }}" defer></script> -->
    <script src="{{ url('assets/js/marketplace3.js') }}" defer></script>
@endsection

@section('content')
    <!-- Category Filter -->
    <section class="marketplace-filters">
        <div class="marketplace-container">
            @php
                $categoryNames = [];
                foreach ($products as $p) {
                    $orig = $p->category->name ?? null;
                    if ($orig) {
                        $slug = strtolower($orig);
                        $categoryNames[$slug] = $orig;
                    }
                }
            @endphp
            <div class="filter-header" style="display:flex; align-items:center; justify-content:space-between; margin-bottom: 12px;">
                <h2 class="filter-title" style="margin:0; font-size:20px; color:#0f172a;">Filter by Category</h2>
                <div class="marketplace-actions" style="margin-top:0;">
                    <a href="{{ route('cart.index') }}" class="btn-secondary">View Cart</a>
                    <a href="{{ route('place-order') }}" class="btn-primary">Checkout</a>
                </div>
            </div>
            <div class="filter-pills" role="tablist" aria-label="Product categories">
                <button type="button" class="filter-pill active" data-filter="all" aria-selected="true">All</button>
                @foreach($categoryNames as $slug => $name)
                    <button type="button" class="filter-pill" data-filter="{{ $slug }}" aria-selected="false">{{ $name }}</button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Marketplace Grid -->
    <section class="marketplace-section">
        <div class="marketplace-container">
            @if(session('success'))
                <div class="notice notice-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="notice notice-error">{{ session('error') }}</div>
            @endif

            <div class="product-grid">
                @forelse($products as $product)
                    <div class="product-card"
                         data-category="{{ strtolower($product->category->name ?? 'general') }}"
                         data-product-id="{{ $product->id }}"
                         data-select-size="{{ $product->select_size ? '1' : '0' }}"
                         data-select-color="{{ $product->select_color ? '1' : '0' }}"
                         data-select-design-placement="{{ $product->select_design_placement ? '1' : '0' }}"
                         data-upload-design="{{ $product->upload_design ? '1' : '0' }}">
                        @php
                            $imagePaths = [];
                            if ($product->image) {
                                $imagePaths[] = $product->image;
                            }
                            if ($product->images && $product->images->count()) {
                                foreach ($product->images as $img) {
                                    if ($img->image) {
                                        $imagePaths[] = $img->image;
                                    }
                                }
                            }
                        @endphp
                        <div class="product-image">
                            @if(count($imagePaths))
                                <div class="product-image-inner">
                                    <div class="product-image-main">
                                        <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $imagePaths[0] }}" alt="{{ $product->name }}">
                                    </div>
                                    @if(count($imagePaths) > 1)
                                        <div class="product-thumbnails" aria-hidden="true">
                                            @foreach($imagePaths as $idx => $path)
                                                <button type="button" class="product-thumbnail{{ $idx === 0 ? ' is-active' : '' }}" data-src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $path }}">
                                                    <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $path }}" alt="">
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="product-image-fallback">No Image</div>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-header">
                                <h2 style="font-size:15px" class="product-name">{{ $product->name }}</h2>
                                <span class="product-price">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <p class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</p>
                        </div>
                        <div class="product-actions" data-add-url="{{ route('cart.add') }}" data-update-url="{{ route('cart.update') }}" data-remove-url="{{ route('cart.remove') }}">
                            @php $inCart = isset($cartMap[$product->id]); $qty = $inCart ? $cartMap[$product->id] : 0; @endphp
                            <div class="action-add" @if($inCart) style="display:none" @else style="display:flex" @endif>
                                <button type="button" class="btn-primary btn-add">Add</button>
                            </div>
                            <div class="qty-controls" @if($inCart) style="display:flex" @else style="display:none" @endif aria-live="polite">
                                <button type="button" class="btn-secondary btn-minus" aria-label="Decrease quantity">−</button>
                                <span class="qty-count" data-qty="{{ $qty }}">{{ $qty }}</span>
                                <button type="button" class="btn-secondary btn-plus" aria-label="Increase quantity">+</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">No products available.</div>
                @endforelse
            </div>

            <div class="pagination">{{ $products->links() }}</div>
        </div>
    </section>

    <!-- Apparel Options Modal -->
    <div id="apparel-modal" class="modal" aria-hidden="true">
        <div class="modal-dialog" role="dialog" aria-modal="true" aria-labelledby="apparelModalTitle">
            <div class="modal-header">
                <h3 id="apparelModalTitle">Customize Your Apparel</h3>
                <button type="button" class="modal-close" aria-label="Close">&times;</button>
            </div>
            <form id="apparel-form">
                <div class="modal-body">
                    <div class="form-group" id="group-select-color">
                        <label for="apparel-color">Color</label>
                        <div class="color-select-row">
                            <select id="apparel-color" name="color">
                                <option value="">Select color</option>
                                <option value="black" style="background-color:#000;color:#fff;">Black</option>
                                <option value="white" style="background-color:#fff;color:#111;">White</option>
                                <option value="red" style="background-color:#ef4444;color:#fff;">Red</option>
                                <option value="blue" style="background-color:#3b82f6;color:#fff;">Blue</option>
                                <option value="green" style="background-color:#22c55e;color:#fff;">Green</option>
                                <option value="other">Other</option>
                            </select>
                            <span id="color-swatch" class="color-swatch" aria-hidden="true"></span>
                        </div>
                        <div class="mt-2" id="color-other-group" style="display:none;">
                            <input type="text" id="apparel-color-other" class="" placeholder="Enter custom color">
                        </div>
                    </div>
                    <div class="form-group" id="group-select-size">
                        <label for="apparel-size">Size</label>
                        <select id="apparel-size" name="size">
                            <option value="">Select size</option>
                            <option value="Toddler 2-3yrs">Toddler 2-3yrs</option>
                            <option value="Toddler 4-5yrs">Toddler 4-5yrs</option>
                            <option value="Youth 6-7yrs">Youth 6-7yrs</option>
                            <option value="Youth 8-9yrs">Youth 8-9yrs</option>
                            <option value="Youth 10-11yrs">Youth 10-11yrs</option>
                            <option value="Youth 12-13yrs">Youth 12-13yrs</option>
                            <option value="Youth 14-15yrs">Youth 14-15yrs</option>
                            <option value="Adult S">Adult S</option>
                            <option value="Adult M">Adult M</option>
                            <option value="Adult L">Adult L</option>
                            <option value="Adult XL">Adult XL</option>
                            <option value="Adult 2XL">Adult 2XL</option>
                        </select>
                    </div>
                    <div class="form-group" id="group-select-placement">
                        <label for="apparel-placements">Design Placement</label>
                        <select id="apparel-placements" name="placements[]" multiple>
                            <option value="front_center">Front center</option>
                            <option value="front_left">Front left</option>
                            <option value="front_right">Front right</option>
                            <option value="back">Back placement</option>
                            <option value="right_sleeve">Right sleeve</option>
                            <option value="left_sleeve">Left sleeve</option>
                        </select>
                        <small class="help-text">Hold Ctrl/Cmd to select multiple</small>
                    </div>
                    <div class="form-group" id="design-upload-group" style="display: none;">
                        <label>Upload Design Files (optional)</label>
                        <div class="design-upload-row">
                            <div class="design-upload-col">
                                <span>Front</span>
                                <input id="apparel-design" type="file" name="design_file" accept=".jpg,.jpeg,.png,.pdf,.ai,.psd">
                            </div>
                            <div class="design-upload-col">
                                <span>Back</span>
                                <input id="apparel-back-design" type="file" name="back_design" accept=".jpg,.jpeg,.png,.pdf,.ai,.psd">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary modal-cancel">Cancel</button>
                    <button type="submit" class="btn-primary">Add to Cart</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Simple notification container -->
    <div id="notify" class="notify" aria-live="polite" aria-atomic="true"></div>

    <!-- Fixed Checkout CTA Bar -->
    @php $hasItems = !empty($cartMap); @endphp
    <div id="cart-cta-bar" class="cart-cta-bar {{ $hasItems ? 'is-visible' : '' }}" data-checkout-url="{{ route('place-order') }}" aria-live="polite">
        <div class="cart-cta-content">
            <span class="cart-cta-text">You have items in your cart.</span>
            <a href="{{ route('place-order') }}" class="btn-primary cart-cta-button">Proceed to Checkout</a>
        </div>
    </div>

@endsection
