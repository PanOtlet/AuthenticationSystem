<?php
/**
 * Author: PanOtlet
 */

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    =>  $app->config->get('db.driver'),
    'host'      =>  $app->config->get('db.host'),
    'database'  =>  $app->config->get('db.name'),
    'username'  =>  $app->config->get('db.user'),
    'password'  =>  $app->config->get('db.pass'),
    'charset'   =>  $app->config->get('db.charset'),
    'collation' =>  $app->config->get('db.collation'),
    'prefix'    =>  $app->config->get('db.prefix')
]);

$capsule->bootEloquent();