@extends('frontend.master')

@section('header')
<link rel="stylesheet" href="{{ url('assets/css/about.css') }}">

@endsection

@section('content')
<!-- Hero Section -->
<section class="about-hero">
    <div class="about-hero-container">
        <div class="about-hero-content">
            <h1 class="about-hero-title">About Us</h1>
            <p class="about-hero-subtitle">
                At ThriveCity Studio, we specialize in crafting high-impact merchandise that amplifies your brand’s identity. Explore our key services below to see how we can elevate your brand with innovative designs.
            </p>

            <div class="about-hero-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Projects Delivered</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Client Satisfaction</span>
                </div>

                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="story-section">
    <div class="story-container">
        <div class="story-content">
            <div class="story-text">
                <h2>Our Story</h2>
                <p>
                    Founded in 2019, ThriveCity Studio began with a bold idea — to help brands make lasting impressions through creative, high-impact merchandise.
</p><p>What started as a small creative team with a passion for design has grown into a full-service studio trusted by businesses to bring their brand stories to life.
</p><p>
                    Over the years, we’ve transformed ordinary products into powerful brand experiences — blending innovation, sustainability, and craftsmanship.
                    Today, ThriveCity stands as a creative partner for brands that don’t just want to be seen, but remembered.
                </p>
            </div>
            <div class="story-visual">
                <div class="story-image">
                    <span>Our Journey Since 2019</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="values-container">
        <div class="values-header">
            <h2>Our Core Values</h2>
            <p>These principles guide everything we do and shape how we work with our clients and each other.</p>
        </div>

        <div class="values-grid">
            <!-- Custom Merch Design -->
            <div class="value-card">
                <div class="value-icon">
                    <img width="78" height="78" src="{{ url('assets/images/about1.webp') }}" alt="Custom Merch Design">
                </div>
                <h3>Custom Merch Design</h3>
                <p>Create unique merchandise tailored to your brand, from concept to final product, with our expert design team.</p>
            </div>

            <!-- Sustainable Materials -->
            <div class="value-card">
                <div class="value-icon">
                    <img width="78" height="78" src="{{ url('assets/images/about2.webp') }}" alt="Sustainable Materials">
                </div>
                <h3>Sustainable Materials</h3>
                <p>Craft eco-friendly merchandise using sustainable materials that align with your brand’s values and reduce environmental impact.</p>
            </div>

            <!-- Fast Turnaround -->
            <div class="value-card">
                <div class="value-icon">
                    <img width="78" height="78" src="{{ url('assets/images/about3.webp') }}" alt="Fast Turnaround">
                </div>
                <h3>Fast Turnaround</h3>
                <p>Experience rapid design and production timelines, ensuring your merchandise is delivered promptly without compromising quality.</p>
            </div>
        </div>

    </div>
</section>




<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2>Ready to Start Your Digital Journey?</h2>
            <p>
                Let's work together to transform your vision into a digital reality. Whether you're looking to build a new website, enhance your brand, or develop a custom solution, we're here to help you thrive.
            </p>
            <div class="cta-buttons">
                <a href="/place-order" class="btn-primary">Place Order</a>
                <a href="/our-portfolio" class="btn-secondary">View Our Work</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection