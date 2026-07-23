<div class="admin-wrap">

  <!-- ===== SIDEBAR ===== -->
  <aside class="admin-sidebar">
    <div>
      <div class="admin-sidebar-logo">EPIC TALK</div>
      <div class="admin-sidebar-sub">ADMIN PANEL</div>

      <nav aria-label="Admin navigation">
        <a href="<?= View::route('admin/dashboard') ?>" class="admin-nav-item active">
          <i class="fa fa-gauge-high" aria-hidden="true"></i> Dashboard
        </a>
        <a href="<?= View::route('/') ?>" target="_blank" class="admin-nav-item">
          <i class="fa fa-globe" aria-hidden="true"></i> View Site
        </a>
      </nav>
    </div>

    <div class="admin-sidebar-footer">
      <div class="admin-nav-item" style="cursor:default;color:var(--clr-text-3);font-size:12px;padding:8px 16px;">
        <i class="fa fa-user-shield"></i>
        <?= htmlspecialchars($_SESSION['admin_user'] ?? 'admin', ENT_QUOTES, 'UTF-8') ?>
      </div>
      <a href="<?= View::route('admin/logout') ?>" class="admin-logout">
        <i class="fa fa-right-from-bracket"></i> Sign Out
      </a>
    </div>
  </aside>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="admin-main">

    <div class="admin-header">
      <h1 class="admin-header-title">Dashboard</h1>
      <div class="admin-header-user">
        <div class="admin-avatar">A</div>
        Welcome, <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin', ENT_QUOTES, 'UTF-8') ?>
      </div>
    </div>

    <!-- Add Playlist Card -->
    <div class="admin-card">
      <h2 class="admin-card-title">
        <i class="fa fa-circle-plus"></i> Add New Playlist
      </h2>

      <form method="POST" action="<?= View::route('admin/playlists/store') ?>" enctype="multipart/form-data" id="add-playlist-form" novalidate>
        <?= CSRF::field() ?>

        <div class="admin-form-grid">
          <div class="input-group">
            <input type="text" name="title" id="pl-title" placeholder="Playlist Title" required />
            <label for="pl-title">Title</label>
          </div>
          <div class="input-group">
            <input type="url" name="video_url" id="pl-url" placeholder="YouTube URL" />
            <label for="pl-url">YouTube URL</label>
          </div>
        </div>

        <div class="input-group">
          <textarea name="description" id="pl-desc" rows="4" placeholder="Playlist description..."></textarea>
          <label for="pl-desc">Description</label>
        </div>

        <!-- Image Upload Area -->
        <div class="upload-area" id="upload-area" role="button" tabindex="0" aria-label="Upload thumbnail image">
          <div class="upload-icon"><i class="fa fa-cloud-arrow-up"></i></div>
          <p class="upload-text">
            Drag &amp; drop your thumbnail here, or <span>click to browse</span>
          </p>
          <p style="font-size:12px;color:var(--clr-text-3);margin-top:8px;">
            JPEG, PNG, WebP · Max 5MB
          </p>
          <input type="file" name="image" id="image-upload" accept="image/jpeg,image/png,image/webp,image/gif"
                 style="display:none;" aria-label="Thumbnail image file" />
        </div>
        <div id="upload-preview"></div>

        <div style="text-align:right;margin-top:16px;">
          <button type="submit" class="btn-primary" id="add-playlist-btn"
                  style="width:auto;padding:14px 32px;">
            <i class="fa fa-plus"></i> Add Playlist
          </button>
        </div>
      </form>
    </div>

    <!-- Current Playlists Card -->
    <div class="admin-card">
      <h2 class="admin-card-title">
        <i class="fa fa-list"></i>
        Current Playlists
        <span style="font-size:14px;font-weight:400;color:var(--clr-text-3);margin-left:8px;">
          (<?= count($playlists) ?> total)
        </span>
      </h2>

      <?php if (empty($playlists)): ?>
        <p style="color:var(--clr-text-3);font-size:14px;text-align:center;padding:40px 0;">
          No playlists yet. Add your first one above!
        </p>
      <?php else: ?>
        <div style="overflow-x:auto;">
          <table class="admin-table">
            <thead>
              <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Description</th>
                <th>Video URL</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($playlists as $playlist): ?>
                <tr>
                  <td>
                    <?php if (!empty($playlist['image_path'])): ?>
                      <img src="<?= View::asset(htmlspecialchars($playlist['image_path'], ENT_QUOTES, 'UTF-8')) ?>"
                           alt="<?= htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') ?>" />
                    <?php else: ?>
                      <div style="width:60px;height:40px;background:var(--clr-surface-2);border-radius:6px;display:flex;align-items:center;justify-content:center;">
                        <i class="fa fa-image" style="color:var(--clr-text-3);font-size:16px;"></i>
                      </div>
                    <?php endif; ?>
                  </td>
                  <td style="font-weight:600;color:var(--clr-text);">
                    <?= View::e($playlist['title']) ?>
                  </td>
                  <td style="max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                    <?= View::e(substr($playlist['description'] ?? '', 0, 80)) ?>
                    <?= (strlen($playlist['description'] ?? '') > 80) ? '…' : '' ?>
                  </td>
                  <td>
                    <?php if (!empty($playlist['video_url'])): ?>
                      <a href="<?= View::e($playlist['video_url']) ?>"
                         target="_blank" rel="noopener noreferrer"
                         style="color:var(--clr-gold);font-size:13px;">
                        <i class="fa fa-external-link"></i> Open
                      </a>
                    <?php else: ?>
                      <span style="color:var(--clr-text-3);">—</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <form method="POST" action="<?= View::route('admin/playlists/delete') ?>" style="display:inline;">
                      <?= CSRF::field() ?>
                      <input type="hidden" name="id" value="<?= (int) $playlist['id'] ?>" />
                      <button type="submit" class="btn-delete" onclick="return confirm('Delete \'<?= htmlspecialchars(addslashes($playlist['title']), ENT_QUOTES, 'UTF-8') ?>\'?')">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </main>
</div>
