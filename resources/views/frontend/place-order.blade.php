@extends('frontend.master')

@section('header')
    <link rel="stylesheet" href="{{ url('assets/css/place-order.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Place Your Order</h1>
                <p>Create custom merchandise that makes your brand unforgettable</p>
            </div>
        </div>
    </section>

    <!-- Order Form Section -->
    <section class="order-form-section">
        <div class="container">
            <form class="order-form" id="orderForm" action="{{ route('submit-order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Product Selection -->
                <div class="form-section">
                    <h2><i class="fas fa-tshirt"></i> Select Product Type</h2>
                    <div class="product-grid">
                        <div class="product-option" data-product="tshirt">
                            <div class="product-card">
                                <div class="product-icon">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <h3>T-Shirts</h3>
                                <p>Premium quality cotton tees</p>
                                <input type="radio" name="product_type" value="tshirt" id="product_tshirt">
                                <label for="product_tshirt" class="radio-label"></label>
                            </div>
                        </div>
                        <div class="product-option" data-product="sweatshirt">
                            <div class="product-card">
                                <div class="product-icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <h3>Sweatshirts</h3>
                                <p>Comfortable fleece sweatshirts</p>
                                <input type="radio" name="product_type" value="sweatshirt" id="product_sweatshirt">
                                <label for="product_sweatshirt" class="radio-label"></label>
                            </div>
                        </div>
                        <div class="product-option" data-product="hoodie">
                            <div class="product-card">
                                <div class="product-icon">
                                    <i class="fas fa-hood"></i>
                                </div>
                                <h3>Hoodies</h3>
                                <p>Cozy hooded sweatshirts</p>
                                <input type="radio" name="product_type" value="hoodie" id="product_hoodie">
                                <label for="product_hoodie" class="radio-label"></label>
                            </div>
                        </div>
                        <div class="product-option" data-product="founders_bundle">
                            <div class="product-card">
                                <div class="product-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <h3>Founders Bundle</h3>
                                <p>Founders T-shirt + Hat combo</p>
                                <input type="radio" name="product_type" value="founders_bundle" id="product_founders_bundle">
                                <label for="product_founders_bundle" class="radio-label"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- T-Shirt Type Selection (shown when T-shirt is selected) -->
                <div class="form-section tshirt-types" id="tshirtTypes" style="display: none;">
                    <h2><i class="fas fa-layer-group"></i> Select T-Shirt Type</h2>
                    <div class="type-grid">
                        <div class="type-option">
                            <div class="type-card">
                                <h3>Type 1</h3>
                                <p>Classic fit, standard cotton</p>
                                <input type="radio" name="tshirt_type" value="type1" id="type1">
                                <label for="type1" class="radio-label"></label>
                            </div>
                        </div>
                        <div class="type-option">
                            <div class="type-card">
                                <h3>Type 2</h3>
                                <p>Slim fit, premium blend</p>
                                <input type="radio" name="tshirt_type" value="type2" id="type2">
                                <label for="type2" class="radio-label"></label>
                            </div>
                        </div>
                        <div class="type-option">
                            <div class="type-card">
                                <h3>Type 3 (Founders)</h3>
                                <p>Premium founders edition</p>
                                <input type="radio" name="tshirt_type" value="founders" id="founders">
                                <label for="founders" class="radio-label"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Size Selection -->
                <div class="form-section">
                    <h2><i class="fas fa-ruler"></i> Select Size</h2>
                    <div class="size-grid">
                        <div class="size-option">
                            <input type="radio" name="size" value="S" id="size_s">
                            <label for="size_s" class="size-label">S</label>
                        </div>
                        <div class="size-option">
                            <input type="radio" name="size" value="M" id="size_m">
                            <label for="size_m" class="size-label">M</label>
                        </div>
                        <div class="size-option">
                            <input type="radio" name="size" value="L" id="size_l">
                            <label for="size_l" class="size-label">L</label>
                        </div>
                        <div class="size-option">
                            <input type="radio" name="size" value="XL" id="size_xl">
                            <label for="size_xl" class="size-label">XL</label>
                        </div>
                        <div class="size-option">
                            <input type="radio" name="size" value="2XL" id="size_2xl">
                            <label for="size_2xl" class="size-label">2XL</label>
                        </div>
                        <div class="size-option">
                            <input type="radio" name="size" value="3XL" id="size_3xl">
                            <label for="size_3xl" class="size-label">3XL</label>
                        </div>
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="form-section">
                    <h2><i class="fas fa-palette"></i> Select Color</h2>
                    <div class="color-grid">
                        <div class="color-option">
                            <input type="radio" name="color" value="black" id="color_black">
                            <label for="color_black" class="color-label" style="background-color: #000000;"></label>
                            <span>Black</span>
                        </div>
                        <div class="color-option">
                            <input type="radio" name="color" value="white" id="color_white">
                            <label for="color_white" class="color-label" style="background-color: #ffffff; border: 2px solid #ddd;"></label>
                            <span>White</span>
                        </div>
                        <div class="color-option">
                            <input type="radio" name="color" value="navy" id="color_navy">
                            <label for="color_navy" class="color-label" style="background-color: #1a237e;"></label>
                            <span>Navy</span>
                        </div>
                        <div class="color-option">
                            <input type="radio" name="color" value="gray" id="color_gray">
                            <label for="color_gray" class="color-label" style="background-color: #757575;"></label>
                            <span>Gray</span>
                        </div>
                        <div class="color-option">
                            <input type="radio" name="color" value="red" id="color_red">
                            <label for="color_red" class="color-label" style="background-color: #d32f2f;"></label>
                            <span>Red</span>
                        </div>
                        <div class="color-option">
                            <input type="radio" name="color" value="blue" id="color_blue">
                            <label for="color_blue" class="color-label" style="background-color: #1976d2;"></label>
                            <span>Blue</span>
                        </div>
                    </div>
                </div>

                <!-- Design Placement Options -->
                <div class="form-section">
                    <h2><i class="fas fa-crosshairs"></i> Select Design Placement (Choose Multiple)</h2>
                    <div class="placement-grid">
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot front-chest"></div>
                                    </div>
                                </div>
                                <h3>Front Chest</h3>
                                <p>Left chest area placement</p>
                                <input type="checkbox" name="placements[]" value="front_chest" id="placement_front_chest">
                                <label for="placement_front_chest" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot pocket"></div>
                                    </div>
                                </div>
                                <h3>Pocket Placement</h3>
                                <p>Small pocket area design</p>
                                <input type="checkbox" name="placements[]" value="pocket" id="placement_pocket">
                                <label for="placement_pocket" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline back">
                                        <div class="placement-dot back-center"></div>
                                    </div>
                                </div>
                                <h3>Back Placement</h3>
                                <p>Center back design</p>
                                <input type="checkbox" name="placements[]" value="back" id="placement_back">
                                <label for="placement_back" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot right-sleeve-upper"></div>
                                    </div>
                                </div>
                                <h3>Right Sleeve Upper</h3>
                                <p>Upper right sleeve area</p>
                                <input type="checkbox" name="placements[]" value="right_sleeve_upper" id="placement_right_sleeve_upper">
                                <label for="placement_right_sleeve_upper" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot left-sleeve-lower"></div>
                                    </div>
                                </div>
                                <h3>Left Sleeve Lower</h3>
                                <p>Lower left sleeve area</p>
                                <input type="checkbox" name="placements[]" value="left_sleeve_lower" id="placement_left_sleeve_lower">
                                <label for="placement_left_sleeve_lower" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot front-center"></div>
                                    </div>
                                </div>
                                <h3>Front Center</h3>
                                <p>Large front center design</p>
                                <input type="checkbox" name="placements[]" value="front_center" id="placement_front_center">
                                <label for="placement_front_center" class="checkbox-label"></label>
                            </div>
                        </div>
                        <div class="placement-option">
                            <div class="placement-card">
                                <div class="placement-visual">
                                    <div class="tshirt-outline">
                                        <div class="placement-dot front-bottom"></div>
                                    </div>
                                </div>
                                <h3>Front Bottom</h3>
                                <p>Lower front hem area</p>
                                <input type="checkbox" name="placements[]" value="front_bottom" id="placement_front_bottom">
                                <label for="placement_front_bottom" class="checkbox-label"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Design Upload -->
                <div class="form-section">
                    <h2><i class="fas fa-upload"></i> Upload Your Design</h2>
                    <div class="upload-area" id="uploadArea">
                        <div class="upload-content">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h3>Drag & Drop Your Design Here</h3>
                            <p>or click to browse files</p>
                            <span class="file-types">Supported: PNG, JPG, SVG, PDF (Max 10MB)</span>
                        </div>
                        <input type="file" id="designFile" name="design_file" accept=".png,.jpg,.jpeg,.svg,.pdf">
                    </div>
                    <div class="uploaded-files" id="uploadedFiles"></div>
                </div>

                <!-- Customer Information -->
                <div class="form-section">
                    <h2><i class="fas fa-user"></i> Customer Information</h2>
                    <div class="customer-info-grid">
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
                            <label for="quantity">Quantity *</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                        </div>
                    </div>
                    <div class="input-group full-width">
                        <label for="special_instructions">Special Instructions</label>
                        <textarea id="special_instructions" name="special_instructions" rows="4" placeholder="Any special requirements or notes for your order..."></textarea>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="form-section">
                    <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                    <div class="order-summary" id="orderSummary">
                        <div class="summary-item">
                            <span>Product:</span>
                            <span id="summaryProduct">Please select a product</span>
                        </div>
                        <div class="summary-item" id="summaryTshirtType" style="display: none;">
                            <span>T-Shirt Type:</span>
                            <span id="summaryTshirtTypeValue">-</span>
                        </div>
                        <div class="summary-item">
                            <span>Size:</span>
                            <span id="summarySize">Please select a size</span>
                        </div>
                        <div class="summary-item">
                            <span>Color:</span>
                            <span id="summaryColor">Please select a color</span>
                        </div>
                        <div class="summary-item">
                            <span>Placements:</span>
                            <span id="summaryPlacements">Please select placement(s)</span>
                        </div>
                        <div class="summary-item">
                            <span>Quantity:</span>
                            <span id="summaryQuantity">1</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-section">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Submit Order Request
                    </button>
                    <p class="submit-note">We'll contact you within 24 hours with a detailed quote and timeline.</p>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Product type selection handler
        document.querySelectorAll('input[name="product_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const tshirtTypes = document.getElementById('tshirtTypes');
                if (this.value === 'tshirt') {
                    tshirtTypes.style.display = 'block';
                } else {
                    tshirtTypes.style.display = 'none';
                    // Clear t-shirt type selection
                    document.querySelectorAll('input[name="tshirt_type"]').forEach(r => r.checked = false);
                }
                updateOrderSummary();
            });
        });

        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('designFile');
        const uploadedFiles = document.getElementById('uploadedFiles');

        uploadArea.addEventListener('click', () => fileInput.click());
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('drag-over');
        });
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('drag-over');
        });
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('drag-over');
            const droppedFiles = e.dataTransfer.files;
            handleFiles(droppedFiles);
            // Ensure dropped files are actually submitted with the form
            // by assigning them to the file input using DataTransfer
            if (droppedFiles && droppedFiles.length > 0) {
                const dt = new DataTransfer();
                // Only one file is expected by backend; take the first
                dt.items.add(droppedFiles[0]);
                fileInput.files = dt.files;
            }
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            uploadedFiles.innerHTML = '';
            if (!files || files.length === 0) return;
            const file = files[0];
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item';
            fileItem.innerHTML = `
                <i class="fas fa-file"></i>
                <span>${file.name}</span>
                <span class="file-size">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
            `;
            uploadedFiles.appendChild(fileItem);
        }

        // Prevent click bubbling to avoid accidental re-opening after selection
        fileInput.addEventListener('click', (e) => e.stopPropagation());

        // Order summary update
        function updateOrderSummary() {
            const product = document.querySelector('input[name="product_type"]:checked');
            const tshirtType = document.querySelector('input[name="tshirt_type"]:checked');
            const size = document.querySelector('input[name="size"]:checked');
            const color = document.querySelector('input[name="color"]:checked');
            const placements = document.querySelectorAll('input[name="placements[]"]:checked');
            const quantity = document.getElementById('quantity').value;

            document.getElementById('summaryProduct').textContent = product ? product.value.replace('_', ' ').toUpperCase() : 'Please select a product';
            
            const tshirtTypeSection = document.getElementById('summaryTshirtType');
            if (product && product.value === 'tshirt' && tshirtType) {
                tshirtTypeSection.style.display = 'flex';
                document.getElementById('summaryTshirtTypeValue').textContent = tshirtType.value.replace('_', ' ').toUpperCase();
            } else {
                tshirtTypeSection.style.display = 'none';
            }

            document.getElementById('summarySize').textContent = size ? size.value : 'Please select a size';
            document.getElementById('summaryColor').textContent = color ? color.value.toUpperCase() : 'Please select a color';
            
            const placementTexts = Array.from(placements).map(p => p.value.replace('_', ' ').toUpperCase());
            document.getElementById('summaryPlacements').textContent = placementTexts.length > 0 ? placementTexts.join(', ') : 'Please select placement(s)';
            
            document.getElementById('summaryQuantity').textContent = quantity;
        }

        // Add event listeners for all form inputs
        document.querySelectorAll('input, select, textarea').forEach(input => {
            input.addEventListener('change', updateOrderSummary);
            input.addEventListener('input', updateOrderSummary);
        });

        // Form submission
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const product = document.querySelector('input[name="product_type"]:checked');
            const size = document.querySelector('input[name="size"]:checked');
            const color = document.querySelector('input[name="color"]:checked');
            const placements = document.querySelectorAll('input[name="placements[]"]:checked');
            const name = document.getElementById('customer_name').value;
            const email = document.getElementById('customer_email').value;

            if (!product || !size || !color || placements.length === 0 || !name || !email) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please fill in all required fields and make all necessary selections.',
                    confirmButtonColor: '#390466'
                });
                return;
            }

            // If t-shirt is selected, check for t-shirt type
            if (product.value === 'tshirt') {
                const tshirtType = document.querySelector('input[name="tshirt_type"]:checked');
                if (!tshirtType) {
                    Swal.fire({
                        icon: 'error',
                        title: 'T-shirt Type Required',
                        text: 'Please select a t-shirt type.',
                        confirmButtonColor: '#390466'
                    });
                    return;
                }
            }

            // Show loading
            Swal.fire({
                title: 'Submitting Order...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Submit form via AJAX
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Submitted!',
                        text: data.message,
                        confirmButtonColor: '#390466'
                    }).then(() => {
                        // Reset form
                        this.reset();
                        updateOrderSummary();
                        // Reset all visual selections
                        document.querySelectorAll('.product-option, .tshirt-option, .size-option, .color-option, .placement-option').forEach(el => {
                            el.classList.remove('selected');
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: data.message || 'There was an error submitting your order. Please try again.',
                        confirmButtonColor: '#390466'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'There was a problem connecting to the server. Please check your internet connection and try again.',
                    confirmButtonColor: '#390466'
                });
            });
        });

        // Initialize order summary
        updateOrderSummary();
    </script>
@endsection