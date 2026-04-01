<?php require_once 'inc/header.php'; ?>
    <main class="about-page">
        <section class="about-hero">
            <div class="about-content">
                <h1>Hello, I'm <span class="highlight">Alex</span></h1>
                <h2>Full-Stack Developer & Educator</h2>
                <p>I've been building web applications for over 8 years and sharing my knowledge through this blog since 2020. My mission is to help developers at all levels improve their skills through practical, real-world examples.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-dev"></i></a>
                </div>
            </div>
            <div class="about-image">
                <img src="<?=URL_ROOT?>/assets/images/developer.jpg" alt="Alex Developer">
            </div>
        </section>

        <section class="skills-section">
            <h2 class="section-title">My Skills & Expertise</h2>
            <div class="skills-grid">
                <div class="skill-category">
                    <h3>Frontend</h3>
                    <ul class="skills-list">
                        <li>React</li>
                        <li>TypeScript</li>
                        <li>CSS/Sass</li>
                        <li>Vue.js</li>
                    </ul>
                </div>
                <!-- More skill categories... -->
            </div>
        </section>

        <section class="timeline-section">
            <h2 class="section-title">My Journey</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-date">2018</div>
                    <div class="timeline-content">
                        <h3>First Web Development Job</h3>
                        <p>Started my career as a junior frontend developer at a digital agency.</p>
                    </div>
                </div>
                <!-- More timeline items... -->
                <div class="timeline-item">
                    <div class="timeline-date">2020</div>
                    <div class="timeline-content">
                        <h3>First Web Development Job</h3>
                        <p>Started my career as a junior frontend developer at a digital agency.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">2023</div>
                    <div class="timeline-content">
                        <h3>First Web Development Job</h3>
                        <p>Started my career as a junior frontend developer at a digital agency.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <h2 class="section-title">Get In Touch</h2>
            <form class="contact-form">
                <div class="form-group">
                    <input type="text" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </section>
    </main>

    <!-- Same footer -->
   <?php require_once 'inc/footer.php'; ?>
    
    <script>
        // Simple form validation
        document.querySelector('.contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add form submission logic
            alert('Thank you for your message! I\'ll get back to you soon.');
            this.reset();
        });

        // Keep other existing JavaScript
        //==============================
        
        
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            
            // Change icon based on menu state
            const icon = mobileMenuBtn.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                        const icon = mobileMenuBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        });

        // Add animation to elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.post-card, .sidebar-widget');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        };

        // Initialize elements as invisible
        document.querySelectorAll('.post-card, .sidebar-widget').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });

        // Run once on page load
        setTimeout(animateOnScroll, 300);
        
        // Then run on scroll
        window.addEventListener('scroll', animateOnScroll);
    </script>
</body>
</html>