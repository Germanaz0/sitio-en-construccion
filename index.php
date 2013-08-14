<?php

require_once __DIR__.'/silex/vendor/autoload.php';
require_once __DIR__.'/config.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['site_config'] = $config; 

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig', array());
});

$app->run();
