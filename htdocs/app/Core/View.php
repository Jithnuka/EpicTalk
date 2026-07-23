<?php
/**
 * View Renderer
 * Captures view content into $content, then wraps it in a layout.
 * Usage: View::render('home.index', ['data' => $data], 'layouts/app');
 */
class View
{
    /**
     * Render a view, optionally wrapped in a layout.
     *
     * @param string      $view   Dot-separated view path relative to VIEWS_PATH
     * @param array       $data   Variables to extract into the view
     * @param string|null $layout Layout file (relative to VIEWS_PATH) or null for no layout
     */
    public static function render(string $view, array $data = [], ?string $layout = 'layouts/app'): void
    {
        // Make data variables available in view scope
        extract($data, EXTR_SKIP);

        // Capture view content into buffer
        ob_start();
        $viewFile = VIEWS_PATH . '/' . str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "<p>View not found: {$view}</p>";
        }
        $content = ob_get_clean();

        // Render layout (which echoes $content) or echo directly
        if ($layout) {
            $layoutFile = VIEWS_PATH . '/' . $layout . '.php';
            if (file_exists($layoutFile)) {
                include $layoutFile;
            } else {
                echo $content;
            }
        } else {
            echo $content;
        }
    }

    /**
     * Helper: escape output for XSS prevention
     */
    public static function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    /**
     * Helper: generate absolute URL for assets dynamically
     */
    public static function asset(string $path): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $script = $_SERVER['SCRIPT_NAME'] ?? '/';
        $baseDir = rtrim(dirname($script), '/\\');
        return $protocol . '://' . $host . $baseDir . '/' . ltrim($path, '/');
    }

    /**
     * Helper: generate URL for route links/forms preserving fallback index.php if needed
     */
    public static function route(string $path): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $script = $_SERVER['SCRIPT_NAME'] ?? '/';
        $baseDir = rtrim(dirname($script), '/\\');

        if (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
            return $protocol . '://' . $host . $script . '/' . ltrim($path, '/');
        } else {
            return $protocol . '://' . $host . $baseDir . '/' . ltrim($path, '/');
        }
    }
}
