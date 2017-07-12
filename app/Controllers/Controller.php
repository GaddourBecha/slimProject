<?php

namespace App\Controllers;


use Slim\Http\Response;

class Controller
{
    private $container;

    function __construct($container)
    {
        $this->container = $container;
    }

    public function render(Response $response,$path,$params=[]){
        return $this->view->render($response,$path,$params);
    }

    public function redirect(Response $response,$path){
        return $response
            ->withStatus(302)
            ->withHeader('Location',$this->router->pathFor($path));
    }


    function __get($name)
    {
        return $this->container->get($name);
    }

}