<?php
/**
 * Author: PanOtlet
 */

$app->get('/activate', $guest(), function() use ($app){

    $request = $app->request;

    $email      =   $request->get('email');
    $identifier =   $request->get('identifier');
    $hashedId   =   $app->hash->hash($identifier);

    $user   =   $app->user->where('email',$email)
        ->where('active',false)
        ->first();

    if (!$user || !$app->hash->hashCheck($user->active_hash, $hashedId)){
        $app->flash('global', 'Problem z aktywacją');
        $app->response->redirect($app->urlFor('home'));
    } else {
        $user->activateAccount();

        $app->flash('global', 'Konto aktywowane');
        $app->response->redirect($app->urlFor('home'));
    }

})->name('activate');