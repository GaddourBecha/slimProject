<?php

use Respect\Validation\Validator as v;

v::with('App\\Validators\\Rules');
$app->add(new \App\Middlewares\ValidationErrorsMiddleware($container));
$app->add(new \App\Middlewares\OldInputMiddleware($container));