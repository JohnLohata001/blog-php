<?php require_once 'inc/header.php'; ?>

    <main>
        <section class="posts">
            <h1 class="page-title">All Articles</h1>
            <p class="page-description">Deep dives into programming concepts, best practices, and thought pieces.</p>
            
            <div class="filter-options">
                <div class="filter-group">
                    <label for="category-filter">Filter by Category:</label>
                    <select id="category-filter">
                        <option value="all">All Categories</option>
                        <option value="javascript">JavaScript</option>
                        <option value="react">React</option>
                        <option value="css">CSS</option>
                        <option value="node">Node.js</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="sort-by">Sort by:</label>
                    <select id="sort-by">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="popular">Most Popular</option>
                    </select>
                </div>
            </div>

            <article class="post-card">
                <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="JavaScript Article" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date">June 15, 2023</span>
                        <span class="post-views"><i class="fas fa-eye"></i> 1,245</span>
                    </div>
                    <h2 class="post-title"><a href="#">Understanding JavaScript Closures in Depth</a></h2>
                    <p class="post-excerpt">Closures are a fundamental concept in JavaScript that every developer should understand. This article explores how closures work, practical use cases, and common pitfalls to avoid.</p>
                    <div class="post-footer">
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        <span class="read-time"><i class="fas fa-clock"></i> 8 min read</span>
                    </div>
                </div>
            </article>
            <article class="post-card">
                <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="JavaScript Article" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date">June 15, 2023</span>
                        <span class="post-views"><i class="fas fa-eye"></i> 1,245</span>
                    </div>
                    <h2 class="post-title"><a href="#">Understanding JavaScript Closures in Depth</a></h2>
                    <p class="post-excerpt">Closures are a fundamental concept in JavaScript that every developer should understand. This article explores how closures work, practical use cases, and common pitfalls to avoid.</p>
                    <div class="post-footer">
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        <span class="read-time"><i class="fas fa-clock"></i> 8 min read</span>
                    </div>
                </div>
            </article>
            <article class="post-card">
                <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="JavaScript Article" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date">June 15, 2023</span>
                        <span class="post-views"><i class="fas fa-eye"></i> 1,245</span>
                    </div>
                    <h2 class="post-title"><a href="#">Understanding JavaScript Closures in Depth</a></h2>
                    <p class="post-excerpt">Closures are a fundamental concept in JavaScript that every developer should understand. This article explores how closures work, practical use cases, and common pitfalls to avoid.</p>
                    <div class="post-footer">
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        <span class="read-time"><i class="fas fa-clock"></i> 8 min read</span>
                    </div>
                </div>
            </article>
            <article class="post-card">
                <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="JavaScript Article" class="post-image">
                <div class="post-content">
                    <div class="post-meta">
                        <a href="#" class="post-category">JavaScript</a>
                        <span class="post-date">June 15, 2023</span>
                        <span class="post-views"><i class="fas fa-eye"></i> 1,245</span>
                    </div>
                    <h2 class="post-title"><a href="#">Understanding JavaScript Closures in Depth</a></h2>
                    <p class="post-excerpt">Closures are a fundamental concept in JavaScript that every developer should understand. This article explores how closures work, practical use cases, and common pitfalls to avoid.</p>
                    <div class="post-footer">
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        <span class="read-time"><i class="fas fa-clock"></i> 8 min read</span>
                    </div>
                </div>
            </article>


            <!-- More article cards... -->
        </section>

        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3 class="widget-title">Article Categories</h3>
                <ul class="categories-list">
                    <li><a href="#">JavaScript <span>24</span></a></li>
                    <li><a href="#">React <span>15</span></a></li>
                    <li><a href="#">CSS <span>18</span></a></li>
                    <li><a href="#">Node.js <span>12</span></a></li>
                    <li><a href="#">Performance <span>9</span></a></li>
                    <li><a href="#">Architecture <span>7</span></a></li>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Popular Articles</h3>
                <div class="popular-posts">
                    <a href="#" class="popular-post">
                        <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="Popular Article">
                        <div class="popular-post-content">
                            <h4>The Complete Guide to ES6 Features</h4>
                            <small>May 22, 2023 · 12 min read</small>
                        </div>
                    </a>
                     <a href="#" class="popular-post">
                        <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="Popular Article">
                        <div class="popular-post-content">
                            <h4>The Complete Guide to ES6 Features</h4>
                            <small>May 22, 2023 · 12 min read</small>
                        </div>
                    </a>

                    <a href="#" class="popular-post">
                        <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="Popular Article">
                        <div class="popular-post-content">
                            <h4>The Complete Guide to ES6 Features</h4>
                            <small>May 22, 2023 · 12 min read</small>
                        </div>
                    </a>
                    <a href="#" class="popular-post">
                        <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="Popular Article">
                        <div class="popular-post-content">
                            <h4>The Complete Guide to ES6 Features</h4>
                            <small>May 22, 2023 · 12 min read</small>
                        </div>
                    </a>                    <a href="#" class="popular-post">
                        <img src="<?=URL_ROOT; ?>/assets/images/js.png" alt="Popular Article">
                        <div class="popular-post-content">
                            <h4>The Complete Guide to ES6 Features</h4>
                            <small>May 22, 2023 · 12 min read</small>
                        </div>
                    </a>
                    <!-- More popular articles... -->
                </div>
            </div>
        </aside>
    </main>

    <!-- Same footer as your original template -->
    
   <?php require_once 'inc/footer.php'; ?>
    
    <script>
        // Add active class to current page in navigation
        const currentPage = window.location.pathname.split('/').pop();
        document.querySelectorAll('.nav-links a').forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });

        // Filter functionality
        document.getElementById('category-filter').addEventListener('change', function() {
            // Filter articles based on selection
            console.log('Filter by:', this.value);
        });

        // Sort functionality
        document.getElementById('sort-by').addEventListener('change', function() {
            // Sort articles based on selection
            console.log('Sort by:', this.value);
        });

        // Keep all other existing JavaScript
        //==================================
        
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