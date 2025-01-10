<?php

namespace App\Model\Auth;

use RedBeanPHP\R;
use Core\Model;

class Auth extends Model
{
    public function regUser($post)
    {
        $users = R::dispense("users");

        $users->name        = h($post["name"]);
		$users->email       = h($post["email"]);
		$users->password    = h(password_hash($post["password"], PASSWORD_DEFAULT));

        $data = R::dispense("data");
        $data->user_id = R::store($users);
        
        R::store($data);
    }

    public function verifyEmail($data)
    {
        return R::count("users", "email = ?", array($data["email"]));
    }

    public function getUser($data)
    {
        return R::findOne("users", "email = ?", array($data["email"]));
    }
    
    public function createUser($post)
    {
        $users = R::dispense("users");
        $users->name        = $post["name"];
        $users->email       = $post["email"];
        $users->password    = password_hash($post["password"], PASSWORD_DEFAULT);

        $data = R::dispense("data");
        $data->work         = $post["work"];
        $data->phone        = $post["phone"];
        $data->address      = $post["address"];

        $data->user_id = R::store($users);
        R::store($data);
    }
}