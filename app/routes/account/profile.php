<?php
/**
 * Author: PanOtlet
 */

$app->get('/account/profile', $authenticated(), function() use ($app) {
    $app->render('account/profile.twig');
})->name('account.profile');

$app->post('/account/profile', $authenticated(), function() use ($app) {

    $request    =   $app->request;
    $email      =   $request->post('email');
    $firstname  =   $request->post('first_name');
    $lastname   =   $request->post('last_name');

    $v = $app->validation;

    $v->validate([
        'email'         =>  [$email, 'required|email|uniqueEmail'],
        'first_name'    =>  [$firstname, 'alpha|max(50)'],
        'last_name'     =>  [$lastname, 'alpha|max(50)'],
    ]);

    if ($v->passes()){
        $app->auth->update([
            'email'         =>  $email,
            'first_name'    =>  $firstname,
            'last_name'     =>  $lastname,
        ]);

        $app->flash('global','Information updated');
        $app->response->redirect($app->urlFor('account.profile'));
    }

    $app->render('account/profile.twig',[
        'errors'    =>  $v->errors()
    ]);

})->name('account.profile.post');