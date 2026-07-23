<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    if ($u == 'admin' && $p == 'wera@123') {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid login";
    }
}
?>
<body style="background-image: url('logo-admin.jpeg'); background-repeat: no-repeat; background-position: center; background-size: cover; padding: 30px; margin-top: 60px;">
      <center><h1 style="text-align: center;">Welcome Epic Talk Admin Team</h1>
        <h3 style="text-align: center; color: goldenrod;">Please Loggin</h3>
<form method="POST">
  <input name="username" placeholder="Username" style="width: 30%; padding: 10px; margin: 10px;"><br>
  <input name="password" type="password" placeholder="Password" style="width: 30%; padding: 10px; margin: 10px;"><br>
  <button type="submit" style="height: 40px; padding: 10px;">Login</button>
  <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
</body>