<?php
/**
 * SEO Helper - Single File (SEO PRO)
 * Usage:
 *   include 'seo.php';
 *   echo renderSeoHead($page);
 *   echo renderSchemaOrg();
 */

/* =========================
   SEO DATA PER HALAMAN
========================= */
function getSeoMeta($page = 'home') {
    $seo = [

        'home' => [
            'title' => 'GIESTAR | Jasa Pembuatan Website Murah & Profesional',
            'description' => 'GIESTAR melayani jasa pembuatan website profesional, cepat, dan SEO-friendly untuk UMKM. Mulai Rp100.000. Konsultasi gratis.',
            'canonical' => 'https://giestar.yzz.me/',
            'og_type' => 'website'
        ],

        'about' => [
            'title' => 'Tentang Kami | GIESTAR Web Developer Indonesia',
            'description' => 'GIESTAR adalah tim web developer Indonesia yang fokus membantu UMKM memiliki website profesional dan terpercaya.',
            'canonical' => 'https://giestar.yzz.me/?page=about',
            'og_type' => 'website'
        ],

        'product' => [
            'title' => 'Layanan & Portfolio | GIESTAR Pembuatan Website',
            'description' => 'Lihat layanan dan portfolio website GIESTAR: landing page, company profile, hingga website custom dengan harga terjangkau.',
            'canonical' => 'https://giestar.yzz.me/?page=product',
            'og_type' => 'website'
        ],

        'contact' => [
            'title' => 'Hubungi Kami | GIESTAR Konsultasi Website Gratis',
            'description' => 'Hubungi GIESTAR untuk konsultasi gratis pembuatan website. Respon cepat via WhatsApp.',
            'canonical' => 'https://giestar.yzz.me/?page=contact',
            'og_type' => 'website'
        ]
    ];

    return $seo[$page] ?? $seo['home'];
}


function renderSeoHead($page = 'home') {
    $meta = getSeoMeta($page);
    $siteName = 'GIESTAR';
    $siteUrl  = 'https://giestar.yzz.me';
    $logoUrl  = $siteUrl . '/images/logo.png';

    return <<<HTML
<!-- SEO Meta -->
<title>{$meta['title']}</title>
<meta name="description" content="{$meta['description']}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{$meta['canonical']}">

<!-- Open Graph -->
<meta property="og:type" content="{$meta['og_type']}">
<meta property="og:url" content="{$meta['canonical']}">
<meta property="og:title" content="{$meta['title']}">
<meta property="og:description" content="{$meta['description']}">
<meta property="og:image" content="{$logoUrl}">
<meta property="og:site_name" content="{$siteName}">
<meta property="og:locale" content="id_ID">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{$meta['title']}">
<meta name="twitter:description" content="{$meta['description']}">
<meta name="twitter:image" content="{$logoUrl}">
HTML;
}


function renderSchemaOrg() {
    $siteUrl = 'https://giestar.yzz.me';

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'LocalBusiness',
        '@id'      => $siteUrl . '/#localbusiness',
        'name'     => 'GIESTAR',
        'url'      => $siteUrl,
        'logo'     => $siteUrl . '/images/logo.png',
        'description' => 'Jasa pembuatan website profesional pemalang, responsif, dan SEO-friendly untuk UMKM di Indonesia.',
        'telephone'   => '+6282314548114',
        'priceRange'  => 'Rp 100.000 - Rp 400.000',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Pemalang',
            'addressRegion'   => 'Jawa Tengah',
            'addressCountry'  => 'ID'
        ],
         'sameAs' => [
            'https://wa.me/6282314548114',
            'https://www.instagram.com/giestar_id?igsh=MXNjNWN5dnFiMWlwdg==',
            'https://www.facebook.com/Giestar.id?mibextid=ZbWKwL'
        ]
    ];

    return '<script type="application/ld+json">' .
        json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) .
        '</script>';
}








?>
