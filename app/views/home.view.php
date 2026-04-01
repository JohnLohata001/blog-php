<?php require 'inc/header.php';?>

    <main>
        <section class="posts">
            <?php foreach($data['posts'] as $post): ?>
            <article class="post-card">
                <img src="<?=URL_ROOT?>/assets/images/cover_es6.png" alt="Post Image" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date">May 15, 2023</span>
                    </div>
                    <h2 class="post-title"><a href="#">Mastering ES6 Features: A Comprehensive Guide</a></h2>
                    <p class="post-excerpt">Explore the powerful features of ECMAScript 6 and learn how to write cleaner, more efficient JavaScript code with arrow functions, destructuring, template literals, and more.</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            <?php endforeach; ?>

        </section>

        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3 class="widget-title">About Me</h3>
                <p>Full-stack developer with a passion for clean code and efficient solutions. Sharing knowledge through tutorials and articles.</p>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Categories</h3>
                <ul class="categories-list">
                    <?php foreach($data['categories'] as $category): ?>
                    <li><a href="<?=URL_ROOT?>/posts/category/<?=htmlspecialchars($category['id'])?>"><?=htmlspecialchars($category['name'])?> <span><?=htmlspecialchars($category['post_count'])?></span></a></li>
                    <?php endforeach; ?>                    
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Popular Tags</h3>
                <div class="tags-container">
                    <a href="#" class="tag">#webdev</a>
                    <a href="#" class="tag">#javascript</a>
                    <a href="#" class="tag">#react</a>
                    <a href="#" class="tag">#css</a>
                    <a href="#" class="tag">#beginners</a>
                    <a href="#" class="tag">#tutorial</a>
                    <a href="#" class="tag">#performance</a>
                    <a href="#" class="tag">#node</a>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Popular Posts</h3>
                <div class="popular-posts">
                    <a href="#" class="popular-post">
                        <img src="https://source.unsplash.com/random/100x100/?javascript" alt="Popular Post">
                        <div class="popular-post-content">
                            <h4>Understanding JavaScript Closures</h4>
                            <small>March 5, 2023</small>
                        </div>
                    </a>
                    <a href="#" class="popular-post">
                        <img src="https://source.unsplash.com/random/100x100/?react" alt="Popular Post">
                        <div class="popular-post-content">
                            <h4>React Context API Guide</h4>
                            <small>February 18, 2023</small>
                        </div>
                    </a>
                    <a href="#" class="popular-post">
                        <img src="https://source.unsplash.com/random/100x100/?css" alt="Popular Post">
                        <div class="popular-post-content">
                            <h4>CSS Custom Properties</h4>
                            <small>January 30, 2023</small>
                        </div>
                    </a>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Newsletter</h3>
                <p>Subscribe to get the latest posts and tutorials directly to your inbox.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </aside>
    </main>

       <?php require_once 'inc/footer.php'; ?>

    <script>
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

    <div id="google_translate_element"></div>

    
    
</body>
</html>
