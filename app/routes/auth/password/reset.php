<?php
/**
 * Author: PanOtlet
 */

$app->get('/password-reset', $guest(), function() use ($app){
    echo 'Reset';
})->name('password.reset');