# Epic Talk – Podcast Portal

A rebuilt, responsive, and secure web application for **Epic Talk** (founded by Shehan Weragoda in Sri Lanka). 

This portal has been upgraded from a monolithic codebase to a custom PSR-compliant **PHP MVC architecture** (similar to Laravel's structure), optimized for compatibility on shared hosting servers (such as InfinityFree) without needing SSH/Composer access.

---

## 🎨 Key Features & Enhancements

- **Modern Premium UI**: Built with a sleek dark glassmorphism design system featuring gold accents, Inter & Playfair Display typography, responsive grid views, and smooth interactive elements.
- **MVC Architecture**: Clean separation of concerns with a front-controller routing framework (`Core/Router`, `Core/View`, `Core/CSRF`, `Controllers`, `Models`, `Views`).
- **Sinhala Unicode UTF-8 Support**: Custom data encoding fallbacks to ensure Sinhala text pulls cleanly from databases without encoding corruption.
- **Complete Security Hardening**:
  - Full protection against SQL Injections using **PDO parameterised statements**.
  - Synchronizer Token **CSRF Protection** on all POST mutations.
  - Rate-limiting protection against brute-force attacks on the admin panel login (max 5 attempts per 10 minutes).
  - Secure Bcrypt password hashing instead of plaintext credentials.
  - Strict upload mime-type verification with safe filename filters on file uploads.

---

## 📂 Project Directory Structure

```
htdocs/
├── app/
│   ├── Controllers/   # Request handlers (Home, Contact, Feedback, Admin auth)
│   ├── Core/          # MVC Engine (Router, View handler, CSRF security)
│   ├── Models/        # Database objects (Database singleton, Playlist, Feedback)
│   └── Views/         # UI templates (Layout wrappers, Home layout, Admin views)
├── assets/            # Static media resources (Images, Icons, video intros)
├── config/            # Sensitive configurations (Ignored from version control)
├── public/            # Client-side bundles (CSS styling, JS assets)
├── .htaccess          # URL rewriting & security headers configuration
├── index.php          # Application bootstrap & front controller
├── router.php         # Local development built-in server router
└── setup.php          # Safe password hash generator script (delete in production)
```

---

## 💻 Local Setup & Development

### 1. Prerequisites
- **PHP 8.0+**
- **MySQL / MariaDB**

### 2. Configurations Setup
1. Copy the example configuration templates:
   ```bash
   cp config/database.example.php config/database.php
   cp config/admin.example.php config/admin.php
   ```
2. Configure your local MySQL credentials inside `config/database.php`.

### 3. Run the Development Server
Run the built-in development router:
```bash
php -S localhost:8080 router.php
```
Access the application at `http://localhost:8080`.

---

## 🚀 Production Deployment (InfinityFree / Apache)

1. Upload the entire contents of the `htdocs/` folder to the server `htdocs/` directory using an FTP client (e.g. FileZilla) or the online File Manager.
2. In your database panel (phpMyAdmin), verify your database schema tables matching:
   - `playlists` (id, title, description, image_path, video_url)
   - `feedback` (id, name, email, feedback)
   - `contacts` (id, name, email, message)
   - `registrations` (id, name, email, phone)
3. Access `http://yourdomain.com/setup.php` in a web browser to enter your desired administrator password and generate the secure configurations hash.
4. **⚠️ IMPORTANT**: Delete the `setup.php` file from the remote hosting server directory immediately after setup to secure the password hash files.
5. Your public site will be accessible at `/` and the administration panel at `/admin`.
