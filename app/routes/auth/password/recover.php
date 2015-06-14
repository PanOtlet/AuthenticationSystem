<?php
/**
 * Author: PanOtlet
 */

$app->get('/recover-password', $guest(), function() use ($app){
    $app->render('auth/password/recover.twig');
})->name('password.recover');

$app->post('/recover-password', $guest(), function() use ($app){
    $request = $app->request;
    $email = $request->post('email');
    $v = $app->validation;

    $v->validate([
        'email' =>  [$email, 'required|email']
    ]);

    if ($v->passes()) {
        $user = $app->user->where('email', $email)->first();
        if (!$user){
            $app->flash('global', 'Could not find that user.');
            $app->response->redirect($app->urlFor('password.recover'));
        } else {
            $identifier = $app->randomLib->generateString(128);

            $user->update([
                'recover_hash' =>  $app->hash->hash($identifier)
            ]);

            $app->mail->send('email/auth/password/recover.twig',[
                'user'  =>  $user,
                'identifier'    =>  $identifier
            ], function ($message) use($user){
                $message->to($user->email);
                $message->subject('Recover your password');
            });

            $app->flash('global','Recovery Email send');

            $app->response->redirect($app->urlFor('home'));
        }
    }

    $app->render('auth/password/recover.twig', [
        'errors'    =>  $v->errors(),
        'request'   =>  $request
    ]);

})->name('password.recover.post');