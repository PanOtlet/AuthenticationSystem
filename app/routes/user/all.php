<?php
/**
 * Author: PanOtlet
 */

$app->get('/users', function() use ($app){

    $users = $app->user->where('active',true)->get();

    $app->render('user/all.twig', [
        'users' =>  $users
    ]);

})->name('user.all');