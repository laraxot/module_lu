<?php
/**
 * View
 * Modify
 * Reset Key
 * Download Key
 * Unenroll
 * Create
 * Create Customer Incident
 * Update.
 */
declare(strict_types=1);

return [
    'roles' => [
        [
            'name' => 'Editor',
            'permissions' => [
                ['name' => 'edit_video'],
                ['name' => 'cut_video'],
            ],
        ],
        [
            'name' => 'Moderator',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Shaper',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Implementer',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Completer finisher',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Plant',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Monitor evaluator',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Specialist',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Coordinator',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
        [
            'name' => 'Teamworker',
            'permissions' => [
                ['name' => 'speak'],
            ],
        ],
    ],
];
