<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$video_url = $_POST['video_url'];

$image = $_FILES['image']['name'];
$target = "assets/Pictures/" . basename($image);
move_uploaded_file($_FILES['image']['tmp_name'], $target);

$conn->query("INSERT INTO playlists (title, description, image_path, video_url)
              VALUES ('$title', '$description', '$target', '$video_url')");
              
header("Location: admin_dashboard.php");
?>
