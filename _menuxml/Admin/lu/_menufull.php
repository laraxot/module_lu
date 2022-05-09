<?php

declare(strict_types=1);

if (! isset($route_params)) {
    $route_params = [];
}

$ris = [
    0 => [
        (object) [
            'id' => '1',
            'nome' => 'Mail Template',
            'visibility' => '1',
            'active' => 0,
            'url' => '#',
        ],
    ],

    1 => [
        (object) [
            'id' => '11',
            'nome' => 'Welcome ',
            'visibility' => '1',
            'active' => 0,
            'routename' => '',
            'url' => '#',
        ],
        (object) [
            'id' => '12',
            'nome' => 'Reset Password',
            'visibility' => '1',
            'active' => 0,
            'routename' => '',
            'url' => '#',
        ],
        (object) [
            'id' => '14',
            'nome' => 'Verify Email',
            'visibility' => '1',
            'active' => 0,
            'routename' => '',
            'url' => '#',
        ],
    ],
];

return $ris;
