<?php
/**
 * Author: PanOtlet
 */

$app->get('/', function() use ($app){

    echo $app->randomlib->generateString(128);

    $app->render('home.twig');
})->name('home');

$app->get('/flash', function() use ($app){
    $app->flash('global', 'Surprise Motherfucker!');
    $app->response->redirect($app->urlFor('home'));
});