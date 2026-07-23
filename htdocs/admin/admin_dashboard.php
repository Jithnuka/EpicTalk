<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db.php';

$result = $conn->query("SELECT * FROM playlists");
?>
<body style="background-image: url('logo-admin.jpeg'); background-repeat: no-repeat; background-position: center; background-size: cover; padding: 30px; margin-top: 60px;">
  <center><h1 style="text-align: center; color: goldenrod;">Welcome Epic Talk Admin Team | <a href="logout.php" style="text-align: right;">Logout</a></h1>

<form method="POST" action="add_playlist.php" enctype="multipart/form-data" style="padding: 20px;">
  <input name="title" placeholder="Title" style="width: 30%; padding: 10px; margin: 10px;"><br>
  <textarea name="description" placeholder="Description" rows="6" style="width: 30%; padding: 10px; margin: 10px;"></textarea><br>
  <input name="image" type="file" style="width: 30%; padding: 10px; margin: 10px;" ><br>
  <input name="video_url" placeholder="YouTube URL" style="width: 30%; padding: 10px; margin: 10px;"><br>
  <button type="submit" style="height: 40px; padding: 10px;">Add Playlist</button>
</form></center>

<h2>Current Playlists</h2>
<ul>
<?php while($row = $result->fetch_assoc()): ?>
  <li style="font-size: 20px;">
    <b><?= $row['title'] ?></b>
    <a href="delete_playlist.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
  </li>
<?php endwhile; ?>
</ul>
</body>
