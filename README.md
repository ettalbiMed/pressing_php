# Pressing éco-responsable — One Page CI4

## Prérequis
- PHP 8.1+
- Composer
- MySQL 8+

## Installation
```bash
composer create-project codeigniter4/appstarter .
composer install
cp env .env
# Configurer .env: app.baseURL + database.default.*
php spark serve
```

## Migration
```bash
php spark migrate
```

## Où modifier
- `app/Config/Site.php` : contenu, NAP, SEO, coordonnées GEO, liens sociaux.
- `public/assets/img/hero/*` et `public/assets/img/gallery/*` : images locales.
- `public/assets/css/app.css` et `public/assets/js/app.js` : thème et interactions.

## Soumission Google
1. Activer Google Search Console.
2. Soumettre `https://votredomaine/sitemap.xml`.
3. Vérifier `https://votredomaine/robots.txt`.

## Notes performance & accessibilité
- UI mobile-first, contraste élevé, focus visible, aria-labels.
- JS vanilla léger (carousel + IntersectionObserver).
- Images locales optimisables (WebP recommandé en production).
- Génération JSON-LD LocalBusiness + WebSite + FAQPage incluse.
