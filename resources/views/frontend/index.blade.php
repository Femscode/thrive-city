@extends('frontend.master')

@section('header')
 <link rel="stylesheet" href="{{ url('assets/css/index.css') }}">
   
@endsection

@section('content')
<section class="hero">
    <div class="hero-container">
        <div class="hero-grid">
            <!-- Hero Content -->
            <div class="hero-content">
                <!-- Feature Tags -->
               

                <!-- Main Heading -->
                <h1 class="hero-heading">
                    Thrive City Studio
                </h1>
                <h2>Made for moments that matters.</h2>

                <!-- Description -->
                <p class="hero-description">
                    At Thrive City Studio, we turn your ideas into wearable memories.
                    Whether you’re celebrating something big, something personal, or just want to wear words that reflect your story,
                    we create apparel that feels meaningful — not generic.
                </p>
                 <div class="feature-tags">
                    <div class="feature-tag">
                        <div class="feature-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Birthdays</span>
                    </div>
                    <div class="feature-tag">
                        <div class="feature-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Milestones</span>
                    </div>
                    <div class="feature-tag">
                        <div class="feature-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Holidays</span>
                    </div>
                    <div class="feature-tag">
                        <div class="feature-icon">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">School Events</span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="cta-buttons">
                    <a href="{{ route('marketplace') }}" class="btn-primary">Shop Our Collections</a>
                    <a href="{{ route('marketplace') }}" class="btn-secondary">Start A Custom Order</a>
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
                        <img src="{{ url('assets/images/hero2.jpg') }}" alt="Product Mockup" class="hero-image">
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
            <span class="services-label">WHAT WE CREATE</span>
            <h2 class="services-title">Custom Apparel For Every Moment</h2>
            <p class="services-description">
                We specialize in custom t-shirts, sweatshirts, and hoodies for the moments that matter:
                birthday shirts (kids and adults), branded apparel for business owners, family reunions,
                baby showers and maternity, weddings and anniversaries, school events and spirit wear,
                holiday collections, and motivational everyday wear.
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
                <h3 class="section-title">Custom Or Ready-Made — Your Choice</h3>
                <p class="section-description">
                    If it matters to you, we can put it on a shirt.
                    Have your own design or logo? Send it to us and we’ll bring it to life with
                    high-quality printing and care. Don’t have a design yet? Shop our ready-made
                    collections created for seasons, celebrations, and everyday encouragement.
                    Either way, you get something that feels like you.
                </p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Use Your Own Design/Logo</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Thoughtfully Curated Collections</span>
                    </div>
                </div>

                <a href="{{ route('marketplace') }}" class="cta-button">Shop Or Send Us Your Design</a>
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
                <h3 class="section-title">Why Our Customers Love Us?</h3>
                <p class="section-description">
                    We don’t just print shirts. We help people celebrate life.
                    From birthdays to milestones and everyday motivation,
                    every order is handled with care, meaning, and attention to detail.
                </p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Thoughtful Designs With Meaning</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Apparel Made For Real-Life Moments</span>
                    </div>
                </div>

                <a href="{{ route('marketplace') }}" class="cta-button">Explore Our Apparel</a>
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
                <h3 class="section-title">Ready To Create Something Meaningful?</h3>
                <p class="section-description">
                    Whether you’re marking a milestone, planning an event, or creating everyday pieces that inspire,
                    we’re here to help you make it memorable with apparel that feels personal and intentional.
                </p>

                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Personalized Service</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="feature-text">Apparel Made For Real Life</span>
                    </div>
                </div>

                <a href="{{ route('marketplace') }}" class="cta-button">Shop Collections</a>
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
                <h2 class="why-choose-us-title">Discover WhyThriveCity StudioExcels</h2>
                <p class="why-choose-us-description">
                    We create thoughtful merchandise designs
                    that build genuine connections between
                    brands and their audiences, delivering
                    exceptional quality and memorable
                    experiences.
                </p>
                <a href="/contact-us" class="message-us-button">Message Us</a>
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
                                        <h4 class="author-name">Victor Michelle</h4>
                                        <p class="author-title">Marketing Director, VTUBIZ</p>
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
                                        <div class="avatar-placeholder">AA</div>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">Awe Alexander</h4>
                                        <p class="author-title">Brand Manager, CTTaste.</p>
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
                                        <div class="avatar-placeholder">FP</div>
                                    </div>
                                    <div class="author-info">
                                        <h4 class="author-name">Fasanya Pelumi</h4>
                                        <p class="author-title">Brand Manager, CTHostel</p>
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
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                        </svg>
                    </button>
                    <div class="carousel-dots">
                        <span class="dot active" onclick="currentTestimonial(1)"></span>
                        <span class="dot" onclick="currentTestimonial(2)"></span>
                        <span class="dot" onclick="currentTestimonial(3)"></span>
                    </div>
                    <button class="carousel-btn next-btn" onclick="changeTestimonial(1)">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z" />
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
            <h2 class="faq-title">FrequentlyAsked Questions</h2>
            <p class="faq-subtitle">
                Explore our FAQs to learn how ThriveCity
                Studio creates high-impact merchandise that
                builds brand love and loyalty with your
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
                    <p>You can contact us through our website contact form, email us directly at support@thrivecitystudio.ca, or call us at +1 (437) 239-6950. We typically respond to all inquiries within 24 hours during business days.</p>
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

@endsection

@section('script')
@endsection
