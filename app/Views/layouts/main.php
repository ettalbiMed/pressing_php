<?php
/** @var array $site */
$seo = $site['seo'];
$faqSchema = array_map(static fn ($item) => [
    '@type' => 'Question',
    'name' => $item['q'],
    'acceptedAnswer' => [
        '@type' => 'Answer',
        'text' => $item['a'],
    ],
], $site['faq']);

$localBusinessSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'DryCleaningOrLaundry',
    'name' => $site['siteName'],
    'description' => $seo['description'],
    'url' => $site['siteUrl'],
    'telephone' => $site['contact']['phone'],
    'priceRange' => 'À partir de 100 Dh',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['contact']['address'],
        'addressLocality' => $site['city'],
        'addressCountry' => 'MA',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $site['geo']['lat'],
        'longitude' => $site['geo']['lng'],
    ],
    'openingHoursSpecification' => [
        [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens' => '08:00',
            'closes' => '20:00',
        ],
        [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Saturday'],
            'opens' => '09:00',
            'closes' => '18:00',
        ],
    ],
    'areaServed' => $site['city'],
    'sameAs' => array_values($site['socials']),
];

$websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $site['siteName'],
    'url' => $site['siteUrl'],
];

$faqPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faqSchema,
];
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($seo['title']) ?></title>
    <meta name="description" content="<?= esc($seo['description']) ?>">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="<?= esc($site['brandColors']['brand']) ?>">
    <link rel="canonical" href="<?= esc($site['siteUrl']) ?>">
    <meta property="og:title" content="<?= esc($seo['title']) ?>">
    <meta property="og:description" content="<?= esc($seo['description']) ?>">
    <meta property="og:url" content="<?= esc($site['siteUrl']) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= esc($site['siteUrl'] . $seo['ogImage']) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= esc($seo['title']) ?>">
    <meta name="twitter:description" content="<?= esc($seo['description']) ?>">
    <meta name="twitter:image" content="<?= esc($site['siteUrl'] . $seo['ogImage']) ?>">
    <link rel="icon" href="/assets/img/logo.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/assets/img/logo.svg">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
<?= $this->renderSection('content') ?>
<script src="/assets/js/app.js" defer></script>
<script type="application/ld+json"><?= json_encode($localBusinessSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
<script type="application/ld+json"><?= json_encode($websiteSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
<script type="application/ld+json"><?= json_encode($faqPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</body>
</html>
