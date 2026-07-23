<?php
class PlaylistController
{
    private const UPLOAD_DIR   = '/assets/Pictures/';
    private const ALLOWED_MIME = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    private const MAX_SIZE     = 5 * 1024 * 1024; // 5 MB

    public function store(): void
    {
        $this->requireAdmin();
        CSRF::check();

        $title       = trim($_POST['title']       ?? '');
        $description = trim($_POST['description'] ?? '');
        $videoUrl    = trim($_POST['video_url']   ?? '');

        if (empty($title)) {
            $_SESSION['flash_error'] = 'Title is required.';
            Router::redirect('admin/dashboard');
        }

        $imagePath = '';

        // Handle file upload
        if (!empty($_FILES['image']['name'])) {
            $file = $_FILES['image'];

            // Validate size
            if ($file['size'] > self::MAX_SIZE) {
                $_SESSION['flash_error'] = 'Image must be under 5 MB.';
                Router::redirect('admin/dashboard');
            }

            // Validate MIME type (not just extension)
            $finfo    = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($file['tmp_name']);

            if (!in_array($mimeType, self::ALLOWED_MIME, true)) {
                $_SESSION['flash_error'] = 'Only JPEG, PNG, WebP, and GIF images are allowed.';
                Router::redirect('admin/dashboard');
            }

            // Safe filename: timestamp + sanitised original name
            $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-]/', '', pathinfo($file['name'], PATHINFO_FILENAME)) . '.' . $ext;
            $target   = BASE_PATH . self::UPLOAD_DIR . $safeName;

            if (move_uploaded_file($file['tmp_name'], $target)) {
                $imagePath = 'assets/Pictures/' . $safeName;
            } else {
                $_SESSION['flash_error'] = 'Image upload failed. Check folder permissions.';
                Router::redirect('admin/dashboard');
            }
        }

        (new Playlist())->create([
            'title'       => htmlspecialchars($title,       ENT_QUOTES, 'UTF-8'),
            'description' => htmlspecialchars($description, ENT_QUOTES, 'UTF-8'),
            'image_path'  => $imagePath,
            'video_url'   => filter_var($videoUrl, FILTER_SANITIZE_URL),
        ]);

        CSRF::regenerate();
        $_SESSION['flash_success'] = 'Playlist "' . $title . '" added successfully.';
        Router::redirect('admin/dashboard');
    }

    public function destroy(): void
    {
        $this->requireAdmin();
        CSRF::check();

        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $playlist = (new Playlist())->find($id);

            // Delete the image file if it exists
            if ($playlist && !empty($playlist['image_path'])) {
                $imgPath = BASE_PATH . '/' . $playlist['image_path'];
                if (file_exists($imgPath)) {
                    unlink($imgPath);
                }
            }

            (new Playlist())->delete($id);
            $_SESSION['flash_success'] = 'Playlist deleted.';
        }

        CSRF::regenerate();
        Router::redirect('admin/dashboard');
    }

    private function requireAdmin(): void
    {
        if (empty($_SESSION['admin'])) {
            Router::redirect('admin');
        }
    }
}
