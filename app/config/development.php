<?php

return [
    'app'   =>  [
        'url'   =>  'http://auth.sys',
        'hash'  =>  [
            'algo'  =>  PASSWORD_BCRYPT,
            'cost'  =>  10
        ],
        'template'  =>  'Default',
    ],
    'db'    =>  [
        'driver'    =>  'mysql',
        'host'      =>  'localhost',
        'name'      =>  'authsys',
        'user'      =>  'root',
        'pass'      =>  '',
        'charset'   =>  'utf8',
        'collaction'=>  'utf8_unicode_ci',
        'prefix'    =>  ''
    ],
    'auth'  =>  [
        'session'   =>  'user_id',
        'remember'  =>  'user_r'
    ],
    'mail'  =>  [
        'auth'      =>  true,
        'secure'    =>  'tls',
        'host'      =>  'smtp.dpoczta.pl',
        'username'  =>  'otlet@jest.guru',
        'password'  =>  'xxxxxx',
        'port'      =>  '587',
        'html'      =>  'true'
    ],
    'twig'  =>  [
        'debug'     =>  true
    ],
    'csrf'  =>  [
        'session'   =>  'csrf_token'
    ]
];