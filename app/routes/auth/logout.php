<?php
/**
 * Author: PanOtlet
 */

$app->get('/logout', function() use ($app){
    unset($_SESSION[$app->config->get('auth.session')]);

    $app->flash('global','Zostałeś wylogowany');
    $app->response->redirect($app->urlFor('home'));
})->name('logout');