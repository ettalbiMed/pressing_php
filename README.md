# Pressing éco-responsable — One Page CI4

## Cloner le projet
```bash
git clone <URL_DU_REPO>
cd pressing_php
```

## Prérequis
- PHP 8.1+
- Composer
- MySQL 8+

## Installation (depuis le clone)
```bash
composer install
cp .env .env.local # optionnel si vous séparez les environnements
# ou éditez directement .env
# Configurer .env: app.baseURL + database.default.*
```

## Lancer l’application
Ce dépôt contient le code applicatif (controllers/views/assets/config), mais si votre environnement attend la structure CI4 complète (`public/index.php`, `spark`, etc.), créez-la d’abord puis copiez `app/` et `public/assets/` dedans:

```bash
composer create-project codeigniter4/appstarter ci4-shell
# Copier ensuite les dossiers/fichiers de ce dépôt dans le shell CI4
```

Ensuite:
```bash
php spark migrate
php spark serve
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
- Génération JSON-LD LocalBusiness + WebSite + FAQPage incluse.


### Erreur fréquente
Si vous aviez `Could not open input file: spark`, le script `spark` est désormais inclus à la racine.
Ensuite lancez simplement:
```bash
composer install
php spark
```


### Erreur fréquente (Constants.php manquant)
Si vous voyez une erreur du type:
`Failed opening required app\Config/Constants.php`,
vérifiez que les fichiers suivants existent bien:
- `app/Config/Constants.php`
- `app/Config/Boot/development.php`
- `app/Config/Boot/production.php`
- `app/Config/Boot/testing.php`

Puis relancez:
```bash
composer install
php spark
```


### Erreur fréquente (upgrade CI4 4.5 incomplet)
Si vous voyez:
`This "system/bootstrap.php" is no longer used ... upgrade_450`
cela signifie que les anciens entrypoints étaient encore utilisés.
Ce dépôt utilise désormais les entrypoints CI4 4.5+ (`Boot.php`).
Relancez:
```bash
composer install
php spark migrate
```


### Erreur fréquente (WRITEPATH)
Si `php spark migrate` affiche `The WRITEPATH is not set correctly.`:
- vérifiez que le dossier `writable/` existe à la racine du projet
- sous Windows/WAMP, évitez les chemins cassés via `realpath()` si le dossier n'existe pas encore

Ce dépôt initialise maintenant `WRITEPATH` avec un chemin absolu stable et crée `writable/` automatiquement si nécessaire.


### Correctif appliqué pour WAMP
Le chemin `writable` est désormais calculé dans `app/Config/Paths.php` avec un chemin absolu basé sur la racine du projet, puis créé automatiquement s'il n'existe pas.
Cela évite l'erreur persistante `The WRITEPATH is not set correctly.` sur certains environnements Windows.
