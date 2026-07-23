/* ============================================================
   EPIC TALK — app.js
   Scroll progress · Navbar · Mobile nav · AOS · Tabs
   Reviews fetch · Form UX · Flash auto-dismiss · Admin upload
   ============================================================ */

'use strict';

document.addEventListener('DOMContentLoaded', () => {

  // ─── Scroll Progress Bar ──────────────────────────────────
  const progressBar = document.getElementById('scroll-progress');
  if (progressBar) {
    const updateProgress = () => {
      const scrolled = window.scrollY;
      const total    = document.documentElement.scrollHeight - window.innerHeight;
      progressBar.style.width = total > 0 ? `${(scrolled / total) * 100}%` : '0%';
    };
    window.addEventListener('scroll', updateProgress, { passive: true });
  }

  // ─── Navbar: Scroll Class ─────────────────────────────────
  const navbar = document.getElementById('navbar');
  if (navbar) {
    const onScroll = () => navbar.classList.toggle('scrolled', window.scrollY > 60);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run on load
  }

  // ─── Mobile Nav Toggle ────────────────────────────────────
  const navToggle = document.getElementById('nav-toggle');
  const navMenu   = document.getElementById('main-nav');

  if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
      const isOpen = navMenu.classList.toggle('open');
      navToggle.classList.toggle('active', isOpen);
      navToggle.setAttribute('aria-expanded', isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close on any nav link click
    navMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (navbar && !navbar.contains(e.target)) closeMenu();
    });
  }

  function closeMenu() {
    if (navMenu) navMenu.classList.remove('open');
    if (navToggle) { navToggle.classList.remove('active'); navToggle.setAttribute('aria-expanded', 'false'); }
    document.body.style.overflow = '';
  }

  // ─── Smooth Scroll for .scroll-link / href="#..." ─────────
  document.querySelectorAll('a.scroll-link, a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const href = anchor.getAttribute('href');
      if (!href || href === '#') return;
      // Only handle internal hash links
      if (!href.startsWith('#')) return;
      const target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();
      const offset = 80;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      
      // Fallback for older browsers
      if ('scrollBehavior' in document.documentElement.style) {
        window.scrollTo({ top, behavior: 'smooth' });
      } else {
        window.scrollTo(0, top);
      }
      closeMenu();
    });
  });

  // ─── Tab Component ────────────────────────────────────────
  const tabBtns     = document.querySelectorAll('.tab-btn');
  const tabPanels   = document.querySelectorAll('.tab-content');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.dataset.tab;

      tabBtns.forEach(b => {
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });
      tabPanels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');

      const panel = document.getElementById(targetId);
      if (panel) panel.classList.add('active');
    });
  });

  // ─── AOS: Animate-on-Scroll (Lightweight IntersectionObserver) ──
  const aosEls = document.querySelectorAll('[data-aos]');
  if (aosEls.length && 'IntersectionObserver' in window) {
    const aosObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el    = entry.target;
          const delay = parseInt(el.dataset.delay || '0', 10);
          setTimeout(() => el.classList.add('aos-animate'), delay);
          aosObserver.unobserve(el);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

    aosEls.forEach(el => aosObserver.observe(el));
  } else {
    // Fallback: show all immediately (no IntersectionObserver)
    aosEls.forEach(el => el.classList.add('aos-animate'));
  }

  // ─── Active Nav Link Highlighting on Scroll ───────────────
  const sections = document.querySelectorAll('section[data-section]');
  const navLinks = document.querySelectorAll('.navbar-nav a[href^="#"]');

  if (sections.length && navLinks.length && 'IntersectionObserver' in window) {
    const sectionObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const id = entry.target.getAttribute('id');
          navLinks.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
          });
        }
      });
    }, { threshold: 0.35 });

    sections.forEach(s => sectionObserver.observe(s));
  }

  // ─── Load Reviews via Fetch API ───────────────────────────
  const feedbackContainer = document.getElementById('feedback-list');
  if (feedbackContainer) {
    loadReviews();
  }

  function loadReviews() {
    fetch('feedback', { headers: { 'Accept': 'application/json' } })
      .then(res => {
        if (!res.ok) throw new Error('Network response was not ok');
        return res.json();
      })
      .then(data => {
        feedbackContainer.innerHTML = '';

        if (!Array.isArray(data) || data.length === 0) {
          feedbackContainer.innerHTML =
            '<p class="review-loading">Be the first to share your experience! 🎙️</p>';
          return;
        }

        const fragment = document.createDocumentFragment();

        data.forEach((item, i) => {
          const card = document.createElement('div');
          card.className   = 'review-card';
          card.dataset.aos = 'fade-up';
          card.dataset.delay = String((i % 4) * 80);

          card.innerHTML = `
            <div class="review-quote" aria-hidden="true">"</div>
            <p class="review-text">${escHtml(item.feedback)}</p>`;

          fragment.appendChild(card);
        });

        feedbackContainer.appendChild(fragment);

        // Observe newly added cards
        if ('IntersectionObserver' in window) {
          const obs = new IntersectionObserver(entries => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                const el    = entry.target;
                const delay = parseInt(el.dataset.delay || '0', 10);
                setTimeout(() => el.classList.add('aos-animate'), delay);
                obs.unobserve(el);
              }
            });
          }, { threshold: 0.1 });

          feedbackContainer.querySelectorAll('[data-aos]').forEach(el => obs.observe(el));
        } else {
          feedbackContainer.querySelectorAll('[data-aos]').forEach(el => el.classList.add('aos-animate'));
        }
      })
      .catch(() => {
        feedbackContainer.innerHTML =
          '<p class="review-loading">Unable to load reviews right now.</p>';
      });
  }

  /** XSS-safe HTML escape */
  function escHtml(str) {
    const d = document.createElement('div');
    d.textContent = String(str);
    return d.innerHTML;
  }

  // ─── Flash Messages: Auto-dismiss ─────────────────────────
  document.querySelectorAll('.flash').forEach(flash => {
    setTimeout(() => flash.remove(), 5200);
  });

  // ─── Admin: Image Upload Area ─────────────────────────────
  const fileInput   = document.getElementById('image-upload');
  const uploadArea  = document.getElementById('upload-area');
  const uploadPreview = document.getElementById('upload-preview');

  if (fileInput && uploadArea) {
    // Click to browse
    uploadArea.addEventListener('click', () => fileInput.click());
    uploadArea.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); fileInput.click(); }
    });

    // File selected
    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      if (file && file.type.startsWith('image/')) {
        showPreview(file);
      }
    });

    // Drag & Drop
    ['dragenter','dragover'].forEach(evt => {
      uploadArea.addEventListener(evt, e => {
        e.preventDefault();
        uploadArea.classList.add('drag-over');
      });
    });

    ['dragleave','dragend'].forEach(evt => {
      uploadArea.addEventListener(evt, () => uploadArea.classList.remove('drag-over'));
    });

    uploadArea.addEventListener('drop', e => {
      e.preventDefault();
      uploadArea.classList.remove('drag-over');
      const file = e.dataTransfer.files[0];
      if (file && file.type.startsWith('image/')) {
        // Assign to input via DataTransfer (modern browsers)
        try {
          const dt = new DataTransfer();
          dt.items.add(file);
          fileInput.files = dt.files;
        } catch {}
        showPreview(file);
      }
    });

    function showPreview(file) {
      if (!uploadPreview) return;
      const reader = new FileReader();
      reader.onload = e => {
        uploadPreview.innerHTML = `
          <img src="${e.target.result}" alt="Preview"
               style="max-height:120px;border-radius:8px;margin-top:12px;border:1px solid var(--clr-border);">
          <p style="font-size:12px;color:var(--clr-text-3);margin-top:6px;">${escHtml(file.name)}</p>`;
      };
      reader.readAsDataURL(file);
    }
  }

  // ─── Admin: Form Submit Loading State ─────────────────────
  document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', () => {
      const btn = form.querySelector('button[type="submit"]');
      if (btn) {
        btn.disabled = true;
        btn.style.opacity = '0.7';
        const icon = btn.querySelector('i');
        if (icon) icon.className = 'fa fa-spinner fa-spin';
      }
    });
  });

});
