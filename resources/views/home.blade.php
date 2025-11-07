<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThriveCity Studio - Thoughtful Design For Your Brand</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="icon" href="{{ url('assets/images/fav.png') }}" type="image/x-icon">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/home.css') }}">
</head>

<body>
    <!-- Header/Navigation -->
    <header class="header">
        <nav class="nav-container">
            <div class="nav-content">
                <!-- Logo -->
                <div class="logo">
                    <img src="{{ url('assets/images/logo1.png') }}" width="150px" alt="ThriveCity Studio Logo">
                </div>

                <!-- Navigation Menu -->
                <div class="nav-menu desktop">
                    <a href="#" class="nav-link active">Home</a>
                    <a href="#" class="nav-link">Services</a>
                    <a href="#" class="nav-link">Portfolio</a>
                    <a href="#" class="nav-link">About Us</a>
                </div>

                <!-- Contact Button -->
                <div class="nav-menu desktop">
                    <a href="#" class="contact-btn">Contact Us</a>
                </div>

                <!-- Mobile menu button -->
                <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu" id="mobileMenu">
                <div class="mobile-menu-content">
                    <div class="mobile-menu-header">
                        <div class="logo">
                            <img src="{{ url('assets/images/logo1.png') }}" width="120px" alt="ThriveCity Studio Logo">
                        </div>
                        <button class="mobile-menu-close" onclick="toggleMobileMenu()">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mobile-menu-links">
                        <a href="#" class="mobile-nav-link active">Home</a>
                        <a href="#" class="mobile-nav-link">Services</a>
                        <a href="#" class="mobile-nav-link">Portfolio</a>
                        <a href="#" class="mobile-nav-link">About Us</a>
                        <a href="#" class="mobile-contact-btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-grid">
                <!-- Hero Content -->
                <div class="hero-content">
                    <!-- Feature Tags -->
                    <div class="feature-tags">
                        <div class="feature-tag">
                            <div class="feature-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Custom Design Solutions</span>
                        </div>
                        <div class="feature-tag">
                            <div class="feature-icon">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Brand Love & Loyalty Focus</span>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="hero-heading">
                        Crafting Visibility<br>
                        That Can't Be<br>
                        Missed.
                    </h1>

                    <!-- Description -->
                    <p class="hero-description">
                        At ThriveCity Studio, we specialize in designing thoughtful,
                        high-impact merchandise including journals, water bottles,
                        tote bags, apparel, and more that creates lasting
                        connections with your audience.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="cta-buttons">
                        <a href="#" class="btn-primary">Get A Quote</a>
                        <a href="#" class="btn-secondary">View Portfolio</a>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="hero-visual">
                    <div class="visual-container">
                        <!-- Background Pattern -->
                        <div class="visual-bg-pattern">
                            <svg viewBox="0 0 400 400" fill="none">
                                <circle cx="100" cy="100" r="50" stroke="white" stroke-width="2" />
                                <circle cx="300" cy="150" r="30" stroke="white" stroke-width="2" />
                                <circle cx="200" cy="300" r="40" stroke="white" stroke-width="2" />
                            </svg>
                        </div>

                        <!-- Product Mockups -->
                        <div class="product-mockups">
                            <img src="{{ url('assets/images/hero2.jpg') }}" width="500px" alt="Product Mockup">
                        </div>

                        <!-- Floating Elements -->
                        <div class="floating-element top-right"></div>
                        <div class="floating-element bottom-left"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Trusted Brands Section -->
    <section class="trusted-brands">
        <div class="trusted-brands-container">
            <div class="trusted-brands-content">
                <h2 class="trusted-brands-title">TRUSTED BY THOUSANDS OF BRANDS GLOBALLY</h2>

                <div class="brands-scroll-container">
                    <div class="brands-grid">
                        <!-- First set of brands -->
                        <div class="brand-logo">
                            <span class="brand-text celeste">Celeste</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text gourmet">Gourmet</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text synco">Synco</span>
                            <span class="brand-subtitle">LIVE</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text urban">Urban</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text gourmet">Gourmet</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text celeste">Celeste</span>
                        </div>

                        <!-- Duplicate set for seamless scrolling -->
                        <div class="brand-logo">
                            <span class="brand-text celeste">Celeste</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text gourmet">Gourmet</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text synco">Synco</span>
                            <span class="brand-subtitle">LIVE</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text urban">Urban</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text gourmet">Gourmet</span>
                        </div>
                        <div class="brand-logo">
                            <span class="brand-text celeste">Celeste</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-main">
        <div class="services-container">
            <div class="services-header">
                <span class="services-label">OUR SERVICES</span>
                <h2 class="services-title">Merchandise That Builds<br>Brand Connection</h2>
                <p class="services-description">
                    Discover our thoughtful design approach that creates<br>
                    meaningful merchandise - from custom journals and water<br>
                    bottles to branded tote bags and apparel that your<br>
                    customers will love.
                </p>
            </div>
        </div>
    </section>

    <!-- Custom Design Solutions Section -->
    <section class="custom-design-section">
        <div class="custom-design-container">
            <div class="custom-design-content">
                <!-- Image Side -->
                <div class="custom-design-image">
                    <div class="product-showcase">

                        <img src="{{ url('assets/images/hoodie.jpg') }}" width="300px" alt="Hoodie Mockup">

                    </div>
                </div>

                <!-- Content Side -->
                <div class="custom-design-text">
                    <h3 class="section-title">Custom Design Solutions</h3>
                    <p class="section-description">
                        We create unique, thoughtful merchandise designs<br>
                        tailored to your brand identity and values, ensuring<br>
                        every piece resonates with your audience.
                    </p>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Quality Materials</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Fast Turnaround</span>
                        </div>
                    </div>

                    <a href="#" class="cta-button">View Our Work</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand Experiences Section -->
    <section class="brand-experiences-section">
        <div class="brand-experiences-container">
            <div class="brand-experiences-content">
                <!-- Content Side -->
                <div class="brand-experiences-text">
                    <h3 class="section-title">Create Memorable Brand Experiences</h3>
                    <p class="section-description">
                        Design merchandise that tells your brand story and<br>
                        creates lasting connections with your audience through<br>
                        thoughtful, high-quality products.
                    </p>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Brand Storytelling</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Quality Products</span>
                        </div>
                    </div>

                    <a href="#" class="cta-button">View Our Portfolio</a>
                </div>

                <!-- Image Side -->
                <div class="brand-experiences-image">
                    <div class="tote-showcase">
                        <div class="tote-mockup">
                            <img src="{{ url('assets/images/bag.jpg') }}" width="300px" alt="Hoodie Mockup">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collaborate Section -->
    <section class="collaborate-section">
        <div class="collaborate-container">
            <div class="collaborate-content">
                <!-- Visual Side -->
                <div class="collaborate-visual">

                    <img src="{{ url('assets/images/hero1.jpg') }}" width="300px" alt="Hoodie Mockup">
                    <!-- Background Pattern -->


                </div>

                <!-- Content Side -->
                <div class="collaborate-text">
                    <h3 class="section-title">Collaborate With Creative Professionals</h3>
                    <p class="section-description">
                        Work with our experienced design team to bring your<br>
                        vision to life. We combine creativity, strategy, and<br>
                        craftsmanship to deliver exceptional results.
                    </p>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Expert Designers</span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <span class="feature-text">Creative Strategy</span>
                        </div>
                    </div>

                    <a href="#" class="cta-button">Start Your Project</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us-section">
        <div class="why-choose-us-container">
            <div class="why-choose-us-content">
                <!-- Left Content -->
                <div class="why-choose-us-text">
                    <span class="section-label">WHY CHOOSE US</span>
                    <h2 class="why-choose-us-title">Discover Why<br>ThriveCity Studio<br>Excels</h2>
                    <p class="why-choose-us-description">
                        We create thoughtful merchandise designs<br>
                        that build genuine connections between<br>
                        brands and their audiences, delivering<br>
                        exceptional quality and memorable<br>
                        experiences.
                    </p>
                    <a href="#" class="message-us-button">Message Us</a>
                </div>

                <!-- Right Features Grid -->
                <div class="features-grid">
                    <!-- Creative Excellence -->
                    <div class="feature-box">
                        <div class="feature-icon-container">
                            <div class="feature-icon creative-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="feature-title">Creative Excellence</h3>
                        <p class="feature-description">Award-winning designers creating innovative merchandise solutions.</p>
                    </div>

                    <!-- Brand Partnership -->
                    <div class="feature-box">
                        <div class="feature-icon-container">
                            <div class="feature-icon partnership-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="feature-title">Brand Partnership</h3>
                        <p class="feature-description">Dedicated collaboration to understand and amplify your brand identity.</p>
                    </div>

                    <!-- Premium Quality -->
                    <div class="feature-box">
                        <div class="feature-icon-container">
                            <div class="feature-icon quality-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 12l2 2 4-4"></path>
                                    <path d="M21 12c.552 0 1-.448 1-1V8a2 2 0 0 0-2-2h-5L9.414 0H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="feature-title">Premium Quality</h3>
                        <p class="feature-description">High-quality materials and craftsmanship in every product we create.</p>
                    </div>

                    <!-- Fast Delivery -->
                    <div class="feature-box">
                        <div class="feature-icon-container">
                            <div class="feature-icon delivery-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon points="13,2 3,14 12,14 11,22 21,10 12,10"></polygon>
                                </svg>
                            </div>
                        </div>
                        <h3 class="feature-title">Fast Delivery</h3>
                        <p class="feature-description">Quick turnaround times without compromising on design quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="testimonials-container">
            <div class="testimonials-content">
                <div class="testimonials-header">
                    <span class="section-label">TESTIMONIALS</span>
                    <h2 class="testimonials-title">What Our Clients Say</h2>
                    <p class="testimonials-subtitle">Hear from brands who've transformed their merchandise with ThriveCity Studio</p>
                </div>

                <div class="testimonials-carousel">
                <div class="carousel-wrapper">
                    <div class="testimonials-track" id="testimonialsTrack">
                        <!-- Testimonial 1 -->
                        <div class="testimonial-card active">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z" />
                                    </svg>
                                </div>
                                <p class="testimonial-text">
                                    "ThriveCity Studio completely transformed our brand merchandise. Their attention to detail and creative approach resulted in products our customers absolutely love."
                                </p>
                                <div class="testimonial-author">
                                    <div class="author-avatar">
                                        <div class="avatar-placeholder">SM</div>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">Sarah Mitchell</h4>
                                        <p class="author-title">Marketing Director, TechFlow</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z" />
                                    </svg>
                                </div>
                                <p class="testimonial-text">
                                    "The quality and creativity exceeded our expectations. Our branded merchandise has become a powerful tool for customer engagement and brand recognition."
                                </p>
                                <div class="testimonial-author">
                                    <div class="author-avatar">
                                        <div class="avatar-placeholder">DJ</div>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">David Johnson</h4>
                                        <p class="author-title">CEO, GreenLeaf Co.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="quote-icon">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z" />
                                    </svg>
                                </div>
                                <p class="testimonial-text">
                                    "Working with ThriveCity Studio was seamless. They understood our vision perfectly and delivered merchandise that truly represents our brand values."
                                </p>
                                <div class="testimonial-author">
                                    <div class="author-avatar">
                                        <div class="avatar-placeholder">ER</div>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">Emily Rodriguez</h4>
                                        <p class="author-title">Brand Manager, Urban Collective</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Navigation -->
                <div class="carousel-navigation">
                    <button class="carousel-btn prev-btn" onclick="changeTestimonial(-1)">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                        </svg>
                    </button>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="currentTestimonial(1)"></span>
                        <span class="dot" onclick="currentTestimonial(2)"></span>
                        <span class="dot" onclick="currentTestimonial(3)"></span>
                    </div>
                    <button class="carousel-btn next-btn" onclick="changeTestimonial(1)">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-header">
                <span class="section-label">MERCH FAQS</span>
                <h2 class="faq-title">Frequently<br>Asked Questions</h2>
                <p class="faq-subtitle">
                    Explore our FAQs to learn how ThriveCity<br>
                    Studio creates high-impact merchandise that<br>
                    builds brand love and loyalty with your<br>
                    audience.
                </p>
            </div>

            <div class="faq-list">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How can I contact ThriveCity Studio for merch inquiries?</span>
                        <div class="faq-icon">
                            
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>You can contact us through our website contact form, email us directly at hello@thrivecitystudio.ca, or call us at (555) 123-4567. We typically respond to all inquiries within 24 hours during business days.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What types of merchandise can ThriveCity Studio create?</span>
                        <div class="faq-icon">
                           
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>We specialize in a wide range of merchandise including apparel (t-shirts, hoodies, hats), promotional items (mugs, pens, bags), tech accessories, and custom branded products. Our team can work with virtually any product type to bring your brand vision to life.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Can you provide mockups or samples before production?</span>
                        <div class="faq-icon">
                          
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! We provide detailed digital mockups for all projects before production begins. For larger orders, we can also create physical samples upon request. This ensures you're completely satisfied with the design and quality before we proceed with full production.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How long does it take to produce and deliver merchandise?</span>
                        <div class="faq-icon">
                          
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Production times vary depending on the complexity and quantity of your order. Typically, simple designs take 5-7 business days, while more complex projects may take 10-14 business days. Rush orders are available for an additional fee, with some items available in as little as 2-3 business days.</p>
                    </div>
                </div>
                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>What is the minimum order quantity for custom merchandise?</span>
                        <div class="faq-icon">
                          
                        </div>
                    </div>
                    <div class="faq-answer">
                        <p>Our minimum order quantities vary by product type. For most apparel items, we require a minimum of 12 pieces per design. For promotional items like mugs or pens, minimums typically start at 25-50 pieces. We're happy to discuss your specific needs and find solutions that work for your budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transform Your Brand Section -->
    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="footer-container">
            <!-- Main Footer Content -->
            <div class="footer-main">
                <!-- Company Info -->
                <div class="footer-brand">
                    <div class="footer-logo">
                       <img src="{{ url('assets/images/logo-white.png') }}" width="150px" alt="ThriveCity Studio Logo">
                    </div>
                    <p class="footer-description">
                        ThriveCity Studio, your trusted partner in creating high-impact merchandise that builds brand love and loyalty through thoughtful design and premium quality.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987c6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447c0-1.297.49-2.448 1.297-3.323.875-.807 2.026-1.297 3.323-1.297 1.297 0 2.448.49 3.323 1.297.807.875 1.297 2.026 1.297 3.323 0 1.297-.49 2.448-1.297 3.323-.875.807-2.026 1.297-3.323 1.297zm7.83-9.605c-.49 0-.875-.385-.875-.875 0-.49.385-.875.875-.875.49 0 .875.385.875.875 0 .49-.385.875-.875.875zm-3.832 9.605c-2.042 0-3.708-1.665-3.708-3.708 0-2.042 1.665-3.708 3.708-3.708 2.042 0 3.708 1.665 3.708 3.708 0 2.042-1.665 3.708-3.708 3.708z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Company Links -->
                <div class="footer-links">
                    <h4 class="footer-heading">Company</h4>
                    <ul class="footer-menu">
                        <li><a href="#" class="footer-link">About Us</a></li>
                        <li><a href="#" class="footer-link">Our Team</a></li>
                        <li><a href="#" class="footer-link">Careers</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="footer-links">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-menu">
                        <li><a href="#" class="footer-link">Our Services</a></li>
                        <li><a href="#" class="footer-link">Portfolio</a></li>
                        <li><a href="#" class="footer-link">FAQs</a></li>
                        <li><a href="#" class="footer-link">Get A Quote</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-contact">
                    <h4 class="footer-heading">Contact Info</h4>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <span>(555) 123-4567</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span>hello@thrivecitystudio.ca</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span>123 Design Street, Creative City, CC 12345</span>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="footer-copyright">
                        Copyright © 2025 - ThriveCity Studio. Developed by
                        <a href="#" class="footer-link-accent">CareTech</a>
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-link">Terms & Conditions</a>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            const faqAnswer = faqItem.querySelector('.faq-answer');
            const faqIcon = element.querySelector('.faq-icon');

            // Toggle active class
            faqItem.classList.toggle('active');

            // Close other FAQ items
            const allFaqItems = document.querySelectorAll('.faq-item');
            allFaqItems.forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                }
            });
        }

        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
            
            // Prevent body scroll when menu is open
            if (mobileMenu.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        // Close mobile menu when clicking on the overlay
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            
            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu) {
                    toggleMobileMenu();
                }
            });

            // Close mobile menu when clicking on nav links
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link, .mobile-contact-btn');
            mobileNavLinks.forEach(link => {
                link.addEventListener('click', function() {
                    toggleMobileMenu();
                });
            });

            // Initialize testimonials carousel
            initTestimonialsCarousel();
        });

        // Testimonials Carousel Functionality
        let currentTestimonialIndex = 0;
        const totalTestimonials = 3;
        let testimonialInterval;

        function initTestimonialsCarousel() {
            updateCarousel();
            startAutoPlay();
        }

        function changeTestimonial(direction) {
            currentTestimonialIndex += direction;
            
            if (currentTestimonialIndex >= totalTestimonials) {
                currentTestimonialIndex = 0;
            } else if (currentTestimonialIndex < 0) {
                currentTestimonialIndex = totalTestimonials - 1;
            }
            
            updateCarousel();
            resetAutoPlay();
        }

        function currentTestimonial(index) {
            currentTestimonialIndex = index - 1;
            updateCarousel();
            resetAutoPlay();
        }

        function updateCarousel() {
            const track = document.getElementById('testimonialsTrack');
            const dots = document.querySelectorAll('.carousel-dots .dot');
            const cards = document.querySelectorAll('.testimonial-card');
            
            if (track) {
                const translateX = -currentTestimonialIndex * 33.333;
                track.style.transform = `translateX(${translateX}%)`;
            }
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentTestimonialIndex);
            });
            
            // Update cards active state
            cards.forEach((card, index) => {
                card.classList.toggle('active', index === currentTestimonialIndex);
            });
        }

        function startAutoPlay() {
            testimonialInterval = setInterval(() => {
                changeTestimonial(1);
            }, 5000); // Change every 5 seconds
        }

        function resetAutoPlay() {
            clearInterval(testimonialInterval);
            startAutoPlay();
        }

        // Pause auto-play on hover
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.testimonials-carousel');
            if (carousel) {
                carousel.addEventListener('mouseenter', () => {
                    clearInterval(testimonialInterval);
                });
                
                carousel.addEventListener('mouseleave', () => {
                    startAutoPlay();
                });
            }
        });
    </script>
</body>

</html>