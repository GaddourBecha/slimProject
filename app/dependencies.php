<?php

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use($capsule) {
    return $capsule;
};

$container['view'] = function ($container) {
    $dir = dirname(__DIR__);
    $view = new \Slim\Views\Twig($dir.'/app/views', [
        'cache' => false //$dir.'/tmp/cache'
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['validator'] = function($container){
    return new \App\Validators\Validator();
};