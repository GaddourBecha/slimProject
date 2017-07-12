<?php

namespace App\Middlewares;


use Slim\Container;

class Middleware
{
    protected $container;

    function __construct(Container $container)
    {
        $this->container = $container;
    }
}