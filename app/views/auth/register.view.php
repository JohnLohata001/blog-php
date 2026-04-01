<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DevBlog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: rgba(27, 74, 105, 0.9);
            --secondary: rgba(34, 59, 77, 0.9);
            --accent: #4895ef;
            --dark: #1b263b;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #560bad;
            --font-main: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            --font-code: 'Fira Code', 'Courier New', monospace;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: var(--dark);
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .register-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            min-height: 700px;
        }

        .register-left {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .register-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }

        .register-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            z-index: 1;
            position: relative;
        }

        .register-logo i {
            font-size: 2rem;
            color: var(--accent);
        }

        .register-left h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            z-index: 1;
            position: relative;
        }

        .register-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            z-index: 1;
            position: relative;
        }

        .benefits-list {
            list-style: none;
            z-index: 1;
            position: relative;
        }

        .benefits-list li {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .benefits-list i {
            color: var(--accent);
            font-size: 1.2rem;
        }

        .testimonial {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 10px;
            margin-top: 2rem;
            z-index: 1;
            position: relative;
        }

        .testimonial p {
            font-style: italic;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .author-info h4 {
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .author-info span {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .register-right {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
            max-height: 700px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: var(--gray);
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }

        .progress-bar {
            position: absolute;
            top: 20px;
            left: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
            z-index: 2;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 3;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .step.active .step-circle {
            background: var(--primary);
            color: white;
        }

        .step.completed .step-circle {
            background: var(--success);
            color: white;
        }

        .step-label {
            font-size: 0.8rem;
            font-weight: 500;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .required {
            color: var(--danger);
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .password-strength {
            margin-top: 0.5rem;
        }

        .strength-meter {
            height: 4px;
            background: #e9ecef;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 0.3rem;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: var(--transition);
        }

        .strength-text {
            font-size: 0.8rem;
        }

        .terms-group {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .terms-group input {
            margin-top: 0.3rem;
        }

        .terms-group label {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.4;
        }

        .terms-group a {
            color: var(--primary);
            text-decoration: none;
        }

        .terms-group a:hover {
            text-decoration: underline;
        }

        .register-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        .register-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--gray);
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e9ecef;
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .social-register {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .social-btn:hover {
            border-color: var(--primary);
            transform: translateY(-1px);
        }

        .social-btn.google {
            color: #DB4437;
        }

        .social-btn.github {
            color: #333;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
            color: var(--gray);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .login-link a:hover {
            color: var(--secondary);
        }

        /* Error/Success Messages */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-error {
            background: rgba(247, 37, 133, 0.1);
            border: 1px solid var(--danger);
            color: var(--danger);
        }

        .alert-success {
            background: rgba(76, 201, 240, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .error-text {
            color: var(--danger);
            font-size: 0.8rem;
            margin-top: 0.3rem;
            display: block;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }

            .register-left {
                display: none;
            }

            .register-right {
                padding: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .social-register {
                grid-template-columns: 1fr;
            }

            .progress-steps {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .progress-steps::before {
                display: none;
            }

            .progress-bar {
                display: none;
            }

            .step {
                flex-direction: row;
                gap: 1rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-right > * {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <div class="register-logo">
                <i class="fas fa-code"></i>
                <span>DevBlog</span>
            </div>
            <h2>Join Our Community</h2>
            <p>Create your account and start your journey as a developer with access to exclusive content and resources.</p>
            <ul class="benefits-list">
                <li><i class="fas fa-check-circle"></i> Access to premium tutorials and articles</li>
                <li><i class="fas fa-check-circle"></i> Save and bookmark your favorite content</li>
                <li><i class="fas fa-check-circle"></i> Join discussions with fellow developers</li>
                <li><i class="fas fa-check-circle"></i> Personalize your learning experience</li>
                <li><i class="fas fa-check-circle"></i> Get early access to new features</li>
            </ul>

            <div class="testimonial">
                <p>"DevBlog transformed my coding journey. The community support and quality content helped me land my dream job as a full-stack developer!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">JS</div>
                    <div class="author-info">
                        <h4>John Smith</h4>
                        <span>Senior Developer at TechCorp</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-right">
            <div class="register-header">
                <h1>Create Account</h1>
                <p>Join thousands of developers in our community</p>
            </div>

            <div class="progress-steps">
                <div class="progress-bar" style="width: 0%;" id="progressBar"></div>
                <div class="step active" id="step1">
                    <div class="step-circle">1</div>
                    <span class="step-label">Account</span>
                </div>
                <div class="step" id="step2">
                    <div class="step-circle">2</div>
                    <span class="step-label">Profile</span>
                </div>
                <div class="step" id="step3">
                    <div class="step-circle">3</div>
                    <span class="step-label">Complete</span>
                </div>
            </div>

            <!-- Error/Success Messages -->
            <div class="alert alert-error" style="display: none;" id="errorMessage"></div>

            <form class="register-form" id="registerForm">
                <!-- Step 1: Account Information -->
                <div class="form-step" id="step1Content">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="firstName" class="form-control" placeholder="John" required>
                            </div>
                            <span class="error-text" id="firstNameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="lastName" class="form-control" placeholder="Doe" required>
                            </div>
                            <span class="error-text" id="lastNameError"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" class="form-control" placeholder="you@example.com" required>
                        </div>
                        <span class="error-text" id="emailError"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" class="form-control" placeholder="Create a strong password" required>
                        </div>
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Password strength</div>
                        </div>
                        <span class="error-text" id="passwordError"></span>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm your password" required>
                        </div>
                        <span class="error-text" id="confirmPasswordError"></span>
                    </div>

                    <button type="button" class="register-btn" onclick="nextStep(2)">Continue</button>
                </div>

                <!-- Step 2: Profile Information -->
                <div class="form-step" id="step2Content" style="display: none;">
                    <div class="form-group">
                        <label for="username">Username <span class="required">*</span></label>
                        <div class="input-with-icon">
                            <i class="fas fa-at"></i>
                            <input type="text" id="username" class="form-control" placeholder="johndoe" required>
                        </div>
                        <span class="error-text" id="usernameError"></span>
                    </div>

                    <div class="form-group">
                        <label for="bio">Short Bio</label>
                        <textarea id="bio" class="form-control" placeholder="Tell us about yourself..." rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="skills">Programming Skills</label>
                        <div class="input-with-icon">
                            <i class="fas fa-code"></i>
                            <input type="text" id="skills" class="form-control" placeholder="JavaScript, Python, React...">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="experience">Experience Level</label>
                            <select id="experience" class="form-control">
                                <option value="">Select your level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                                <option value="expert">Expert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Primary Role</label>
                            <select id="role" class="form-control">
                                <option value="">Select your role</option>
                                <option value="frontend">Frontend Developer</option>
                                <option value="backend">Backend Developer</option>
                                <option value="fullstack">Full Stack Developer</option>
                                <option value="mobile">Mobile Developer</option>
                                <option value="devops">DevOps Engineer</option>
                                <option value="student">Student</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <button type="button" class="register-btn" style="background: var(--gray);" onclick="prevStep(1)">Back</button>
                        <button type="button" class="register-btn" onclick="nextStep(3)">Continue</button>
                    </div>
                </div>

                <!-- Step 3: Terms and Completion -->
                <div class="form-step" id="step3Content" style="display: none;">
                    <div class="terms-group">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>. 
                            I understand that I will receive account-related emails.
                        </label>
                    </div>

                    <div class="terms-group">
                        <input type="checkbox" id="newsletter">
                        <label for="newsletter">
                            Send me occasional updates about new features, content, and community events.
                        </label>
                    </div>

                    <div class="form-row">
                        <button type="button" class="register-btn" style="background: var(--gray);" onclick="prevStep(2)">Back</button>
                        <button type="submit" class="register-btn">Create Account</button>
                    </div>
                </div>
            </form>

            <div class="divider">
                <span>Or sign up with</span>
            </div>

            <div class="social-register">
                <a href="#" class="social-btn google">
                    <i class="fab fa-google"></i>
                    Google
                </a>
                <a href="#" class="social-btn github">
                    <i class="fab fa-github"></i>
                    GitHub
                </a>
            </div>

            <div class="login-link">
                Already have an account? <a href="<?=URL_ROOT?>/auth/login">Sign in here</a>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });

        function checkPasswordStrength(password) {
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let text = '';

            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;

            if (strength === 0) {
                text = 'Very Weak';
                strengthFill.style.background = var(--danger);
            } else if (strength <= 25) {
                text = 'Weak';
                strengthFill.style.background = var(--danger);
            } else if (strength <= 50) {
                text = 'Fair';
                strengthFill.style.background = var(--warning);
            } else if (strength <= 75) {
                text = 'Good';
                strengthFill.style.background = var(--success);
            } else {
                text = 'Strong';
                strengthFill.style.background = var(--success);
            }

            strengthFill.style.width = strength + '%';
            strengthText.textContent = text;
        }

        // Form navigation
        function nextStep(step) {
            if (!validateStep(currentStep)) return;

            document.getElementById('step' + currentStep + 'Content').style.display = 'none';
            document.getElementById('step' + currentStep).classList.remove('active');
            
            currentStep = step;
            document.getElementById('step' + currentStep + 'Content').style.display = 'block';
            document.getElementById('step' + currentStep).classList.add('active');
            
            updateProgressBar();
        }

        function prevStep(step) {
            document.getElementById('step' + currentStep + 'Content').style.display = 'none';
            document.getElementById('step' + currentStep).classList.remove('active');
            
            currentStep = step;
            document.getElementById('step' + currentStep + 'Content').style.display = 'block';
            document.getElementById('step' + currentStep).classList.add('active');
            
            updateProgressBar();
        }

        function updateProgressBar() {
            const progress = ((currentStep - 1) / 2) * 100;
            document.getElementById('progressBar').style.width = progress + '%';
        }

        function validateStep(step) {
            let isValid = true;
            clearErrors();

            if (step === 1) {
                const firstName = document.getElementById('firstName').value;
                const lastName = document.getElementById('lastName').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                if (!firstName) {
                    showError('firstNameError', 'First name is required');
                    isValid = false;
                }

                if (!lastName) {
                    showError('lastNameError', 'Last name is required');
                    isValid = false;
                }

                if (!email) {
                    showError('emailError', 'Email is required');
                    isValid = false;
                } else if (!isValidEmail(email)) {
                    showError('emailError', 'Please enter a valid email');
                    isValid = false;
                }

                if (!password) {
                    showError('passwordError', 'Password is required');
                    isValid = false;
                } else if (password.length < 8) {
                    showError('passwordError', 'Password must be at least 8 characters');
                    isValid = false;
                }

                if (password !== confirmPassword) {
                    showError('confirmPasswordError', 'Passwords do not match');
                    isValid = false;
                }
            }

            if (step === 2) {
                const username = document.getElementById('username').value;
                if (!username) {
                    showError('usernameError', 'Username is required');
                    isValid = false;
                }
            }

            return isValid;
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showError(elementId, message) {
            document.getElementById(elementId).textContent = message;
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('.error-text');
            errorElements.forEach(element => {
                element.textContent = '';
            });
        }

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateStep(currentStep)) return;

            const terms = document.getElementById('terms').checked;
            if (!terms) {
                showMessage('Please agree to the terms and conditions', 'error');
                return;
            }

            simulateRegistration();
        });

        function simulateRegistration() {
            const registerBtn = document.querySelector('.register-btn[type="submit"]');
            const originalText = registerBtn.textContent;
            
            registerBtn.textContent = 'Creating Account...';
            registerBtn.disabled = true;

            setTimeout(() => {
                showMessage('Account created successfully! Redirecting...', 'success');
                
                setTimeout(() => {
                    window.location.href = '<?=URL_ROOT?>/dashboard';
                }, 2000);
            }, 2000);
        }

        function showMessage(message, type) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorMessage.className = `alert alert-${type}`;
            errorMessage.style.display = 'block';
        }

        // Demo data for testing
        document.addEventListener('DOMContentLoaded', function() {
            // Pre-fill demo data
            document.getElementById('firstName').value = 'John';
            document.getElementById('lastName').value = 'Doe';
            document.getElementById('email').value = 'john.doe@example.com';
            document.getElementById('password').value = 'Password123!';
            document.getElementById('confirmPassword').value = 'Password123!';
            document.getElementById('username').value = 'johndoe';
        });
    </script>
</body>
</html>