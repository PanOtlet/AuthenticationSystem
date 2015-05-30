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

    $v = $app->validation;
    $v->validate([
        'email' =>  [$email, 'required|email'],
        'username'  =>  [$username, 'required|alnumDash|max(20)'],
        'password'  =>  [$password, 'required|min(6)'],
        'password_confirm'  =>  [$password2, 'required|matches(password)'],
    ]);

    if ($v->passes()){
        $app->user->create([
            'email' =>  $email,
            'username'  =>  $username,
            'password'  =>  $app->hash->password($password)
        ]);
        $app->flash('global','Zarejestrowany');
        $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/register.twig',[
        'errors' => $v->errors(),
        'request'=> $request
    ]);

})->name('register.post');