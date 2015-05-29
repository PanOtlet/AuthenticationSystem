<?php
/**
 * Author: PanOtlet
 */

$app->get('/register', function() use ($app){
    $app->render('auth/register.twig');
})->name('register');

$app->post('/register', function() use ($app){

    $request    =   $app->request;
    $email      =   $request->post('email');
    $username   =   $request->post('username');
    $password   =   $request->post('password');
    $password2  =   $request->post('password_confirm');

    $app->user->create([
        'email' =>  $email,
        'username'  =>  $username,
        'password'  =>  $app->hash->password($password)
    ]);

    $app->flash('global','Zarejestrowany');
    $app->response->redirect($app->urlFor('home'));

})->name('register.post');