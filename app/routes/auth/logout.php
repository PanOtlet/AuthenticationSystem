<?php
/**
 * Author: PanOtlet
 */

$app->get('/logout', function() use ($app){
    unset($_SESSION[$app->config->get('auth.session')]);

    if($app->getCookie($app->config->get('auth.remember'))){
        $app->auth->removeRememberCredentials();
        $app->deleteCookie($app->config->get('auth.remember'));
    }

    $app->flash('global','Zostałeś wylogowany');
    $app->response->redirect($app->urlFor('home'));
})->name('logout');