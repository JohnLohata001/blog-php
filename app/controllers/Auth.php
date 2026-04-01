<?php
// app/controllers/Auth.php
class Auth extends Controller {
    
    public function index() {
        // Redirect to login page
        header('Location: ' . BASE_URL . '/auth/login');
        exit();
    }
    
    public function register() {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            
            // Basic validation
            $errors = [];
            
            if (empty($username)) {
                $errors[] = "Username is required";
            }
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Valid email is required";
            }
            
            if (empty($password) || strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters";
            }
            
            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match";
            }
            
            if (empty($errors)) {
                // Hash password and save user to database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Here you would typically save to database
                // $userModel = $this->model('User');
                // $result = $userModel->createUser($username, $email, $hashed_password);
                
                // For now, redirect to login
                header('Location: ' . BASE_URL . '/auth/login?registered=1');
                exit();
            }
            
            $this->view('auth/register', ['errors' => $errors, 'old' => $_POST]);
        } else {
            $this->view('auth/register', []);
        }
    }
    
    public function login() {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $errors = [];
            
            if (empty($email) || empty($password)) {
                $errors[] = "Email and password are required";
            }
            
            if (empty($errors)) {
                // Here you would verify credentials against database
                // $userModel = $this->model('User');
                // $user = $userModel->getUserByEmail($email);
                
                // Mock verification (replace with database check)
                $valid_email = "user@example.com";
                $valid_password = password_hash("password123", PASSWORD_DEFAULT);
                
                // if ($user && password_verify($password, $user['password'])) {
                if ($email === $valid_email && password_verify($password, $valid_password)) {
                    // Start session and set user data
                    session_start();
                    $_SESSION['user_id'] = 1; // $user['id']
                    $_SESSION['user_email'] = $email;
                    $_SESSION['logged_in'] = true;
                    
                    header('Location: ' . BASE_URL . '/dashboard');
                    exit();
                } else {
                    $errors[] = "Invalid email or password";
                }
            }
            
            $this->view('auth/login', ['errors' => $errors, 'email' => $email]);
            
        } else {
            $this->view('auth/login', []);
        }
    }
    
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit();
    }
    
    // Helper method to check if user is logged in
    public static function checkAuth() {
        session_start();
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    // Middleware to protect routes
    public static function requireAuth() {
        if (!self::checkAuth()) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit();
        }
    }
}