<?php
namespace App\Middlewares;


use Slim\Http\Request;
use Slim\Http\Response;

class OldInputMiddleware extends Middleware
{
    function __invoke(Request $request,Response $response,$next)
    {

     if (isset($_SESSION['old'])){
         $this->container->view->getEnvironment()->addGlobal('old',$_SESSION['old']);
         $_SESSION['old'] = $request->getParams();

     }
        return $next($request,$response);
    }
}