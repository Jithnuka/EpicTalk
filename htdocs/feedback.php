<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');

    if ($name && $email && $feedback) {
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $feedback);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php#section7");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM feedback ORDER BY id ASC");
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row['feedback'];
    }
    header('Content-Type: application/json');
    echo json_encode($reviews);
    exit();
}
?>