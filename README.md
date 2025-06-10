
# Laravel Translation Manager

Advanced Translation Manager for Laravel — Manage all your translations easily from an admin panel.

✅ Multi-language support  
✅ Fallback locale  
✅ Caching  
✅ Auto-create missing keys  
✅ Import / Export CSV  
✅ Admin dashboard UI  
✅ Designed for both Frontend & Dashboard translations  

---

## 📦 Installation

### Option 1 — Use directly from GitHub (development stage):

In your Laravel project `composer.json`, add:

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
```

Then run:

```bash
composer update
```

### Option 2 — From Packagist (when published):

```bash
composer require palgoals/translation-manager
```

---

## 🚀 Usage

### 1️⃣ Run the migrations:

```bash
php artisan migrate
```

### 2️⃣ Use the `t()` helper in Blade templates:

```blade
{{ t('dashboard.Users', 'Users') }}
```

### 3️⃣ Use `t_html()` for HTML-safe content:

```blade
{!! t_html('frontend.Description') !!}
```

### 4️⃣ Detect text direction:

```blade
<html lang="{{ app()->getLocale() }}" dir="{{ current_dir() }}">
```

---

## 🛠️ Admin Panel

Manage all translations via:

```
/admin/translation-values
```

Features:

✅ Add / edit translations  
✅ Filter by language  
✅ Filter by type (Dashboard, Frontend, General)  
✅ Import / Export CSV  
✅ Auto-create missing keys (when enabled)  

---

## ⚙️ Configuration

In your `config/app.php` file, you can enable automatic creation of missing keys:

```php
'translation_auto_create' => true,
```

---

## License

MIT License © 2025 [Palgoals](https://github.com/palgooal)

---

## ❤️ Developed by Palgoals

If you like this package, please consider giving it a ⭐ on GitHub!  
Pull requests are welcome.
