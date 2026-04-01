<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DevBlog</title>
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

        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            min-height: 600px;
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            z-index: 1;
            position: relative;
        }

        .login-logo i {
            font-size: 2rem;
            color: var(--accent);
        }

        .login-left h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            z-index: 1;
            position: relative;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            z-index: 1;
            position: relative;
        }

        .features-list {
            list-style: none;
            z-index: 1;
            position: relative;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .features-list i {
            color: var(--accent);
            font-size: 1.2rem;
        }

        .login-right {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: var(--gray);
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
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

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember-me input {
            width: auto;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-password:hover {
            color: var(--secondary);
        }

        .login-btn {
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

        .login-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .login-btn:active {
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

        .social-login {
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

        .register-link {
            text-align: center;
            margin-top: 1rem;
            color: var(--gray);
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .register-link a:hover {
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 400px;
            }

            .login-left {
                display: none;
            }

            .login-right {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .social-login {
                grid-template-columns: 1fr;
            }

            .form-options {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-right > * {
            animation: fadeIn 0.6s ease forwards;
        }

        .login-right > *:nth-child(1) { animation-delay: 0.1s; }
        .login-right > *:nth-child(2) { animation-delay: 0.2s; }
        .login-right > *:nth-child(3) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <div class="login-logo">
                <i class="fas fa-code"></i>
                <span>DevBlog</span>
            </div>
            <h2>Welcome Back!</h2>
            <p>Sign in to your account to continue your coding journey and access exclusive content.</p>
            <ul class="features-list">
                <li><i class="fas fa-check-circle"></i> Access to premium tutorials</li>
                <li><i class="fas fa-check-circle"></i> Save your favorite articles</li>
                <li><i class="fas fa-check-circle"></i> Join the developer community</li>
                <li><i class="fas fa-check-circle"></i> Personalize your reading experience</li>
            </ul>
        </div>

        <div class="login-right">
            <div class="login-header">
                <h1>Sign In</h1>
                <p>Enter your credentials to access your account</p>
            </div>

            <!-- Error/Success Messages -->
            <div class="alert alert-error" style="display: none;" id="errorMessage">
                Invalid email or password. Please try again.
            </div>

            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" class="form-control" placeholder="you@example.com" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" >
                    </div>
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" class="login-btn">Sign In</button>
            </form>

            <div class="divider">
                <span>Or continue with</span>
            </div>

            <div class="social-login">
                <a href="#" class="social-btn google">
                    <i class="fab fa-google"></i>
                    Google
                </a>
                <a href="#" class="social-btn github">
                    <i class="fab fa-github"></i>
                    GitHub
                </a>
            </div>

            <div class="register-link">
                Don't have an account? <a href="<?=URL_ROOT?>/auth/register">Sign up here</a>
            </div>
        </div>
    </div>

    <script>
        // Form submission handling
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('errorMessage');
            
            // Simple validation
            if (!email || !password) {
                showError('Please fill in all fields');
                return;
            }
            
            if (!isValidEmail(email)) {
                showError('Please enter a valid email address');
                return;
            }
            
            // Simulate login process (replace with actual API call)
            simulateLogin(email, password);
        });
        
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
            
            // Hide error after 5 seconds
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }
        
        function simulateLogin(email, password) {
            const loginBtn = document.querySelector('.login-btn');
            const originalText = loginBtn.textContent;
            
            // Show loading state
            loginBtn.textContent = 'Signing In...';
            loginBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // This is a simulation - replace with actual authentication
                if (email === 'demo@devblog.com' && password === 'password') {
                    // Successful login
                    window.location.href = '<?=URL_ROOT?>/admin/dashboard';
                } else {
                    // Failed login
                    showError('Invalid email or password. Please try again.');
                    loginBtn.textContent = originalText;
                    loginBtn.disabled = false;
                }
            }, 1500);
        }
        
        // Demo credentials helper
        document.addEventListener('DOMContentLoaded', function() {
            // Pre-fill demo credentials for testing
            document.getElementById('email').value = 'demo@devblog.com';
            document.getElementById('password').value = 'password';
        });
    </script>
</body>
</html>