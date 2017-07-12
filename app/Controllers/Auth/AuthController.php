<?php

namespace App\Controllers\Auth;

use App\Auth\Auth;
use App\Controllers\Controller;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     */
    public function getSignUp(Request $request, Response $response){
        $this->render($response,'auth/signup.twig');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return static
     */
    public function PostSignUp(Request $request, Response $response){

        $validation = $this->validator->validate($request,[
            'username' => v::noWhitespace()->notEmpty()->alpha(),
            'email' => v::noWhitespace()->notEmpty()->email(),
            'password'=> v::min(8)->noWhitespace()->notEmpty(),
        ]);

        if($validation->failed()){
            return $this->redirect($response,'auth_sign_up');
        }

        $user = User::create([
            'username' => $request->getParam('username'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'),PASSWORD_DEFAULT)
        ]);
        return $this->redirect($response,'home_page');
    }


    public function getSignIn(Request $request, Response $response){
        $this->render($response,'auth/signin.twig');
    }

    public function postSignIn(Request $request, Response $response){
        $auth = Auth::attempt(
            $request->getParam('username'),
            $request->getParam('password')
        );

        var_dump($auth);
        die;
    }

}