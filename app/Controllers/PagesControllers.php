<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class PagesControllers extends Controller
{
    public function index(Request $request, Response $response){

        $this->render($response,'pages/home.twig',[
            'name' => 'Gaddour'
        ]);
    }
}