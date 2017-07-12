<?php

use App\Controllers\Auth\AuthController;
use App\Controllers\PagesControllers;

$app->get('/', PagesControllers::class.':index')->setName('home_page');
$app->get('/auth/signup', AuthController::class.':getSignUp')->setName('auth_sign_up');
$app->post('/auth/signup', AuthController::class.':postSignUp');
$app->get('/auth/signin', AuthController::class.':getSignIn')->setName('auth_sign_in');
$app->post('/auth/signin', AuthController::class.':postSignIn');
