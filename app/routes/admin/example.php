<?php
/**
 * Author: PanOtlet
 */

$app->get('/admin/example', $admin(), function() use ($app){

    if ($app->auth->hasPermissions('can_post_topic')){
        echo 'CanPostTopic';
    }

    $app->render('admin/example.twig');
})->name('admin.example');