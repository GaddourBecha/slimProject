<?php

namespace App\Auth;


use App\Models\User;

class Auth
{
    public static function attempt($username,$password){
        $user = User::Where('username',$username)->first();
        if (!$user){
            return false;
        }
        if (password_verify($password,$user->password)){
            $_SESSION['user'] = $user->id;
            return true;
        }

        return true;
    }
}