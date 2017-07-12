<?php

namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class ValidationErrorsMiddleware extends Middleware
{
    function __invoke(Request $request,Response $response,$next)
    {
        if (isset($_SESSION['errors'])){
            $this->container->view->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
            unset($_SESSION['errors']);
        }
        return $next($request,$response);
    }
}