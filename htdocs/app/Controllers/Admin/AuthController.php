<?php
class AuthController
{
    public function loginForm(): void
    {
        if (isset($_SESSION['admin'])) {
            Router::redirect('admin/dashboard');
        }
        View::render('admin.login', [], 'layouts/admin');
    }

    public function login(): void
    {
        CSRF::check();

        // Rate limit: max 5 attempts per 10 minutes
        $attempts = $_SESSION['login_attempts'] ?? 0;
        $lastAttempt = $_SESSION['last_attempt_time'] ?? 0;

        if ($attempts >= 5 && (time() - $lastAttempt) < 600) {
            $_SESSION['flash_error'] = 'Too many login attempts. Please wait 10 minutes.';
            Router::redirect('admin');
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password']      ?? '';

        $config = require CONFIG_PATH . '/admin.php';

        // Check if config file was correctly returned as an array
        if (!is_array($config)) {
            $_SESSION['flash_error'] = '⚠️ Configuration corrupted. Please visit /setup.php to regenerate.';
            Router::redirect('admin');
        }

        // Handle uninitialized setup
        if (($config['password_hash'] ?? '') === 'SETUP_REQUIRED') {
            $_SESSION['flash_error'] = '⚠️ Admin not configured. Visit /setup.php to set your password.';
            Router::redirect('admin');
        }

        if ($username === $config['username'] && password_verify($password, $config['password_hash'])) {
            // Successful login — reset counters
            unset($_SESSION['login_attempts'], $_SESSION['last_attempt_time']);
            
            // Safe session regeneration for strict hosts (InfinityFree)
            try {
                session_regenerate_id(true);
            } catch (Exception $e) {
                // Ignore if platform restricts session regeneration
            }

            $_SESSION['admin']      = true;
            $_SESSION['admin_user'] = $username;
            CSRF::regenerate();
            Router::redirect('admin/dashboard');
        } else {
            // Track failed attempt
            $_SESSION['login_attempts']  = $attempts + 1;
            $_SESSION['last_attempt_time'] = time();
            $_SESSION['flash_error'] = 'Invalid username or password.';
            Router::redirect('admin');
        }
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        Router::redirect('admin');
    }
}
