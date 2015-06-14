<?php
/**
 * Author: PanOtlet
 */

$app->get('/change-password', $authenticated(), function() use ($app){
    $app->render('auth/password/change.twig');
})->name('auth.password.change');

$app->post('/change-password', $authenticated(), function() use ($app){

    $request =  $app->request;

    $passwordOld    =   $app->request->post('password_old');
    $password       =   $app->request->post('password');
    $password2      =   $app->request->post('password2');

    $v = $app->validation;

    $v->validate([
        'password_old'  =>  [$passwordOld, 'required|matchesCurrentPassword'],
        'password'      =>  [$password, 'required|min(6)'],
        'password2'     =>  [$password2, 'required|matches(password)']
    ]);

    if ($v->passes()){

        $user   =   $app->auth;

        $user->update([
            'password'  =>  $app->hash->password($password)
        ]);

        $app->mail->send('email/auth/password/change.twig', [], function($message) use ($user){
            $message->to($user->email);
            $message->subject('You changed your password.');
        });

        $app->flash('global','You change your password');
        $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/password/change.twig', [
        'errors'    =>  $v->errors()
    ]);

})->name('auth.password.change.post');