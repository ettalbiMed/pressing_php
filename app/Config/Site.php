<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig
{
    public array $site = [
        'siteName' => 'Atelier Émeraude Pressing',
        'siteUrl' => 'https://example.com',
        'city' => 'Témara',
        'brandColors' => [
            'brand' => '#0B2F1A',
            'ivory' => '#F6F1E6',
            'text' => '#2A2A2A',
            'muted' => '#8A857A',
        ],
        'seo' => [
            'title' => 'Pressing à Témara | Atelier Émeraude Pressing',
            'description' => 'Pressing à Témara premium: collecte & livraison Témara, pressing à domicile Témara et Box 24/7 Témara pour vos vêtements et textiles.',
            'ogImage' => '/assets/img/hero/hero-1.svg',
        ],
        'contact' => [
            'phone' => '+212600000000',
            'whatsapp' => '212600000000',
            'email' => 'bonjour@example.com',
            'address' => 'Avenue Mohammed V, Témara, Maroc',
        ],
        'geo' => [
            'lat' => '33.926800',
            'lng' => '-6.913700',
        ],
        'socials' => [
            'instagram' => 'https://instagram.com/example',
            'facebook' => 'https://facebook.com/example',
        ],
        'services' => [
            'Pressing naturel (procédés doux)',
            'Blanchisserie',
            'Ameublement (rideaux, canapés, etc.)',
            'Retoucherie & Cordonnerie',
            'Entretien tapis',
            'Service Entreprises',
            'Collecte & dépôt 24h/24 7j/7 via une box dédiée',
        ],
        'faq' => [
            [
                'q' => 'Intervenez-vous dans toute la ville de Témara ?',
                'a' => 'Oui, notre équipe assure la collecte et livraison Témara sur les principaux quartiers avec des créneaux flexibles.',
            ],
            [
                'q' => 'Quels sont les délais pour récupérer mes articles ?',
                'a' => 'La plupart des commandes sont traitées en 24 à 48 heures selon le type de textile et la charge de l’atelier.',
            ],
            [
                'q' => 'Comment fonctionne la Box 24/7 Témara ?',
                'a' => 'Vous déposez ou récupérez vos vêtements quand vous voulez via notre box sécurisée, disponible 24h/24 7j/7.',
            ],
            [
                'q' => 'Le pressing à domicile Témara a-t-il un minimum de commande ?',
                'a' => 'Oui, la collecte est proposée à partir de 100 Dh pour optimiser les tournées et réduire notre empreinte carbone.',
            ],
        ],
    ];
}
