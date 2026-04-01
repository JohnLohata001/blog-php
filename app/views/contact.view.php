<?php require 'inc/header.php'; ?>
<!-- app/views/contact.view.php -->

<style>



        /* Contact Page Styles */
        .container-main{
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            min-height: 80vh;
            gap: 2rem;
        }
        .contact-page {
            flex: 1;
            width: 100% ;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .page-description {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 2fr 1fr; /* first column bigger */
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .contact-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            margin-bottom: 1rem;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .contact-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .contact-card p {
            color: var(--gray);
            margin-bottom: 0.5rem;
        }

        .social-links-contact {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links-contact a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            color: var(--primary);
            transition: var(--transition);
        }

        .social-links-contact a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .contact-form-container {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            font-size: 1rem;
        }

        .submit-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .faq-section {
            margin-top: 4rem;
        }

        .faq-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: var(--dark);
        }

        .faq-container {
            display: grid;
            gap: 1rem;
        }

        .faq-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .faq-question {
            padding: 1.5rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--dark);
            transition: var(--transition);
        }

        .faq-question:hover {
            background: #f8f9fa;
        }

        .faq-question i {
            transition: var(--transition);
        }

        .faq-answer {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: var(--transition);
            color: var(--gray);
        }

        .faq-item.active .faq-answer {
            padding: 0 1.5rem 1.5rem;
            max-height: 500px;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }



</style>

<main class="container-main">

    <div class="contact-page">
        <div class="page-header">
            <h1 class="page-title"><?= $data['title']??''; ?></h1>
            <p class="page-description"><?= $data['description']??''; ?></p>
        </div>

        <!-- Success/Error Messages -->
        <?php if (!empty($data['success_message'])): ?>
            <div class="alert alert-success">
                <?= $data['success_message'] ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($data['error_message'])): ?>
            <div class="alert alert-error">
                <?= $data['error_message'] ?>
            </div>
        <?php endif; ?>

        <div class="contact-container">
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Me</h3>
                    <p>hello@devblog.com</p>
                    <p>I typically respond within 24 hours</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Location</h3>
                    <p>123 Developer Street</p>
                    <p>Code City, Tech State 12345</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3>Follow Me</h3>
                    <p>Stay connected through social media</p>
                    <div class="social-links-contact">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-dev"></i></a>
                    </div>
                </div>
            </div>

            <div class="contact-form-container">
                <h2 style="margin-bottom: 1.5rem; color: var(--dark);">Send a Message</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control <?= isset($data['errors']['name']) ? 'error' : '' ?>" 
                            placeholder="John Doe" value="<?= htmlspecialchars($data['form_data']['name'] ?? '') ?>" required>
                        <?php if (isset($data['errors']['name'])): ?>
                            <span class="error-text"><?= $data['errors']['name'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control <?= isset($data['errors']['email']) ? 'error' : '' ?>" 
                            placeholder="john@example.com" value="<?= htmlspecialchars($data['form_data']['email'] ?? '') ?>" required>
                        <?php if (isset($data['errors']['email'])): ?>
                            <span class="error-text"><?= $data['errors']['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control <?= isset($data['errors']['subject']) ? 'error' : '' ?>" 
                            placeholder="What's this about?" value="<?= htmlspecialchars($data['form_data']['subject'] ?? '') ?>" required>
                        <?php if (isset($data['errors']['subject'])): ?>
                            <span class="error-text"><?= $data['errors']['subject'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" class="form-control <?= isset($data['errors']['message']) ? 'error' : '' ?>" 
                                placeholder="Tell me what's on your mind..." required><?= htmlspecialchars($data['form_data']['message'] ?? '') ?></textarea>
                        <?php if (isset($data['errors']['message'])): ?>
                            <span class="error-text"><?= $data['errors']['message'] ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>

        <!-- FAQ Section (same as before) -->
        <div class="faq-section">
            
            <div class="faq-section">
                <h2 class="faq-title">Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">
                            How long does it take to get a response?
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>I typically respond to all emails within 24 hours. If you haven't heard back within 48 hours, please check your spam folder or try sending the message again.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            Do you accept guest posts on your blog?
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes! I'm always open to quality guest posts from fellow developers. Please send me a pitch with your topic idea before writing the full article.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            Can you help me with a specific coding problem?
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>While I can't provide personalized coding help for everyone, I do consider interesting problems for future blog posts. Feel free to describe your issue and I'll see if it fits the blog's content.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            Do you offer consulting or freelance services?
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>I occasionally take on freelance projects and consulting work. Please include details about your project in your message, and I'll let you know if I have availability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

</main>
<?php require 'inc/footer.php'; ?>

<script>




        // FAQ accordion functionality
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                // Toggle current item
                item.classList.toggle('active');
            });
        });

        // Contact form submission
        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(contactForm);
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            // Simple validation
            if (!name || !email || !subject || !message) {
                alert('Please fill in all fields');
                return;
            }
            
            // In a real application, you would send this data to a server
            // For now, we'll just show a success message
            alert('Thank you for your message! I\'ll get back to you soon.');
            contactForm.reset();
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
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,es,de,it,ar,zh-CN,ru',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>




</body>
</html>