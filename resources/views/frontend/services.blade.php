@extends('frontend.master')

@section('header')
<link rel="stylesheet" href="{{ url('assets/css/index2.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/about2.css') }}">
<style>
    .services-intro {
        max-width: 800px;
        margin: 0 auto 60px;
        font-size: 1.25rem;
        color: var(--gray-medium);
        line-height: 1.6;
    }
    .services-list-section {
        padding: 100px 0;
        background: #f8f9fa;
    }
    .services-list-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 4rem;
    }
    .service-item-card {
        background: white;
        padding: 3rem;
        border-radius: 2rem;
        border: 1px solid #F3F4F6;
        transition: all 0.4s ease;
    }
    .service-item-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(139, 69, 255, 0.1);
        border-color: var(--primary-purple);
    }
    .service-icon-box {
        width: 60px;
        height: 60px;
        background: #F3F0FF;
        color: var(--primary-purple);
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }
    .service-item-card h3 {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: var(--dark-black);
    }
    .services-footer-note {
        text-align: center;
        max-width: 700px;
        margin: 80px auto 0;
        padding: 3rem;
        background: white;
        border-radius: 2rem;
        border: 1px dashed var(--primary-purple);
        font-weight: 600;
        color: var(--gray-dark);
    }
</style>
@endsection

@section('content')
<!-- Services Hero -->
<section class="about-hero">
    <div class="about-hero-container">
        <div class="about-hero-content">
            <h1 class="about-hero-title">Our Services</h1>
            <p class="about-hero-subtitle">
                Professional Branded Apparel for Founders and Growing Businesses.
            </p>
            <p class="about-hero-subtitle">
                Thrive City Studio provides custom branded apparel designed for founders, teams, and entrepreneurs who want to represent their businesses professionally.
            </p>
            <p class="about-hero-subtitle">
                We specialize in high-quality, professional apparel that aligns with your brand identity, ensuring your business shows up with confidence.
            </p>
            
         
        </div>
    </div>
</section>

<!-- Services List -->
<section class="services-list-section">
    <div class="benefits-container">
        <div class="create-header">
            <h2 class="create-title">What We Offer</h2>
            <p class="create-description">We specialize in high-quality, professional apparel that aligns with your brand identity.</p>
        </div>

        <div class="services-list-grid">
            <!-- T-shirts -->
            <div class="service-item-card">
                <div class="service-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
                </div>
                <h3>Custom branded t-shirts</h3>
                <p>Premium quality t-shirts with vibrant, professional printing for everyday brand visibility.</p>
            </div>

            <!-- Sweatshirts -->
            <div class="service-item-card">
                <div class="service-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <h3>Custom branded sweatshirts</h3>
                <p>Cozy and structured sweatshirts that maintain a professional look in any environment.</p>
            </div>

            <!-- Event Apparel -->
            <div class="service-item-card">
                <div class="service-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14M16.5 9.4L7.5 4.21M3.29 7L12 12l8.71-5M12 22.08V12"/></svg>
                </div>
                <h3>Event apparel for markets & conferences</h3>
                <p>High-impact apparel designed to make you stand out at vendor events and trade shows.</p>
            </div>

            <!-- Team Apparel -->
            <div class="service-item-card">
                <div class="service-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3>Team apparel for businesses</h3>
                <p>Unified, professional looks for your entire team to build internal culture and external trust.</p>
            </div>

            <!-- Entrepreneur Merchandise -->
            <div class="service-item-card">
                <div class="service-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Entrepreneur merchandise</h3>
                <p>Curated merchandise collections designed specifically for the modern founder.</p>
            </div>
        </div>

        <div class="services-footer-note">
            We work with businesses that want apparel that is clean, professional, and aligned with their brand identity.
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="mission-section">
    <div class="mission-container">
        <div class="mission-content-wrapper">
            <div class="mission-text-side">
                <h2 class="mission-title">Ready to level up your brand?</h2>
                <p class="mission-description">Let's create apparel that reflects the quality of the work you do.</p>
            </div>
            <div class="mission-cta-card">
                <div class="cta-card-inner">
                    <h3 class="cta-card-title">Start Your Order</h3>
                    <p class="cta-card-text">Professional apparel designed for you.</p>
                    <a href="{{ route('marketplace') }}" class="btn-primary full-width">
                        <span>Get Branded Apparel</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M4.16663 10H15.8333M15.8333 10L10.8333 5M15.8333 10L10.8333 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection
