<?php
/**
 * Author: PanOtlet
 */

$app->notFound(function() use ($app){
    $app->render('errors/404.twig');
});