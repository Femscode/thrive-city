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
    <link rel="stylesheet" href="{{ url('assets/css/master.css') }}">
    @yield('header')
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
                    <a href="/" class="nav-link active">Home</a>
                    <a href="/about-us" class="nav-link">About us</a>
                    <a href="/our-portfolio" class="nav-link">Our Portfolio</a>
                    <a href="/our-blogs" class="nav-link">Our Blogs</a>
                    <a href="/contact-us" class="nav-link">Contact Us</a>
                </div>

                <!-- Contact Button -->
                <div class="nav-menu desktop">
                    <a href="/place-order" class="contact-btn">Place Order</a>
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
    @yield('content')
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
                <!-- <div class="footer-links">
                    <h4 class="footer-heading">Company</h4>
                    <ul class="footer-menu">
                        <li><a href="#" class="footer-link">About Us</a></li>
                        <li><a href="#" class="footer-link">Our Team</a></li>
                        <li><a href="#" class="footer-link">Careers</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                    </ul>
                </div> -->

                <!-- Quick Links -->
                <div class="footer-links">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-menu">
                        <li><a href="/about-us" class="footer-link">About Us</a></li>
                        <li><a href="#" class="footer-link">Our Services</a></li>
                        <li><a href="/our-portfolio" class="footer-link">Portfolio</a></li>
                        <li><a href="#faq" class="footer-link">FAQs</a></li>
                        <li><a href="/place-order" class="footer-link">Place Order</a></li>
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
                        <span>+1 (437) 239-6950</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span>support @thrivecitystudio.ca</span>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span>Ottawa, Canada</span>
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
    @yield('script')
</body>

</html>