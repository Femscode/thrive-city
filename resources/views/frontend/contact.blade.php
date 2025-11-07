@extends('frontend.master')

@section('header')
 <link rel="stylesheet" href="{{ url('assets/css/contact.css') }}">
   
@endsection

@section('content')
<!-- Hero Section -->
<section class="services-hero">
    <div class="services-hero-container">
        <div class="services-hero-content">
            <h1 class="services-hero-title">Contact Us</h1>
            <p class="services-hero-subtitle">
        Reach out to us through any of the channels below, and we will get back to you as soon as possible.    
        </p>
        </div>
    </div>
</section>



<!-- Contact Section -->
<section class="contact-section">
    <div class="contact-container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>Get In Touch</h2>
                <p>Ready to start your next project? Contact us today to discuss how we can help bring your vision to life.</p>
                
                <div class="contact-details">
                    <div class="contact-item2">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Address</h4>
                            <p>Parliament Hill<br>Wellington St, Ottawa, ON K1A 0A9, Canada</p>
                        </div>
                    </div>
                    
                    <div class="contact-item2">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Call Us</h4>
                            <p>+1 (437) 239-6950</p>
                        </div>
                    </div>
                    
                    <div class="contact-item2">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <p>support@thrivecitystudio.ca</p>
                        </div>
                    </div>
                    
                    <div class="contact-item2">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <h4>Office Hours</h4>
                            <p>Everyday 08 am - 05 pm</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-cta">
                    <a href="/contact-us" class="btn-primary">Start Your Project</a>
                </div>
            </div>
            
            <div class="contact-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.6167999999997!2d-75.70093!3d45.42153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cce04ff4fe494ef%3A0x26bb54f60c29f6e!2sParliament%20Hill!5e0!3m2!1sen!2sca!4v1635000000000!5m2!1sen!2sca"
                    width="100%" 
                    height="400" 
                    style="border:0; border-radius: 15px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2>Ready to Transform Your Digital Presence?</h2>
            <p>Let's work together to create something amazing. Place an order and discover how we can help your business thrive online.</p>
            <div class="cta-buttons">
                <a href="/place-order" class="btn-primary">Place An Order Now</a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection