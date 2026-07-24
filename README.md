<div align="center">

# 🎙️ Epic Talk — Podcast Portal

**A fully custom PHP MVC web portal for the Epic Talk podcast, founded in Sri Lanka by Shehan Weragoda.**

[![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)
[![Hosting](https://img.shields.io/badge/Hosting-InfinityFree%20%2F%20Apache-orange?style=flat-square)](https://infinityfree.net/)

<br/>

> A rebuilt, responsive, and hardened web application upgraded from a monolithic codebase to a **PSR-compliant PHP MVC architecture** — engineered to run on shared hosting (InfinityFree / cPanel Apache) with zero SSH or Composer dependency.

</div>

---

## ✨ Features

| Category | Details |
|---|---|
| 🎨 **Premium UI** | Dark glassmorphism design, gold accents, Inter & Playfair Display typography, smooth hover animations |
| 🏗️ **MVC Architecture** | Custom front-controller routing with clean Controller → Model → View separation |
| 🇱🇰 **Sinhala Unicode** | Custom UTF-8 encoding fallbacks to prevent database encoding corruption for Sinhala text |
| 🔐 **Security Suite** | PDO parameterised queries, CSRF tokens, bcrypt hashing, brute-force rate-limiting, strict upload validation |
| 📋 **Admin Panel** | Protected dashboard for playlist CRUD, contact inbox, feedback review, and registration management |
| 📱 **Responsive** | Mobile-first responsive layouts across all views |
| ⚡ **Zero Dependencies** | No Composer, no NPM — runs on any shared host out of the box |

---

## 🔐 Security Hardening

This project applies a comprehensive defence-in-depth approach:

- **SQL Injection Prevention** — All database interactions use PDO with prepared statements and bound parameters; no raw query concatenation.
- **CSRF Protection** — Every POST mutation is protected by a synchronizer token (`Core/CSRF.php`) validated server-side on submission.
- **Brute-Force Rate Limiting** — The `/admin/login` endpoint enforces a maximum of **5 login attempts per 10-minute window** using session-based counters.
- **Password Security** — Administrator passwords are stored as **bcrypt hashes** (PHP `password_hash` / `PASSWORD_BCRYPT`) — never in plaintext.
- **File Upload Hardening** — Uploads enforce strict MIME-type allowlists and sanitised filename filters to prevent arbitrary file execution.
- **`.gitignore` Secrets Isolation** — `config/database.php` and `config/admin.php` are excluded from version control by default.

---

## 📂 Project Structure

```
htdocs/
├── app/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   ├── AuthController.php       # Login, logout & session management
│   │   │   ├── DashboardController.php  # Admin dashboard overview
│   │   │   └── PlaylistController.php   # Playlist CRUD operations
│   │   ├── ContactController.php        # Contact form submission handler
│   │   ├── FeedbackController.php       # Feedback listing & submission
│   │   ├── HomeController.php           # Public homepage renderer
│   │   └── RegisterController.php       # Listener registration handler
│   ├── Core/
│   │   ├── CSRF.php                     # Token generation & validation
│   │   ├── Router.php                   # Front-controller request router
│   │   └── View.php                     # Template renderer & layout injector
│   ├── Models/
│   │   ├── Database.php                 # PDO singleton connection wrapper
│   │   ├── Contact.php                  # Contact message model
│   │   ├── Feedback.php                 # Feedback entry model
│   │   ├── Playlist.php                 # Playlist episode model
│   │   └── Registration.php            # Listener registration model
│   └── Views/
│       ├── layouts/                     # Shared HTML layout wrappers
│       ├── home/                        # Public-facing page templates
│       ├── admin/                       # Admin panel view templates
│       └── errors/                      # HTTP error pages (404, 500)
├── assets/
│   ├── images/                          # Site images & thumbnails
│   ├── Pictures/                        # Additional media assets
│   ├── fonts/                           # Custom web fonts
│   ├── css/                             # Legacy/vendor stylesheets
│   └── js/                              # Legacy/vendor scripts
├── config/                              # 🔒 Credentials (git-ignored)
│   ├── database.example.php             # DB config template
│   └── admin.example.php               # Admin config template
├── public/
│   ├── css/                             # Compiled application CSS
│   └── js/                              # Compiled application JS
├── .htaccess                            # URL rewriting & security headers
├── index.php                            # Application bootstrap & front controller
├── router.php                           # Built-in PHP dev server router (git-ignored)
└── setup.php                            # One-time password hash generator (delete after use)
```

---

## ⚙️ Tech Stack

| Layer | Technology |
|---|---|
| **Language** | PHP 8.0+ |
| **Database** | MySQL / MariaDB |
| **Architecture** | Custom PHP MVC (PSR-inspired, no framework) |
| **Frontend** | Vanilla HTML5, CSS3 (glassmorphism), ES6 JavaScript |
| **Web Server** | Apache (shared hosting) / PHP built-in server (dev) |
| **Security** | PDO, CSRF tokens, bcrypt, rate-limiting, MIME validation |

---

## 🚀 Local Development Setup

### Prerequisites

- **PHP 8.0+** installed and available in your `PATH`
- **MySQL / MariaDB** running locally

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/epic-talk.git
cd epic-talk/htdocs
```

### 2. Configure Credentials

Copy the example config templates and populate them with your local credentials:

```bash
cp config/database.example.php config/database.php
cp config/admin.example.php config/admin.php
```

Open `config/database.php` and set your MySQL host, database name, username, and password.

### 3. Set Up the Database

Import the database schema in your MySQL client or phpMyAdmin. The application expects the following tables:

```sql
CREATE TABLE playlists (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NOT NULL,
    description TEXT,
    image_path  VARCHAR(500),
    video_url   VARCHAR(500)
);

CREATE TABLE feedback (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(255),
    email    VARCHAR(255),
    feedback TEXT
);

CREATE TABLE contacts (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    name    VARCHAR(255),
    email   VARCHAR(255),
    message TEXT
);

CREATE TABLE registrations (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(50)
);
```

### 4. Generate Admin Credentials

Start the dev server (see step 5), then navigate to `http://localhost:8080/setup.php` in your browser.  
Enter your desired administrator password — it will generate and save a secure bcrypt hash to `config/admin.php`.

> ⚠️ **Delete `setup.php` after running it.** Never leave this file accessible in a production environment.

### 5. Start the Development Server

```bash
php -S localhost:8080 router.php
```

Open your browser at **[http://localhost:8080](http://localhost:8080)**.

| Route | Description |
|---|---|
| `/` | Public homepage & podcast listings |
| `/feedback` | Listener feedback wall |
| `/admin` | Admin login page |
| `/admin/dashboard` | Admin management dashboard |

---

## 🌐 Production Deployment (InfinityFree / Apache)

1. **Upload files** — Upload the entire contents of the `htdocs/` directory to your hosting server's `htdocs/` (or `public_html/`) folder via FTP (FileZilla) or the hosting File Manager.

2. **Configure the database** — In phpMyAdmin on your host, create a new database and import the SQL schema above.

3. **Upload config files** — Manually create `config/database.php` and `config/admin.php` on the server with your live credentials. Do **not** commit these files to Git.

4. **Generate admin password** — Access `https://yourdomain.com/setup.php` in a browser, enter your desired password to generate and save the bcrypt hash.

5. **🔒 Delete `setup.php` immediately** — Remove it from the server as soon as the hash is generated.

6. Your site is now live:
   - **Public portal** → `https://yourdomain.com/`
   - **Admin panel** → `https://yourdomain.com/admin`

---

## 🛣️ Application Routing

All routes are registered in [`index.php`](./index.php) and dispatched through [`Core/Router.php`](./app/Core/Router.php):

```
GET  /                       →  HomeController::index()
POST /contact                →  ContactController::store()
GET  /feedback               →  FeedbackController::index()
POST /feedback               →  FeedbackController::store()
POST /register               →  RegisterController::store()

GET  /admin                  →  AuthController::loginForm()
POST /admin/login            →  AuthController::login()
GET  /admin/logout           →  AuthController::logout()
GET  /admin/dashboard        →  DashboardController::index()
POST /admin/playlists/store  →  PlaylistController::store()
POST /admin/playlists/delete →  PlaylistController::destroy()
```

---

## 🤝 Contributing

Contributions are welcome! Please open an issue first to discuss any significant changes.

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/your-feature`
3. Commit your changes: `git commit -m 'feat: add your feature'`
4. Push to the branch: `git push origin feature/your-feature`
5. Open a Pull Request

---

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

<div align="center">

Built with ❤️ in Sri Lanka &nbsp;•&nbsp; [Epic Talk Podcast](https://epictalk.lk)

</div>
