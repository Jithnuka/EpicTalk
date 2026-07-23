<?php
class Playlist
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(): array
    {
        return $this->db
            ->query('SELECT * FROM playlists ORDER BY id DESC')
            ->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM playlists WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO playlists (title, description, image_path, video_url) VALUES (?, ?, ?, ?)'
        );
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['image_path'],
            $data['video_url'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM playlists WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
