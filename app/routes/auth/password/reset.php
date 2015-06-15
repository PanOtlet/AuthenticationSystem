<?php
/**
 * Author: PanOtlet
 */

$app->get('/password-reset', $guest(), function() use ($app){

    $request    =   $app->request();
    $email      =   $request->get('email');
    $identifier =   $request->get('identifier');

    $hashedIdentifier   =   $app->hash->hash($identifier);

    $user   =   $app->user->where('email', $email)->first();

    if (!$user){
        $app->response->redirect($app->urlFor('home'));
    }

    if (!$user->recover_hash){
        $app->response->redirect($app->urlFor('home'));
    }

    if (!$app->hash->hashCheck($user->recover_hash, $hashedIdentifier)){
        $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/password/reset.twig', [
        'email'         =>  $user->email,
        'identifier'    =>  $identifier
    ]);

})->name('password.reset');

$app->post('/password-reset', $guest(), function() use ($app){

    $request    =   $app->request();
    $email      =   $request->get('email');
    $identifier =   $request->get('identifier');
    $password   =   $request->post('password');
    $password2  =   $request->post('password2');

    $hashedIdentifier   =   $app->hash->hash($identifier);

    $user   =   $app->user->where('email', $email)->first();

    if (!$user){
        $app->response->redirect($app->urlFor('home'));
    }

    if (!$user->recover_hash){
        $app->response->redirect($app->urlFor('home'));
    }

    if (!$app->hash->hashCheck($user->recover_hash, $hashedIdentifier)){
        $app->response->redirect($app->urlFor('home'));
    }

    $v = $app->validation;

    $v->validate([
        'password' =>  [$password, 'required|min(6)'],
        'password2'=>  [$password2, 'required|matches(password)']
    ]);

    if ($v->passes()) {
        $user->update([
            'password'      =>  $app->hash->password($password),
            'recover_hash'  =>  null
        ]);

        $app->flash('global', 'Password changed. Log in with new password');
        $app->response->redirect($app->urlFor('login'));
    }

    $app->render('auth/password/reset.twig',[
        'errors'        =>  $v->errors(),
        'email'         =>  $user->email,
        'identifier'    =>  $identifier
    ]);

})->name('password.reset.post');