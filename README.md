<div align="center">

# 🎬 laraprof — Developer Portfolio

<p align="center">
  <strong>An immersive developer portfolio showcasing my projects.</strong>
</p>

<p align="center">
  <a href="https://sprout.free.nf">
    <img src="https://img.shields.io/badge/Live_Demo-sprout.free.nf-8b0000?style=for-the-badge&logo=firefox&logoColor=white" alt="Live Demo">
  </a>
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  </a>
  <a href="https://php.net">
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  </a>
  <a href="https://tailwindcss.com">
    <img src="https://img.shields.io/badge/Tailwind_CSS-v4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  </a>
  <a href="https://motion.dev">
    <img src="https://img.shields.io/badge/Motion-12-FF4154?style=for-the-badge&logo=framer&logoColor=white" alt="Motion 12">
  </a>
</p>

<p align="center">
  <a href="#-project-overview">Overview</a> •
  <a href="#-featured-systems-showcase">Featured Systems</a> •
  <a href="#-credentials--certifications">Credentials</a> •
  <a href="#-technical-stack">Tech Stack</a> •
  <a href="#-local-installation">Installation</a> •
  <a href="#-deployment-architecture">Deployment</a> •
</p>

</div>

---

## 📽️ Project Overview

**laraprof** is a custom-engineered web portfolio built on the **Retro Horror Film & Midnight Grindhouse** design aesthetic. Inspired by vintage celluloid film aesthetics, the application combines rich atmosphere with modern reactive physics, WebGL particles, and high-performance server-rendered Laravel architecture.

---

## 🚀 Featured Systems Showcase

### 1. S.O.M.M.S — Student Offense Management System

An RBAC Guidance System for viewing and recording student offenses.

| Dashboard | Registration |
| :---: | :---: |
| <img src="public/images/projects/somms-1.png" width="100%" alt="SOMMS Dashboard"> | <img src="public/images/projects/somms-2.png" width="100%" alt="SOMMS Inventory"> |
| **Login Page** | **Login Success** |
| <img src="public/images/projects/somms-3.png" width="100%" alt="SOMMS Repair Flow"> | <img src="public/images/projects/somms-4.png" width="100%" alt="SOMMS Users"> |

* **Tech Stack**: VB.Net & SQLite

---

### 2. SARAK — Interactive GIS made for Bangued, Abra
> **Infrastructure Mapping for Bangued**

An interactive GIS geospatial system.

| Auth Page | Navigation |
| :---: | :---: |
| <img src="public/images/projects/sarak-1.png" width="100%" alt="SARAK Map Interface"> | <img src="public/images/projects/sarak-2.png" width="100%" alt="SARAK Route Explorer"> |

* **Tech Stack**: Leaflet GIS, GeoJSON, OpenStreetMap, PHP, Vanilla JavaScript

---

### 3. DRMS - Dental Record Management System
> **Bayugo Dental Clinic**

A sleek modern dental record and booking system with rbac.

| Landing | Auth Page |
| :---: | :---: |
| <img src="public/images/projects/bdc-1.png" width="100%" alt="BDC Hazard Map"> | <img src="public/images/projects/bdc-2.png" width="100%" alt="BDC Evacuation Dispatch"> |

* **Tech Stack**: Laravel, React & SQLite(migrating to mariadb on final)

---

---

## 🏆 Credentials & Certifications

<div align="center">
  <table>
    <tr>
      <td align="center" width="50%">
        <img src="public/images/certs/badges/cisco-hardware-basics-badge.png" width="96" alt="Cisco Hardware Basics"><br>
        <strong>Cisco: Computer Hardware Basics</strong><br>
        <small>System Architecture & Hardware Diagnostics</small>
      </td>
      <td align="center" width="50%">
        <img src="public/images/certs/badges/cisco-modern-ai-badge.png" width="96" alt="Cisco Introduction to Modern AI"><br>
        <strong>Cisco: Introduction to Modern AI</strong><br>
        <small>AI Architectures & Applied Machine Learning</small>
      </td>
    </tr>
  </table>
</div>

---

## 🛠️ Technical Stack

| Layer | Technologies & Tools |
|---|---|
| **Backend & Runtime** | PHP 8.2+, Laravel 12.x, Composer |
| **Frontend & Templating** | Blade Templates, HTML5 Semantic DOM |
| **CSS Architecture** | Tailwind CSS v4.0, CSS Color Module Level 4, Custom Design System |
| **Animation & Physics** | `motion` (v14.9), Kinetic Typography, Spring Interpolation |
| **Graphics & Audio** | Three.js / WebGL, HTML5 Canvas, SVG Graphics |
| **Tooling & Bundler** | Vite 7.x, PostCSS, ESLint, Git, GitHub CLI |
| **Production Hosting** | InfinityFree Shared Hosting (`sprout.free.nf`), ZeroSSL HTTPS |

---

## 💻 Local Installation

### Prerequisites
* **PHP** >= 8.2
* **Composer** >= 2.x
* **Node.js** >= 18.x & **npm**

### Step-by-Step Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/sprout-main/laraprof.git
   cd laraprof
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies & build assets**:
   ```bash
   npm install
   npm run build
   ```

4. **Configure environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Start the development server**:
   ```bash
   php artisan serve
   ```
   Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 🌐 Deployment Architecture

The application is deployed live to **[sprout.free.nf](https://sprout.free.nf)** on InfinityFree using a non-destructive rewrite structure:

* The root `.htaccess` transparently routes all requests into `public/`, preserving Laravel's folder structure.
* ZeroSSL wildcard SSL certificate (`*.free.nf`) is enforced via edge proxy rewrite rules (`RewriteCond %{HTTP:X-Forwarded-Proto} =http`).
* A deploy-ready update archive ([laraprof-update.zip](laraprof-update.zip)) enables zero-downtime hot patches.

---

## 📂 Project Directory Map

```text
laraprof/
├── app/                        # Application bootstrap logic
├── config/
│   └── portfolio.php           # Single source of truth for portfolio data
├── public/
│   ├── build/                  # Compiled Vite production CSS & JS bundles
│   ├── images/
│   │   ├── certs/              # Industry certification badges and certificates
│   │   ├── projects/           # High-resolution screenshots of built systems
│   │   └── jm.jpg              # Profile avatar
│   └── .htaccess               # Laravel front controller rewrite rules
├── resources/
│   ├── css/
│   │   └── app.css             # Design tokens, CRT effects & @supports rules
│   ├── js/
│   │   ├── app.js              # Entry point & interactive UI controller
│   │   ├── motion-engine.js    # Spring physics, kinetic typography & reveals
│   │   └── webgl.js            # Ambient stardust & spectral particles
│   └── views/
│       ├── layouts/app.blade.php  # Master layout with <noscript> fallbacks
│       ├── home.blade.php         # Hero, about, skills & project showcase
│       ├── education.blade.php    # Academic timeline & certifications
│       └── experience.blade.php   # Professional history & technical arsenal
├── routes/
│   └── web.php                 # Named portfolio route definitions
└── tests/                      # Automated feature and unit test suite
```

---
