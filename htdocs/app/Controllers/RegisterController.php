<?php
class RegisterController
{
    public function store(): void
    {
        CSRF::check();

        $name  = trim($_POST['name']  ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if (!empty($name) && !empty($email) && !empty($phone) &&
            filter_var($email, FILTER_VALIDATE_EMAIL)) {
            (new Registration())->create([
                'name'  => htmlspecialchars($name,  ENT_QUOTES, 'UTF-8'),
                'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
                'phone' => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
            ]);
        }

        CSRF::regenerate();
        $_SESSION['flash_success'] = " Registration successful! See you at the live discussion, {$name}.";
        header('Location: /#section3');
        exit();
    }
}
