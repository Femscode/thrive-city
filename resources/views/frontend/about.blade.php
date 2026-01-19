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
                Thrive City Studio was created from a simple belief:
                life’s moments deserve to be celebrated, remembered, and worn with pride.
            </p>
            <p class="about-hero-subtitle">
                We create custom and ready-to-wear apparel that helps people mark the occasions that matter most — from birthdays, milestones, and family events to holidays, school moments, business branding, and everyday encouragement.
            </p>
            <p class="about-hero-subtitle">
                Every shirt we make carries a story.
                Your story.
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
                    Thrive City Studio started with a love for creativity and a deep appreciation for meaningful moments.
                </p>
                <p>
                    Like many of our customers, we understand how important it is to celebrate the small wins, the big milestones, and everything in between. Birthdays. First days of school. New babies. Business launches. Quiet reminders to keep going.
                </p>
                <p>
                    What began as a passion for creating personalized pieces quickly grew into a brand centered on connection, emotion, and storytelling through apparel.
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
            <!-- Purposeful creation -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h3>Purposeful creation</h3>
            </div>

            <!-- Meaningful moments -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3>Meaningful moments</h3>
            </div>

            <!-- Thoughtful quality -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3>Thoughtful quality</h3>
            </div>

            <!-- Real connection -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3>Real connection</h3>
            </div>

            <!-- Empowered expression -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3>Empowered expression</h3>
            </div>

            <!-- Community support -->
            <div class="value-card">
                <div class="value-icon">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h3>Community support</h3>
            </div>
        </div>

    </div>
</section>




<!-- CTA Section -->
<!-- <section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2>Ready to Start Your Digital Journey?</h2>
            <p>
                Let's work together to transform your vision into a digital reality. Whether you're looking to build a new website, enhance your brand, or develop a custom solution, we're here to help you thrive.
            </p>
            <div class="cta-buttons">
                <a href="/marketplace" class="btn-primary">Place Order</a>
                <a href="/our-portfolio" class="btn-secondary">View Our Work</a>
            </div>
        </div>
    </div>
</section> -->
@endsection

@section('script')
@endsection