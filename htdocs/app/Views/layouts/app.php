<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Epic Talk – A podcast channel founded by Shehan Weragoda in Sri Lanka. Inspiring the future through science, psychology, and university success talks." />
  <meta name="keywords" content="Epic Talk, podcast, Shehan Weragoda, Sri Lanka, psychology, science, university" />
  <meta property="og:title" content="Epic Talk – Inspiring The Future" />
  <meta property="og:description" content="A podcast channel bringing the best science-related content to inspire and educate." />
  <meta property="og:type" content="website" />
  <title>Epic Talk – Inspiring The Future</title>
  <link rel="icon" href="<?= View::asset('assets/Pictures/logo-white-modified.png') ?>" />
  <link rel="apple-touch-icon" href="<?= View::asset('assets/Pictures/logo-white-modified.png') ?>" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Font Awesome 6 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="<?= View::asset('public/css/app.css') ?>" rel="stylesheet" />
</head>
<body>

<!-- Scroll Progress -->
<div id="scroll-progress" aria-hidden="true"></div>

<!-- ===================== NAVBAR ===================== -->
<header class="navbar" id="navbar">
  <a href="#section1" class="navbar-logo scroll-link">EPIC TALK</a>

  <nav class="navbar-nav" id="main-nav" aria-label="Main navigation">
    <a href="#section1" class="scroll-link">Home</a>
    <div class="nav-item">
      <a href="#section2" class="scroll-link">About Us ▾</a>
      <div class="sub-nav">
        <a href="#section2" class="scroll-link">Why Epic Talk?</a>
        <a href="#section3" class="scroll-link">Psychology Talks</a>
        <a href="#section5" class="scroll-link">What We Do</a>
      </div>
    </div>
    <a href="#section4" class="scroll-link">Podcasts</a>
    <a href="#section6" class="scroll-link">Reviews</a>
    <a href="#section7" class="scroll-link">Contact</a>
  </nav>

  <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
    <span></span>
    <span></span>
    <span></span>
  </button>
</header>

<!-- ===================== FLASH MESSAGES ===================== -->
<?php if (!empty($_SESSION['flash_success'])): ?>
  <div class="flash-messages" id="flash-container">
    <div class="flash flash-success" role="alert">
      <i class="fa fa-circle-check"></i>
      <?= htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES, 'UTF-8') ?>
    </div>
  </div>
  <?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['flash_error'])): ?>
  <div class="flash-messages" id="flash-container">
    <div class="flash flash-error" role="alert">
      <i class="fa fa-circle-exclamation"></i>
      <?= htmlspecialchars($_SESSION['flash_error'], ENT_QUOTES, 'UTF-8') ?>
    </div>
  </div>
  <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<!-- ===================== PAGE CONTENT ===================== -->
<?= $content ?>

<!-- ===================== FOOTER ===================== -->
<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-logo">EPIC TALK</div>
      <p class="footer-copy">
        <i class="fa fa-copyright"></i> 2025 Epic Talk. All rights reserved.<br>
        Content by <a href="https://www.linkedin.com/in/shehan-weragoda" target="_blank" rel="noopener">Shehan Weragoda</a>
        &nbsp;|&nbsp;
        Developed by <a href="https://www.linkedin.com/in/jithnuka-weerasinghe" target="_blank" rel="noopener">Jithnuka Weerasinghe</a>
      </p>
    </div>
  </div>
</footer>

<!-- ===================== SCRIPTS ===================== -->
<script src="<?= View::asset('public/js/app.js') ?>" defer></script>
</body>
</html>
