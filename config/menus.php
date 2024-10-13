<?php

return [
    'main_menu' => [
        [
            'label' => 'Accueil',
            'url' => '/',
        ],
        [
            'label' => 'À propos',
            'url' => '/about',
        ],
        [
            'label' => 'Services',
            'url' => '/services',
        ],
        [
            'label' => 'Contact',
            'url' => '/contact',
        ],
        [
            'label' => 'Blog',
            'url' => '/blog',
        ],
        [
            'label' => 'FAQ',
            'url' => '/faq',
        ],
    ],

    'footer_menu' => [
        [
            'label' => 'ISEST',
            'children' => [
                ['label' => 'Accueil', 'url' => '/'],
                ['label' => 'À propos', 'url' => '/about'],
                ['label' => 'Services', 'url' => '/services'],
                ['label' => 'Contact', 'url' => '/contact'],
            ]
        ],
        [
            'label' => 'Ressources',
            'children' => [
                ['label' => 'Blog', 'url' => '/blog'],
                ['label' => 'FAQ', 'url' => '/faq'],
                ['label' => 'Support', 'url' => '/support'],
            ]
        ],
        [
            'label' => 'Suivez-nous',
            'children' => [
                ['label' => 'Facebook', 'url' => 'https://facebook.com'],
                ['label' => 'Twitter', 'url' => 'https://twitter.com'],
                ['label' => 'LinkedIn', 'url' => 'https://linkedin.com'],
            ]
        ]
    ],
];
