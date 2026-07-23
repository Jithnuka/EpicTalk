<?php
class Feedback
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(): array
    {
        return $this->db
            ->query('SELECT id, name, feedback FROM feedback ORDER BY id ASC')
            ->fetchAll();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)'
        );
        return $stmt->execute([$data['name'], $data['email'], $data['feedback']]);
    }
}
