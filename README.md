# laraprof — Personal Online Portfolio

A static online portfolio for **Jake Carlo G. Mandi**, built as a classic server-rendered Laravel application: Blade templates only, no database, no models, no migrations. All content lives in a single configuration file and flows into clean, semantic HTML pages styled with hand-written CSS.

## Project Description

This project was created to present a personal profile on the web using Laravel's core routing and templating features. Instead of a CMS or database-driven site, every section of the portfolio is rendered from plain PHP configuration arrays passed directly to Blade views — demonstrating that a complete, polished portfolio can be built with nothing more than routes, controllers-as-closures, and templates.

### Sections

- **Home / Basic Information** — name, role, profile picture, short professional bio, and contact details (email, phone, location).
- **Education** — academic timeline (Bachelor of Science in Information Technology at Data Center Colleges of The Philippines; high school diploma from Little Flower High School) plus earned certifications.
- **Experience & Skills** — work experience (municipal internship, retail crew), grouped skill chips (Design / Technical / Tools), and spoken languages.

## Tech Stack

| Layer     | Choice                                        |
|-----------|-----------------------------------------------|
| Framework | Laravel 12 (latest stable for PHP 8.2)        |
| Templates | Blade (`resources/views/*.blade.php`)         |
| Styling   | Hand-written CSS (`public/css/style.css`)     |
| Data      | `config/portfolio.php` (no database required) |
| Database  | None — sessions/cache use the file driver     |

## Getting Started

### Requirements

- PHP >= 8.2
- Composer

### Installation

```bash
git clone https://github.com/sprout-main/laraprof.git
cd laraprof
composer install
cp .env.example .env
php artisan key:generate
```

### Running Locally

```bash
php artisan serve
```

Then open <http://127.0.0.1:8000> in your browser.

## Project Structure

```
routes/web.php                  # All routes + data wiring (closures)
config/portfolio.php            # Single source of truth for page content
resources/views/
    layouts/app.blade.php       # Master layout (nav, footer)
    home.blade.php              # Basic information & contact
    education.blade.php         # Educational background & certifications
    experience.blade.php        # Work experience, skills, languages
public/css/style.css            # Design system & responsive styles
public/images/avatar.svg        # Profile picture placeholder
```

## License

Open source — reuse the structure freely for your own portfolio.
