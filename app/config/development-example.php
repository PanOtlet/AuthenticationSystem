<?php

return [
    'app'   =>  [
        'url'   =>  '',
        'hash'  =>  [
            'algo'  =>  PASSWORD_BCRYPT,
            'cost'  =>  10
        ],
    ],
    'db'    =>  [
        'driver'    =>  '',
        'host'      =>  '',
        'name'      =>  '',
        'user'      =>  '',
        'pass'      =>  '',
        'charset'   =>  'utf8',
        'collation' =>  'utf8_unicode_ci',
        'prefix'    =>  ''
    ],
    'auth'  =>  [
        'session'   =>  'user_id',
        'remember'  =>  'user_r'
    ],
    'mail'  =>  [
        'auth'      =>  true,
        'secure'    =>  'tls',
        'host'      =>  '',
        'username'  =>  '',
        'password'  =>  '',
        'port'      =>  '',
        'html'      =>  'true'
    ],
    'twig'  =>  [
        'debug'     =>  true
    ],
    'csrf'  =>  [
        'session'   =>  'csrf_token'
    ]
];