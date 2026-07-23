<?php
class FeedbackController
{
    /**
     * POST /feedback – Store a new review
     */
    public function store(): void
    {
        CSRF::check();

        $name     = trim($_POST['name']     ?? '');
        $email    = trim($_POST['email']    ?? '');
        $feedback = trim($_POST['feedback'] ?? '');

        if (!empty($name) && !empty($email) && !empty($feedback) &&
            filter_var($email, FILTER_VALIDATE_EMAIL)) {
            (new Feedback())->create([
                'name'     => htmlspecialchars($name,     ENT_QUOTES, 'UTF-8'),
                'email'    => htmlspecialchars($email,    ENT_QUOTES, 'UTF-8'),
                'feedback' => htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8'),
            ]);
        }

        CSRF::regenerate();
        $_SESSION['flash_success'] = 'Thank you for your review! 🎙️';
        Router::redirect('#section6');
    }

    /**
     * GET /feedback – Return reviews as JSON for the dynamic display
     */
    public function index(): void
    {
        try {
            $reviews = (new Feedback())->all();
            $payload = array_map(fn($r) => [
                'name'     => $r['name'],
                'feedback' => $r['feedback'],
            ], $reviews);
        } catch (Exception $e) {
            $payload = [];
        }

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE);
        exit();
    }
}
