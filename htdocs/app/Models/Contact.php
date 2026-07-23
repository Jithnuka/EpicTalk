<?php
class Contact
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)'
        );
        return $stmt->execute([$data['name'], $data['email'], $data['message']]);
    }
}
