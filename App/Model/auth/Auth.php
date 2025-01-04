<?php

namespace App\Model\Auth;

use RedBeanPHP\R;
use Core\Model;

class Auth extends Model
{
    public function regUser($data)
    {
        $user = R::dispense("users");
		$user->name=$data["name"];
		$user->email=$data["email"];
		$user->password= password_hash($data["password"], PASSWORD_DEFAULT);
        
		R::store($user);
    }

    public function verifyEmail($data)
    {
        return R::count("users", "email = ?", array($data["email"]));
    }

    public function verifyUser()
    {
        
    }
}