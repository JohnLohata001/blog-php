<?php require_once 'inc/header.php' ?>
    
    <main>
        <section class="posts">
            <div class="line_title">
                <h1>My projects</h1>

            </div>
            <p class="page-description">A collection of my open-source projects, case studies, and experiments.</p>
            
            <div class="project-categories">
                <button class="category-btn active" data-category="all">All Projects</button>
                <button class="category-btn" data-category="web">Web Apps</button>
                <button class="category-btn" data-category="library">Libraries</button>
                <button class="category-btn" data-category="experiment">Experiments</button>
            </div>

            <div class="projects-grid">
                <article class="posts-card">
                    <div class="project-image-container">
                        <img src="<?=URL_ROOT?>/assets/images/dash.png" alt="Project" class="project-image">
                        <div class="project-links">
                            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                            <a href="#" class="project-link"><i class="fab fa-github"></i> Source Code</a>
                        </div>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">Admin Dashboard Template</h2>
                        <p class="project-description">A responsive admin dashboard built with React, TypeScript, and Tailwind CSS.</p>
                        <div class="project-tech">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">TypeScript</span>
                            <span class="tech-tag">Tailwind CSS</span>
                        </div>
                        <a href="#" class="project-details">View Case Study <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <article class="posts-card">
                    <div class="project-image-container">
                        <img src="<?=URL_ROOT?>/assets/images/dashboard.jpg" alt="Project" class="project-image">
                        <div class="project-links">
                            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                            <a href="#" class="project-link"><i class="fab fa-github"></i> Source Code</a>
                        </div>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">Admin Dashboard Template</h2>
                        <p class="project-description">A responsive admin dashboard built with React, TypeScript, and Tailwind CSS.</p>
                        <div class="project-tech">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">TypeScript</span>
                            <span class="tech-tag">Tailwind CSS</span>
                        </div>
                        <a href="#" class="project-details">View Case Study <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <article class="posts-card">
                    <div class="project-image-container">
                        <img src="<?=URL_ROOT?>/assets/images/dash.png" alt="Project" class="project-image">
                        <div class="project-links">
                            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                            <a href="#" class="project-link"><i class="fab fa-github"></i> Source Code</a>
                        </div>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">Admin Dashboard Template</h2>
                        <p class="project-description">A responsive admin dashboard built with React, TypeScript, and Tailwind CSS.</p>
                        <div class="project-tech">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">TypeScript</span>
                            <span class="tech-tag">Tailwind CSS</span>
                        </div>
                        <a href="#" class="project-details">View Case Study <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <article class="posts-card">
                    <div class="project-image-container">
                        <img src="<?=URL_ROOT?>/assets/images/dashboard.jpg" alt="Project" class="project-image">
                        <div class="project-links">
                            <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                            <a href="#" class="project-link"><i class="fab fa-github"></i> Source Code</a>
                        </div>
                    </div>
                    <div class="project-content">
                        <h2 class="project-title">Admin Dashboard Template</h2>
                        <p class="project-description">A responsive admin dashboard built with React, TypeScript, and Tailwind CSS.</p>
                        <div class="project-tech">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">TypeScript</span>
                            <span class="tech-tag">Tailwind CSS</span>
                        </div>
                        <a href="#" class="project-details">View Case Study <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                <!-- More project cards... -->
            </div>
            
        </section>

        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3 class="widget-title">Featured Project</h3>
                <div class="featured-project">
                    <img src="<?=URL_ROOT?>/assets/images/projects.webp" alt="Featured Project">
                    <h4>DevTools Extension</h4>
                    <p>A browser extension for developers to debug web applications more efficiently.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Project Stats</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">24</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5.2k</div>
                        <div class="stat-label">GitHub Stars</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">18</div>
                        <div class="stat-label">Contributors</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Featured</div>
                    </div>
                </div>
            </div>
        </aside>
        
    </main>

    <!-- Same footer -->
    <?php require_once 'inc/footer.php'; ?>
    
    <script>
        // Project category filter
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelector('.category-btn.active').classList.remove('active');
                this.classList.add('active');
                // Filter projects based on category
            });
        });

        // Keep other existing JavaScript
        //===============================
        
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