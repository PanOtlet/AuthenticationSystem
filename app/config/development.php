<?php

return [
    'app'   =>  [
        'url'   =>  'http://auth.sys',
        'hash'  =>  [
            'algo'  =>  PASSWORD_BCRYPT,
            'cost'  =>  10
        ],
    ],
    'db'    =>  [
        'driver'    =>  'mysql',
        'host'      =>  '127.0.0.1',
        'name'      =>  'authsys',
        'user'      =>  'root',
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
        'host'      =>  'smtp.emaillabs.net.pl',
        'username'  =>  '1.panotlet.smtp',
        'password'  =>  'Kurwamac1',
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