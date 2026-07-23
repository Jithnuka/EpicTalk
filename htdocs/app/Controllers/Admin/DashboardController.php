<?php
class DashboardController
{
    public function index(): void
    {
        $this->requireAdmin();
        $playlists = (new Playlist())->all();
        View::render('admin.dashboard', ['playlists' => $playlists], 'layouts/admin');
    }

    private function requireAdmin(): void
    {
        if (empty($_SESSION['admin'])) {
            header('Location: /admin');
            exit();
        }
    }
}
