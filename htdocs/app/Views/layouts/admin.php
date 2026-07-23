<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Epic Talk Admin</title>
  <link rel="icon" href="<?= View::asset('assets/Pictures/logo-white-modified.png') ?>" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet" />

  <!-- Font Awesome 6 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="<?= View::asset('public/css/app.css') ?>" rel="stylesheet" />
</head>
<body class="admin-page">

<!-- Flash Messages -->
<?php if (!empty($_SESSION['flash_success'])): ?>
  <div class="flash-messages">
    <div class="flash flash-success">
      <i class="fa fa-circle-check"></i>
      <?= htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES, 'UTF-8') ?>
    </div>
  </div>
  <?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['flash_error'])): ?>
  <div class="flash-messages">
    <div class="flash flash-error">
      <i class="fa fa-circle-exclamation"></i>
      <?= htmlspecialchars($_SESSION['flash_error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
  </div>
  <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<?= $content ?>

<script src="<?= View::asset('public/js/app.js') ?>" defer></script>
</body>
</html>
