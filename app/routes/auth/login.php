<?php
/**
 * Author: PanOtlet
 */


$app->get('/login', function() use ($app){
    $app->render('auth/login.twig');
})->name('login');

$app->post('/login', function() use ($app){
    $request = $app->request;

    $identifier =   $request->post('identifier');
    $password   =   $request->post('password');

    $v = $app->validation;
    $v->validate([
        'identifier' =>  [$identifier, 'required'],
        'password' =>  [$password, 'required'],

    ]);

    if ($v->passes()){
        $user = $app->user
            ->where('username', $identifier)
            ->orWhere('email', $identifier)
            ->first();

        if ($user && $app->hash->passwordCheck($password, $user->password)){
            $_SESSION[$app->config->get('auth.session')] = $user->id;
            $app->flash('global', 'Zalogowano');
            $app->response->redirect($app->urlFor('home'));
        } else {
            $app->flash('global', 'Nie można zalogować');
            $app->response->redirect($app->urlFor('login'));
        }
    }

    $app->render('auth/login.twig',[
        'errors' => $v->errors(),
        'request'=> $request
    ]);
})->name('login.post');