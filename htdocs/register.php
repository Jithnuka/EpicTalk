<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    if (!empty($name) && !empty($email) && !empty($phone)) {
        $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');window.location.href = 'index.php';</script>";
            exit();

        } else {
            echo "Error saving registration: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
$conn->close();
?>
