<?php
class ContactController
{
    public function store(): void
    {
        CSRF::check();

        $name    = trim($_POST['name']    ?? '');
        $email   = trim($_POST['email']   ?? '');
        $message = trim($_POST['message'] ?? '');

        // Validation
        if (empty($name) || empty($email) || empty($message)) {
            $_SESSION['flash_error'] = 'All fields are required.';
            Router::redirect('#section7');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash_error'] = 'Please enter a valid email address.';
            Router::redirect('#section7');
        }

        // Sanitise
        $name    = htmlspecialchars($name,    ENT_QUOTES, 'UTF-8');
        $email   = htmlspecialchars($email,   ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        (new Contact())->create(compact('name', 'email', 'message'));

        CSRF::regenerate();
        $_SESSION['flash_success'] = "Message sent! We'll be in touch soon, {$name}.";
        Router::redirect('#section7');
    }
}
