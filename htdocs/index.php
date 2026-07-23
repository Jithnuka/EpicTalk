<?php
/**
 * Epic Talk – Front Controller
 * All web requests are routed through this file via .htaccess
 */

session_start();

// ── Path Constants ──────────────────────────────────────────
define('BASE_PATH',   __DIR__);
define('APP_PATH',    BASE_PATH . '/app');
define('VIEWS_PATH',  APP_PATH . '/Views');
define('CONFIG_PATH', BASE_PATH . '/config');

// ── Error Reporting (disable in production) ─────────────────
error_reporting(0);
ini_set('display_errors', '0');

// ── Manual Requires (no Composer) ───────────────────────────
$coreFiles = [
    '/Core/Router.php',
    '/Core/View.php',
    '/Core/CSRF.php',
];
$modelFiles = [
    '/Models/Database.php',
    '/Models/Playlist.php',
    '/Models/Feedback.php',
    '/Models/Contact.php',
    '/Models/Registration.php',
];
$controllerFiles = [
    '/Controllers/HomeController.php',
    '/Controllers/ContactController.php',
    '/Controllers/FeedbackController.php',
    '/Controllers/RegisterController.php',
    '/Controllers/Admin/AuthController.php',
    '/Controllers/Admin/DashboardController.php',
    '/Controllers/Admin/PlaylistController.php',
];

foreach (array_merge($coreFiles, $modelFiles, $controllerFiles) as $file) {
    require_once APP_PATH . $file;
}

// ── Router Bootstrap ─────────────────────────────────────────
$router = new Router();

// Public routes
$router->get('/',          [HomeController::class, 'index']);
$router->post('/contact',  [ContactController::class, 'store']);
$router->post('/feedback', [FeedbackController::class, 'store']);
$router->get('/feedback',  [FeedbackController::class, 'index']);
$router->post('/register', [RegisterController::class, 'store']);

// Admin routes
$router->get( '/admin',                   [AuthController::class,      'loginForm']);
$router->post('/admin/login',             [AuthController::class,      'login']);
$router->get( '/admin/logout',            [AuthController::class,      'logout']);
$router->get( '/admin/dashboard',         [DashboardController::class, 'index']);
$router->post('/admin/playlists/store',   [PlaylistController::class,  'store']);
$router->post('/admin/playlists/delete',  [PlaylistController::class,  'destroy']);

// ── Dispatch ─────────────────────────────────────────────────
$router->dispatch();