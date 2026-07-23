<?php
/**
 * CSRF Token Helper
 * Generates and validates synchronizer tokens to prevent cross-site request forgery.
 */
class CSRF
{
    private const TOKEN_KEY = 'csrf_token';

    /**
     * Get (or create) the session CSRF token.
     */
    public static function token(): string
    {
        if (empty($_SESSION[self::TOKEN_KEY])) {
            $_SESSION[self::TOKEN_KEY] = bin2hex(random_bytes(32));
        }
        return $_SESSION[self::TOKEN_KEY];
    }

    /**
     * Return an HTML hidden input for embedding in forms.
     */
    public static function field(): string
    {
        return '<input type="hidden" name="_csrf_token" value="' . self::token() . '">';
    }

    /**
     * Verify the submitted token against the session.
     * Terminates with 403 if invalid.
     */
    public static function check(): void
    {
        $submitted = $_POST['_csrf_token'] ?? '';
        if (!hash_equals(self::token(), $submitted)) {
            http_response_code(403);
            header('Content-Type: text/html; charset=UTF-8');
            die('
                <h1 style="font-family:sans-serif;color:#f87171;text-align:center;margin-top:15vh">
                    403 – Security Token Mismatch
                </h1>
                <p style="text-align:center;font-family:sans-serif;color:#666">
                    Your session may have expired. <a href="/">Go back</a> and try again.
                </p>
            ');
        }
    }

    /**
     * Rotate the token after a successful form submission.
     */
    public static function regenerate(): void
    {
        $_SESSION[self::TOKEN_KEY] = bin2hex(random_bytes(32));
    }
}
