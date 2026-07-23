<div class="admin-login-wrap">
  <div class="admin-login-card">

    <div class="admin-login-logo">
      <img src="<?= View::asset('admin/logo-admin.jpeg') ?>" alt="Epic Talk Logo" onerror="this.style.display='none'" />
      <div style="font-family:var(--font-serif);font-size:28px;font-weight:700;background:linear-gradient(135deg,#f5a425,#f9c56a);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-top:8px;">
        EPIC TALK
      </div>
    </div>

    <h1 class="admin-login-title">Admin Portal</h1>
    <p class="admin-login-subtitle">Sign in to manage your content</p>

    <form method="POST" action="<?= View::route('admin/login') ?>" novalidate id="admin-login-form">
      <?= CSRF::field() ?>

      <div class="input-group">
        <input type="text" name="username" id="admin-username" placeholder="Username"
               required autocomplete="username" autofocus />
        <label for="admin-username">Username</label>
      </div>

      <div class="input-group">
        <input type="password" name="password" id="admin-password" placeholder="Password"
               required autocomplete="current-password" />
        <label for="admin-password">Password</label>
      </div>

      <button type="submit" class="btn-primary" id="admin-login-btn" style="margin-top:8px;">
        <i class="fa fa-lock"></i>&nbsp; Sign In
      </button>
    </form>

    <p style="text-align:center;font-size:12px;color:var(--clr-text-3);margin-top:24px;">
      <a href="<?= View::route('/') ?>" style="color:var(--clr-text-3);">← Back to main site</a>
    </p>

  </div>
</div>
