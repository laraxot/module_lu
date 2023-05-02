<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'baseUrl' => 'https://laraxot.github.io/module_lu',
    'basePath' => 'module_lu',
    'production' => false,
    'siteName' => 'Modulo LU',
    'siteDescription' => 'Modulo LU',

    'path' => '{language}/{type}/{-title}',

    'collections' => [
        'posts-it' => [
            'type' => 'blog',
            'language' => 'it',
        ],

        'posts-en' => [
            'type' => 'blog',
            'language' => 'en',
        ],
    ],

    // Algolia DocSearch credentials
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
    'navigation' => require_once('navigation.php'),

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/'.trimPath($path);
    },
];
