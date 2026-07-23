<?php
$host = "sql300.infinityfree.com";
$username = "if0_39263599"; 
$password = "epictalk123"; 
$database = "if0_39263599_epic_talk";


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
