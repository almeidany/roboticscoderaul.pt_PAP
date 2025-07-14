<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'professor' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'news' => 'c,r,u,d',
            'palmares' => 'c,r,u,d',
            'classes' => 'c,r,u,d',
            'contests' => 'c,r,u,d',
            'sponsers' => 'c,r,u,d',
            'attendance' => 'd',
            'raffles' => 'c,r,u,d',
        ],
        'aluno' => [
            'profile' => 'r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
