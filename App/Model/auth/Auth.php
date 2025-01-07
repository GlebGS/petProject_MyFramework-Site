<?php

namespace App\Model\Auth;

use RedBeanPHP\R;
use Core\Model;

class Auth extends Model
{
    public function regUser($data)
    {
        $users = R::dispense('users');

        $users->name        = h($data["name"]);
		$users->email       = h($data["email"]);
		$users->password    = h(password_hash($data["password"], PASSWORD_DEFAULT));

        list($id, $user_id) = R::dispense('data', 2);
        
        $users->ownBuilding = array($id, $user_id);

        R::store($users);
    }

    public function verifyEmail($data)
    {
        return R::count("users", "email = ?", array($data["email"]));
    }

    public function getUser($data)
    {
        return R::findOne("users", "email = ?", array($data["email"]));
    }
    
}