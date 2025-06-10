# Laravel Translation Manager

Advanced Translation Manager for Laravel (Frontend + Dashboard), with:

✅ Multi-language support  
✅ Fallback locale  
✅ Caching  
✅ Auto-create missing keys  
✅ Import / Export CSV  
✅ Admin dashboard UI  

---

## Installation

### Option 1 — Direct from GitHub (Recommended for now):

In your Laravel project `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/palgooal/laravel-translation-manager.git"
    }
],
"require": {
    "palgoals/translation-manager": "dev-master"
}


Then run: composer update
Option 2 — Packagist (when published): composer require palgoals/translation-manager

Usage
1️⃣ Migrate the database:
php artisan migrate

2️⃣ Use the t() helper in Blade templates:
{{ t('dashboard.Users', 'Users') }}

3️⃣ Use t_html() for HTML-safe content:
{!! t_html('frontend.Description') !!}

4️⃣ Detect direction:
<html lang="{{ app()->getLocale() }}" dir="{{ current_dir() }}">

Admin Panel
Manage all translations via:

sql

/admin/translation-values
Features:

✅ Add / edit translations
✅ Filter by language
✅ Filter by type (Dashboard, Frontend, General)
✅ Import / Export CSV
✅ Auto-create missing keys

Configuration
In config/app.php:

php

'translation_auto_create' => true, // Enable auto-creating missing keys



