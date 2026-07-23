<?php
class HomeController
{
    public function index(): void
    {
        // Gracefully handle DB unavailability (e.g., local dev without DB access)
        try {
            $playlists = (new Playlist())->all();
        } catch (Exception $e) {
            $playlists = [];
        }
        View::render('home.index', ['playlists' => $playlists]);
    }
}
