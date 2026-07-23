<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM playlists WHERE id=$id");
header("Location: admin_dashboard.php");
?>
