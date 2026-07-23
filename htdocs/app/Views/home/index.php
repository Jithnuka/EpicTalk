<!-- ===================== HERO ===================== -->
<section id="section1" class="hero" data-section="section1">
  <video autoplay muted loop playsinline class="hero-video" aria-hidden="true">
    <source src="<?= View::asset('assets/Pictures/Intro.mp4') ?>" type="video/mp4" />
  </video>
  <div class="hero-overlay"></div>

  <div class="hero-content" data-aos="fade-up">
    <div class="hero-badge">Inspiring The Future</div>
    <h1 class="hero-title">By <em>Shehan Weragoda</em></h1>
    <p class="hero-subtitle">Podcast Channel &nbsp;·&nbsp; Sri Lanka</p>
    <a href="#section2" class="hero-cta scroll-link" id="hero-discover-btn">
      Discover More
      <span class="cta-arrow">↓</span>
    </a>
  </div>

  <div class="scroll-indicator" aria-hidden="true">
    <div class="scroll-dot"></div>
  </div>
</section>

<!-- ===================== FEATURES STRIP ===================== -->
<section class="features-section" aria-label="What we offer">
  <div class="features-grid">

    <article class="feature-card" data-aos="fade-up" data-delay="0">
      <i class="fa fa-microphone feature-icon" aria-hidden="true"></i>
      <h3 class="feature-title">Podcast</h3>
      <p class="feature-text">
        We dive deep into a wide range of topics—from science and education to entertainment and beyond.
        Whether it's thought-provoking discussions, expert insights, or exploring the wonders of the world,
        we bring you conversations that make you think, learn, and stay inspired.<br><br>
        Now streaming on Apple Podcasts, Spotify, and all major podcast platforms!<br>
        Welcome to EpicTalk Audio Podcast, hosted by Shehan Weragoda and Chanka Weligamage!
      </p>
      <a href="#section2" class="feature-link scroll-link">
        More Info <i class="fa fa-arrow-right"></i>
      </a>
    </article>

    <article class="feature-card" data-aos="fade-up" data-delay="100">
      <i class="fas fa-brain feature-icon" aria-hidden="true"></i>
      <h3 class="feature-title">Psychology Talks</h3>
      <p class="feature-text">
        Welcome, Students! 📚 Explore our Psychology Insights Playlist, specially curated for you.
        This playlist features a variety of podcasts that explore the fascinating world of psychology.
        Whether you're interested in mental health, human behavior, or the latest research in the field,
        you'll find something to interest you here.
      </p>
      <a href="#section3" class="feature-link scroll-link">
        Explore <i class="fa fa-arrow-right"></i>
      </a>
    </article>

    <article class="feature-card" data-aos="fade-up" data-delay="200">
      <i class="fa fa-graduation-cap feature-icon" aria-hidden="true"></i>
      <h3 class="feature-title">University Success</h3>
      <p class="feature-text">
        Welcome to the Ultimate University Success Playlist! 🎓
        Are you a university student looking for guidance and tips to make the most out of your academic journey?
        This playlist is tailor-made just for you. Tune in to insightful podcasts where we share the best strategies,
        advice, and practical tips to navigate university life like a pro.
      </p>
      <a href="#section4" class="feature-link scroll-link">
        Read More <i class="fa fa-arrow-right"></i>
      </a>
    </article>

  </div>
</section>

<!-- ===================== WHY EPIC TALK ===================== -->
<section id="section2" class="section why-section" data-section="section2">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <p class="section-tag">Our Story</p>
      <h2 class="section-title">Why Choose <em>Epic Talk?</em></h2>
    </div>

    <!-- Tab Navigation -->
    <div class="tabs-nav" role="tablist" data-aos="fade-up" data-delay="100">
      <button class="tab-btn active" data-tab="tab-1" role="tab" aria-selected="true" id="tab-btn-1">
        Best Science Content
      </button>
      <button class="tab-btn" data-tab="tab-2" role="tab" aria-selected="false" id="tab-btn-2">
        Informative &amp; Engaging
      </button>
      <button class="tab-btn" data-tab="tab-3" role="tab" aria-selected="false" id="tab-btn-3">
        Platform for Everyone
      </button>
    </div>

    <!-- Tab Panels -->
    <div id="tab-1" class="tab-content active" role="tabpanel" aria-labelledby="tab-btn-1">
      <div class="tab-layout">
        <div class="tab-image">
          <img src="<?= View::asset('assets/Pictures/chose-us_1.jpeg') ?>" alt="Best Science Content" loading="lazy" />
        </div>
        <div class="tab-body">
          <h3>Best Science Content</h3>
          <p>
            Epic Talk is a podcast channel founded by Shehan Weragoda in Sri Lanka. Our goal is to bring
            the best science-related content to our audience. Join us on this epic journey as we delve
            into the world of science and discover all its wonders.
          </p>
          <a href="https://www.youtube.com/@epictalkLK" target="_blank" rel="noopener noreferrer" class="btn-outline">
            <i class="fa fa-youtube"></i> Join Epic Talk
          </a>
        </div>
      </div>
    </div>

    <div id="tab-2" class="tab-content" role="tabpanel" aria-labelledby="tab-btn-2">
      <div class="tab-layout">
        <div class="tab-image">
          <img src="<?= View::asset('assets/Pictures/chose-us_2.jpeg') ?>" alt="Informative and Engaging" loading="lazy" />
        </div>
        <div class="tab-body">
          <h3>Informative &amp; Engaging</h3>
          <p>
            Our goal is to bring the best science-related content to our audience, with a focus on
            creating informative and engaging podcasts that spark curiosity and deepen understanding.
          </p>
          <p>
            We craft every episode to be both educational and captivating — because great science
            should never be boring.
          </p>
          <a href="https://www.youtube.com/@epictalkLK" target="_blank" rel="noopener noreferrer" class="btn-outline">
            <i class="fa fa-youtube"></i> Join Epic Talk
          </a>
        </div>
      </div>
    </div>

    <div id="tab-3" class="tab-content" role="tabpanel" aria-labelledby="tab-btn-3">
      <div class="tab-layout">
        <div class="tab-image">
          <img src="<?= View::asset('assets/Pictures/chose-us_3.jpeg') ?>" alt="Platform for Everyone" loading="lazy" />
        </div>
        <div class="tab-body">
          <h3>Platform for Everyone</h3>
          <p>
            We strive to create a platform that is accessible to everyone, where important topics
            related to science can be discussed and explored freely.
          </p>
          <p>
            Whether you're a student, a professional, or simply a curious mind, Epic Talk has
            something meaningful for you.
          </p>
          <a href="https://www.youtube.com/@epictalkLK" target="_blank" rel="noopener noreferrer" class="btn-outline">
            <i class="fa fa-youtube"></i> Join Epic Talk
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ===================== PSYCHOLOGY TALK + REGISTRATION ===================== -->
<section id="section3" class="section psychology-section" data-section="section3">
  <div class="container">
    <div class="split-layout">

      <!-- Left: Psychology Content -->
      <div data-aos="fade-right">
        <p class="section-tag">Curated Playlist</p>
        <h2 class="section-title"><em>Psychology</em> Talk</h2>
        <div class="psychology-image" style="margin-top:24px;">
          <img src="<?= View::asset('assets/Pictures/psychology.jpeg') ?>" alt="Psychology Talk Podcast" loading="lazy" />
        </div>
        <p class="psychology-text">
          Welcome, Students! 📚 Explore our Psychology Insights Playlist, specially curated for you.
          This playlist features a variety of podcasts that explore the fascinating world of psychology.
          Whether you're interested in learning about mental health, human behavior, or the latest
          research in the field, you'll find something to interest you here.
        </p>
        <a href="https://youtube.com/playlist?list=PL5djM33meCXZKwbFWANJnxyc9Nz6fmRJN&si=ZZU3N-Uck8cmDgUT"
           target="_blank" rel="noopener noreferrer" class="psychology-link">
          Psychology Talk Playlist <i class="fa fa-arrow-right"></i>
        </a>
      </div>

      <!-- Right: Registration Form -->
      <div data-aos="fade-left" data-delay="150">
        <div class="form-card">
          <h3 class="form-card-title">Register for Live Discussion</h3>
          <p class="form-card-subtitle">Join our next live psychology discussion session.</p>

          <form method="POST" action="<?= View::route('register') ?>" novalidate id="register-form">
            <?= CSRF::field() ?>

            <div class="input-group">
              <input type="text" name="name" id="reg-name" placeholder="Your Name" required autocomplete="name" />
              <label for="reg-name">Your Name</label>
            </div>

            <div class="input-group">
              <input type="email" name="email" id="reg-email" placeholder="Your Email" required autocomplete="email" />
              <label for="reg-email">Your Email</label>
            </div>

            <div class="input-group">
              <input type="tel" name="phone" id="reg-phone" placeholder="Your Phone Number" required autocomplete="tel" />
              <label for="reg-phone">Phone Number</label>
            </div>

            <button type="submit" class="btn-primary" id="register-submit-btn">
              <i class="fa fa-calendar-check"></i>&nbsp; Register Now
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== PLAYLISTS / PODCASTS ===================== -->
<section id="section4" class="section playlists-section" data-section="section4">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <p class="section-tag">Our Content</p>
      <h2 class="section-title">Watch Our <em>Podcasts</em></h2>
    </div>

    <?php if (empty($playlists)): ?>
      <div class="empty-playlists" data-aos="fade-up">
        <i class="fa fa-podcast" style="font-size:48px;color:var(--clr-text-3);display:block;text-align:center;margin-bottom:16px;"></i>
        <p style="text-align:center;color:var(--clr-text-2);">No playlists yet. Check back soon!</p>
      </div>
    <?php else: ?>
      <div class="playlists-grid">
        <?php foreach ($playlists as $i => $playlist): ?>
          <article class="playlist-card" data-aos="fade-up" data-delay="<?= ($i % 3) * 100 ?>">
            <div class="playlist-thumb">
              <?php if (!empty($playlist['image_path'])): ?>
                <img src="<?= View::asset(htmlspecialchars($playlist['image_path'], ENT_QUOTES, 'UTF-8')) ?>"
                     alt="<?= htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') ?>"
                     loading="lazy" />
              <?php else: ?>
                <div style="width:100%;height:100%;background:var(--clr-surface-2);display:flex;align-items:center;justify-content:center;">
                  <i class="fa fa-podcast" style="font-size:40px;color:var(--clr-text-3);"></i>
                </div>
              <?php endif; ?>
              <div class="playlist-thumb-overlay">
                <div class="play-icon"><i class="fa fa-play"></i></div>
              </div>
            </div>
            <div class="playlist-body">
              <h3 class="playlist-title"><?= View::e($playlist['title']) ?></h3>
              <p class="playlist-desc"><?= nl2br(View::e($playlist['description'] ?? '')) ?></p>
              <a href="<?= View::e($playlist['video_url'] ?? '') ?>"
                 target="_blank" rel="noopener noreferrer" class="playlist-watch">
                Watch Now <i class="fa fa-arrow-right"></i>
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ===================== INTRO VIDEO ===================== -->
<section id="section5" class="section video-section" data-section="section5">
  <div class="container">
    <div class="video-layout">

      <div data-aos="fade-right">
        <p class="video-label">Inspiring The Future</p>
        <h2 class="video-title">Watch the video to get more life tips<br><em>For a Successful Life</em></h2>
        <p class="video-text">
          Epic Talk is a podcast channel founded by Shehan Weragoda in Sri Lanka. Our goal is to bring
          the best science-related content to our audience, with a focus on creating informative and
          engaging podcasts. We strive to create a platform that is accessible to everyone, where
          important topics related to science can be discussed and explored. Join us on this epic journey
          as we delve into the world of science and discover all its wonders.
          <a href="https://www.youtube.com/@epictalkLK" target="_blank" rel="noopener noreferrer">
            Click here to connect with us.
          </a>
        </p>
      </div>

      <div data-aos="fade-left" data-delay="150">
        <div class="video-frame">
          <div class="video-frame-header">
            <div class="video-frame-dot"></div>
            <div class="video-frame-dot"></div>
            <div class="video-frame-dot"></div>
            <span class="video-frame-title">Watch Introduction</span>
          </div>
          <iframe
            width="100%"
            height="300"
            src="https://www.youtube.com/embed/DfMjrsFmro4?si=O4V5v4R0QEblB9Du"
            title="Epic Talk Introduction Video"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            loading="lazy">
          </iframe>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== REVIEWS ===================== -->
<section id="section6" class="section reviews-section" data-section="section6">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <p class="section-tag">Community</p>
      <h2 class="section-title">What Our <em>Listeners Say</em></h2>
    </div>

    <div class="reviews-layout">

      <!-- Left: Review Submission Form -->
      <div data-aos="fade-right">
        <div class="form-card">
          <h3 class="form-card-title"><em>Your Talk,</em> Our Growth</h3>
          <p class="form-card-subtitle">Share your experience with the Epic Talk community.</p>

          <form method="POST" action="<?= View::route('feedback') ?>" novalidate id="feedback-form">
            <?= CSRF::field() ?>

            <div class="input-group">
              <input type="text" name="name" id="fb-name" placeholder="Your Name" required autocomplete="name" />
              <label for="fb-name">Your Name</label>
            </div>

            <div class="input-group">
              <input type="email" name="email" id="fb-email" placeholder="Your Email" required autocomplete="email" />
              <label for="fb-email">Your Email</label>
            </div>

            <div class="input-group">
              <textarea name="feedback" id="fb-message" rows="5" placeholder="Be the Voice Behind the Change..." required></textarea>
              <label for="fb-message">Your Review</label>
            </div>

            <button type="submit" class="btn-primary" id="feedback-submit-btn">
              <i class="fa fa-paper-plane"></i>&nbsp; Submit Review
            </button>
          </form>
        </div>
      </div>

      <!-- Right: Reviews Display -->
      <div data-aos="fade-left" data-delay="150">
        <p class="section-tag" style="margin-bottom:20px;"><em>Epic</em> Voices</p>
        <div class="reviews-display" id="feedback-list" aria-live="polite">
          <p class="review-loading"><i class="fa fa-spinner fa-spin"></i> Loading reviews...</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== CONTACT ===================== -->
<section id="section7" class="section contact-section" data-section="section7">
  <div class="container">
    <div class="section-header" data-aos="fade-up">
      <p class="section-tag">Get In Touch</p>
      <h2 class="section-title">Let's Keep <em>In Touch</em></h2>
    </div>

    <div class="contact-layout">

      <!-- Left: Contact Form -->
      <div data-aos="fade-right">
        <div class="form-card">
          <h3 class="form-card-title">Drop a Message</h3>
          <p class="form-card-subtitle">Have a question or collaboration idea? We'd love to hear from you.</p>

          <form method="POST" action="<?= View::route('contact') ?>" novalidate id="contact-form">
            <?= CSRF::field() ?>

            <div class="input-group">
              <input type="text" name="name" id="ct-name" placeholder="Your Name" required autocomplete="name" />
              <label for="ct-name">Your Name</label>
            </div>

            <div class="input-group">
              <input type="email" name="email" id="ct-email" placeholder="Your Email" required autocomplete="email" />
              <label for="ct-email">Your Email</label>
            </div>

            <div class="input-group">
              <textarea name="message" id="ct-message" rows="5" placeholder="Your message..." required></textarea>
              <label for="ct-message">Message</label>
            </div>

            <button type="submit" class="btn-primary" id="contact-submit-btn">
              <i class="fa fa-paper-plane"></i>&nbsp; Send Message
            </button>
          </form>
        </div>
      </div>

      <!-- Right: Social Links -->
      <div data-aos="fade-left" data-delay="150" style="display:flex;flex-direction:column;justify-content:center;">
        <p class="section-tag" style="margin-bottom:16px;">Follow Us</p>
        <h3 style="font-family:var(--font-serif);font-size:28px;font-weight:700;margin-bottom:12px;">
          Connect With <em style="color:var(--clr-gold);font-style:italic;">Epic Talk</em>
        </h3>
        <p style="font-size:15px;color:var(--clr-text-2);line-height:1.8;margin-bottom:32px;">
          Follow us on social media and join our growing community of curious, inspired minds.
        </p>
        <div class="social-grid">
          <a href="mailto:epictalklk@gmail.com" class="social-link" aria-label="Email">
            <i class="fa fa-envelope"></i> Email
          </a>
          <a href="https://www.facebook.com/share/1Bp43enpMz/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Facebook">
            <i class="fab fa-facebook"></i> Facebook
          </a>
          <a href="https://www.instagram.com/epictalklk?igsh=MTd3M2VuMGRmdjV0bw%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram">
            <i class="fab fa-instagram"></i> Instagram
          </a>
          <a href="https://www.linkedin.com/in/shehan-weragoda-a65372258/" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="LinkedIn">
            <i class="fab fa-linkedin"></i> LinkedIn
          </a>
          <a href="https://www.tiktok.com/@epictalklk?_t=ZS-8xG75OsxSHh&_r=1" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="TikTok">
            <i class="fab fa-tiktok"></i> TikTok
          </a>
          <a href="https://www.youtube.com/@epictalkLK" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="YouTube">
            <i class="fab fa-youtube"></i> YouTube
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
