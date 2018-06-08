<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'c,r,u,d',
            'settings' => 'm,e',
            'acl' => 'c,r,u,d',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
            'roles' => 'r',
        ],
        'editor' => [
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'author' => [
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'contributor' => [
              'profile' => 'r,u',
        ],
        'supporter' => [
              'posts' => 'r',
              'profile' => 'r,u'
          ],
        'subscriber' => [
            'posts' => 'r',
            'profile' => 'r,u',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'm' => 'manage',
        'e' => 'edit',
    ]
  ];