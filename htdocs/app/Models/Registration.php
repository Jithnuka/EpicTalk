<?php
class Registration
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO registrations (name, email, phone) VALUES (?, ?, ?)'
        );
        return $stmt->execute([$data['name'], $data['email'], $data['phone']]);
    }
}
