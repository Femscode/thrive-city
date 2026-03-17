@extends('frontend.master')

@section('header')
<link rel="stylesheet" href="{{ url('assets/css/index.css') }}">

@endsection

@section('content')
<section class="hero">
    <!-- Background Elements -->
    <div class="hero-bg-glow"></div>
    <div class="hero-grid-pattern"></div>

    <div class="hero-container">
        <div class="hero-layout">
            <!-- Hero Content -->
            <div class="hero-content-side animate-fade-up">
                <!-- <div class="hero-tag-badge">
                    <span class="pulse-icon"></span>
                    <span>Trusted by 500+ Growing Businesses</span>
                </div> -->

                <h1 class="hero-main-title">
                    Professional <span class="highlight-text">Branded Apparel</span> for founders
                </h1>

                <p class="hero-lead-text">
                    We help entrepreneurs and growing teams look established through high-quality branded apparel. From custom t-shirts to professional bundles, we handle the production so you can focus on building.
                </p>

                <div class="hero-cta-group">
                    <a href="{{ route('marketplace') }}" class="btn-hero-primary">
                        <span>Get Branded Apparel</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4.16663 10H15.8333M15.8333 10L10.8333 5M15.8333 10L10.8333 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="{{ route('marketplace') }}" class="btn-hero-outline">
                        <span>View Founder's Bundle</span>
                    </a>
                </div>


            </div>

            <!-- Hero Visual -->
            <div class="hero-visual-side">
                <div class="visual-composition animate-fade-in">
                    <!-- Main Image Frame -->
                    <div class="main-image-wrapper">
                        <div class="image-inner-glow"></div>
                        <img src="{{ url('assets/images/thrive/thrive4.png') }}" alt="Thrive City Apparel" class="main-hero-img">
                    </div>

                    <!-- Floating Feature Cards -->
                    <!-- <div class="floating-info-card info-card-1 floating-y">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div class="info-text">
                            <span class="info-label">Premium Fabric</span>
                            <span class="info-value">100% Cotton</span>
                        </div>
                    </div> -->

                    <!-- <div class="floating-info-card info-card-2 floating-y-delayed">
                        <div class="info-icon icon-purple">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="info-text">
                            <span class="info-label">Verified Quality</span>
                            <span class="info-value">Hand-Inspected</span>
                        </div>
                    </div> -->

                    <!-- Decorative elements -->
                    <div class="decorative-blob"></div>
                    <div class="decorative-ring"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Look Established Section -->
<section class="established-section">
    <div class="established-container">
        <div class="established-content">
            <!-- Image Side -->
            <div class="established-visual">
                <div class="established-composition">
                    <div class="composition-glow"></div>
                    <div class="composition-shape-1"></div>
                    <div class="composition-shape-2"></div>

                    <div class="composition-card main-card">
                        <img src="{{ url('assets/images/thrive/thrive6.png') }}" alt="Founder wearing branded apparel">
                    </div>

                    <div class="composition-card accent-card">
                        <img src="{{ url('assets/images/thrive/thrive2.png') }}" alt="Close-up of apparel fabric">
                    </div>

                    <!-- <div class="composition-tag tag-pro">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Professional Grade</span>
                    </div> -->

                    <!-- <div class="composition-tag tag-choice">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span>Founder's Choice</span>
                    </div> -->
                </div>
            </div>

            <!-- Content Side -->
            <div class="established-text">
                <div class="label-pill">PERCEPTION MATTERS</div>
                <h3 class="established-title">Look Established Before You <span class="text-purple">Become Established</span></h3>
                <p class="established-description">
                    In business, perception matters. Before people hear your pitch, they see your brand.
                    Professional apparel sends a clear message to your audience:
                </p>

                <div class="established-features">
                    <div class="established-feature">
                        <div class="feature-icon-wrapper">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h4>Serious Business</h4>
                            <p>Show that your business is serious and ready for growth.</p>
                        </div>
                    </div>

                    <div class="established-feature">
                        <div class="feature-icon-wrapper">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h4>Organized Brand</h4>
                            <p>Present a cohesive, organized brand identity to the world.</p>
                        </div>
                    </div>

                    <div class="established-feature">
                        <div class="feature-icon-wrapper">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 8l4 4-4 4M8 12h7" />
                            </svg>
                        </div>
                        <div class="feature-content">
                            <h4>Ready for Opportunity</h4>
                            <p>Be prepared for every networking event and client meeting.</p>
                        </div>
                    </div>
                </div>

                <div class="established-footer">
                    <p>Thrive City Studio helps growing businesses present themselves professionally through high-quality branded apparel. <strong>When your brand shows up well, people take notice.</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Create Section -->
<section class="create-section">
    <div class="create-container">
        <div class="create-header">
            <div class="label-pill">WHAT WE CREATE</div>
            <h2 class="create-title">Branded Apparel for Founders & Teams</h2>
            <p class="create-description">
                At Thrive City Studio, we design and produce branded apparel for founders, teams, and growing businesses.
                Our focus is simple: clean design, quality apparel, and vibrant prints that represent your brand professionally.
            </p>
        </div>

        <div class="create-grid">
            <div class="create-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z" />
                    </svg>
                </div>
                <h3>Premium Branded T-shirts</h3>
                <p>High-quality fabrics with vibrant, long-lasting prints.</p>
            </div>

            <div class="create-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z" />
                    </svg>

                </div>
                <h3>Premium Branded Sweatshirts</h3>
                <p>Cozy, structured fit that maintains its shape wash after wash.</p>
            </div>

            <div class="create-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Team Apparel for Businesses</h3>
                <p>Unified looks for your team at the office or on the field.</p>
            </div>

            <div class="create-card">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14M16.5 9.4L7.5 4.21M3.29 7L12 12l8.71-5M12 22.08V12" />
                    </svg>
                </div>
                <h3>Vendor Events & Trade Shows</h3>
                <p>Stand out in the crowd with professional event apparel.</p>
            </div>
        </div>
    </div>
</section>

<!-- The Founder’s Bundle Section -->
<section class="bundle-section">
    <div class="bundle-container">
        <div class="bundle-content">
            <!-- Visual Side -->
            <div class="bundle-visual">
                <div class="bundle-showcase">
                    <img src="{{ url('assets/images/thrive/thrive4.png') }}" alt="Branded Sweatshirt" class="showcase-image image-back">
                    <img src="{{ url('assets/images/thrive/thrive7.png') }}" alt="Branded T-shirt" class="showcase-image image-front">
                    <!-- <div class="bundle-badge">Signature Package</div> -->
                    <div class="showcase-glow"></div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="bundle-text">
                <h3 class="bundle-title">The Founder’s Bundle</h3>
                <p class="bundle-description">
                    A curated apparel package designed for business owners who want a simple way to represent their brand consistently.
                </p>

                <div class="bundle-features">
                    <div class="bundle-feature">
                        <div class="check-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span>Premium branded t-shirt & sweatshirt</span>
                    </div>
                    <div class="bundle-feature">
                        <div class="check-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span>Vibrant, high-quality print</span>
                    </div>
                    <div class="bundle-feature">
                        <div class="check-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span>Durable neckline & structured fit</span>
                    </div>
                </div>

                <a href="{{ route('marketplace') }}" class="btn-bundle-order">Order Your Bundle</a>
            </div>
        </div>
    </div>
</section>

<!-- Where Founders Use Their Apparel -->
<section class="visibility-section">
    <div class="visibility-container">
        <div class="visibility-content">
            <!-- Content Side -->
            <div class="visibility-text">
                <div class="label-pill">VISIBILITY MATTERS</div>
                <h3 class="visibility-title">Show Up with Confidence</h3>
                <p class="visibility-description">
                    Our clients wear their branded apparel in places where visibility matters. Branded apparel makes your business visible even when you are not actively selling.
                </p>

                <div class="visibility-grid">
                    <div class="visibility-item">
                        <span class="item-number">01</span>
                        <p>Vendor & Networking Events</p>
                    </div>
                    <div class="visibility-item">
                        <span class="item-number">02</span>
                        <p>Trade Shows & Pop-up Markets</p>
                    </div>
                    <div class="visibility-item">
                        <span class="item-number">03</span>
                        <p>Client Meetings & Speaking Engagements</p>
                    </div>
                    <div class="visibility-item">
                        <span class="item-number">04</span>
                        <p>Content Creation & Brand Photos</p>
                    </div>
                </div>
            </div>

            <!-- Image Side -->
            <div class="visibility-visual">
                <div class="visibility-image-wrapper">
                    <img src="{{ url('assets/images/thrive/thrive3.png') }}" alt="Founder showing brand confidence">
                    <div class="image-bg-glow"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Work With -->
<section class="why-choose-us-section">
    <div class="why-choose-us-container">
        <div class="why-choose-us-content">
            <div class="why-choose-us-text">
                <h2 class="why-choose-us-title">Who We Work With</h2>
                <p class="why-choose-us-description">
                    Thrive City Studio works with founders and businesses that are building something meaningful. If you want to present your brand professionally, we create apparel designed for you.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <h3 class="feature-title">Consultants & Coaches</h3>
                </div>
                <div class="feature-box">
                    <h3 class="feature-title">Service-Based Businesses</h3>
                </div>
                <div class="feature-box">
                    <h3 class="feature-title">Creative Entrepreneurs</h3>
                </div>
                <div class="feature-box">
                    <h3 class="feature-title">Startups & Teams</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="faq-container">
        <div class="faq-header">
            <div class="label-pill">MERCH FAQS</div>
            <h2 class="faq-title">Frequently Asked Questions</h2>
            <p class="faq-subtitle">
                Learn how Thrive City Studio creates high-impact merchandise that builds brand visibility and professional presence.
            </p>
        </div>

        <div class="faq-list">
            <!-- FAQ Item 1 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>How long does it take to produce and deliver merchandise?</span>
                    <div class="faq-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Production times vary depending on the complexity and quantity of your order. Typically, simple designs take 5-7 business days, while more complex projects may take 10-14 business days. Rush orders are available for an additional fee, with some items available in as little as 2-3 business days.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What is the minimum order quantity for custom merchandise?</span>
                    <div class="faq-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Our minimum order quantities vary by product type. For most apparel items, we require a minimum of 12 pieces per design. For promotional items like mugs or pens, minimums typically start at 25-50 pieces. We're happy to discuss your specific needs and find solutions that work for your budget.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can I use my own design or logo?</span>
                    <div class="faq-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! We specialize in bringing your brand to life. Simply upload your high-resolution logo or design, and we'll ensure it's printed with professional quality.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What is included in the Founder's Bundle?</span>
                    <div class="faq-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                </div>
                <div class="faq-answer">
                    <p>The Founder's Bundle includes a curated selection of our most popular premium apparel: 1 high-quality t-shirt and 1 structured sweatshirt, both branded with your logo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<!-- Why Choose Us Section -->
<section class="benefits-section">
    <div class="benefits-container">
        <div class="benefits-header">
            <div class="label-pill">WHY BUSINESSES CHOOSE US</div>
            <h2 class="benefits-title">Designed Specifically for Entrepreneurs</h2>
        </div>

        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z" />
                    </svg>
                </div>
                <h3>Quality Apparel</h3>
                <p>Structured garments designed to maintain their shape and professional appearance over time.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="21 8 21 21 3 21 3 8"></polyline>
                        <rect x="1" y="3" width="22" height="5"></rect>
                        <line x1="10" y1="12" x2="14" y2="12"></line>
                    </svg>
                </div>
                <h3>Vibrant Printing</h3>
                <p>Clean, professional prints that represent your brand clearly and withstand repeated washes.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Built for Founders</h3>
                <p>Specifically designed for entrepreneurs who represent their brands in public spaces and events.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Final CTA -->
<section class="mission-section">
    <div class="mission-container">
        <div class="mission-content-wrapper">
            <div class="mission-text-side">
                <div class="label-pill white" style="color:white">OUR MISSION</div>
                <h2 class="mission-title">Help growing businesses show up with confidence.</h2>
                <p class="mission-description">
                    Many entrepreneurs are doing excellent work but struggle to present their brands in a way that reflects the level of value they provide.
                    We believe your brand should look as strong as the work you do.
                </p>
                <div class="mission-quote">
                    "That is why we create apparel that helps founders look established while they build."
                </div>
            </div>

            <div class="mission-cta-card">
                <div class="cta-card-inner">
                    <h3 class="cta-card-title">Your brand deserves to be seen.</h3>
                    <p class="cta-card-text">Represent it with apparel designed for entrepreneurs.</p>
                    <a href="{{ route('marketplace') }}" class="btn-primary full-width">
                        <span>Order Branded Apparel Today</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4.16663 10H15.8333M15.8333 10L10.8333 5M15.8333 10L10.8333 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="cta-card-footer">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                        Professional Quality Guaranteed
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@endsection