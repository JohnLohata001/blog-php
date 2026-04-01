<?php require_once 'inc/header.php'?>
    
    <main>
        <section class="posts">
            <h1 class="page-title">Step-by-Step Tutorials</h1>
            <p class="page-description">Hands-on guides to help you build real-world projects and master new skills.</p>
            
            <div class="tutorial-categories">
                <div class="category-card">
                    <img src="<?=URL_ROOT;?>/assets/images/js.jpg" alt="JavaScript">
                    <h3>JavaScript Tutorials</h3>
                    <p>Master the language of the web with these practical guides</p>
                    <a href="#" class="btn">View Tutorials</a>
                </div>
                <div class="category-card">
                    <img src="<?=URL_ROOT;?>/assets/images/js.jpg" alt="JavaScript">
                    <h3>JavaScript Tutorials</h3>
                    <p>Master the language of the web with these practical guides</p>
                    <a href="#" class="btn">View Tutorials</a>
                </div>
                <div class="category-card">
                    <img src="<?=URL_ROOT;?>/assets/images/js.jpg" alt="JavaScript">
                    <h3>JavaScript Tutorials</h3>
                    <p>Master the language of the web with these practical guides</p>
                    <a href="#" class="btn">View Tutorials</a>
                </div>
                <div class="category-card">
                    <img src="<?=URL_ROOT;?>/assets/images/js.jpg" alt="JavaScript">
                    <h3>JavaScript Tutorials</h3>
                    <p>Master the language of the web with these practical guides</p>
                    <a href="#" class="btn">View Tutorials</a>
                </div>
                <!-- More category cards... -->
            </div>

            <div class="difficulty-filter">
                <h3>Filter by Difficulty:</h3>
                <div class="difficulty-options">
                    <button class="difficulty-btn active" data-level="all">All Levels</button>
                    <button class="difficulty-btn" data-level="beginner">Beginner</button>
                    <button class="difficulty-btn" data-level="intermediate">Intermediate</button>
                    <button class="difficulty-btn" data-level="advanced">Advanced</button>
                </div>
            </div>

            <article class="tutorial-card">
                <div class="tutorial-header">
                    <span class="difficulty-badge beginner">Beginner</span>
                    <span class="duration"><i class="fas fa-clock"></i> 25 min</span>
                </div>
                <img src="https://source.unsplash.com/random/600x400/?react" alt="React Tutorial" class="tutorial-image">
                <div class="tutorial-content">
                    <h2><a href="#">Building Your First React App</a></h2>
                    <p>A complete beginner's guide to creating your first React application from scratch.</p>
                    <div class="tutorial-meta">
                        <span class="lessons"><i class="fas fa-list-ol"></i> 7 lessons</span>
                        <a href="#" class="start-tutorial">Start Tutorial <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>
            <!-- More tutorial cards... -->
        </section>

        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3 class="widget-title">Learning Paths</h3>
                <div class="learning-paths">
                    <div class="path-card">
                        <h4>Frontend Developer</h4>
                        <p>Master HTML, CSS, and JavaScript</p>
                        <progress value="65" max="100"></progress>
                        <a href="#">Continue</a>
                    </div>
                    <!-- More learning paths... -->
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Tutorial Resources</h3>
                <ul class="resources-list">
                    <li><a href="#"><i class="fas fa-file-code"></i> Starter Files</a></li>
                    <li><a href="#"><i class="fas fa-video"></i> Video Versions</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Q&A Forum</a></li>
                </ul>
            </div>
        </aside>
    </main>

    <!-- Same footer -->

       <?php require_once 'inc/footer.php'; ?>
    
    <script>
        // Difficulty filter
        document.querySelectorAll('.difficulty-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelector('.difficulty-btn.active').classList.remove('active');
                this.classList.add('active');
                // Filter tutorials based on difficulty
            });
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