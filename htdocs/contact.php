<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Message sent successfully!');window.location.href = 'index.php';</script>";
            exit();
        } else {
            echo "Error saving message: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
$conn->close();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
