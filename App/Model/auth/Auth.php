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
        $data->status       = $post["status"];

        if($_FILES["file"]["name"] != '')
        {
            $path = pathinfo($_FILES["file"]["name"]);
            
            $temp_name = $_FILES["file"]["tmp_name"];

            $path_filename_ext = ROOT . "/Public/img/avatar/" . $path["filename"] . "." . $path["extension"];

            if (file_exists($path_filename_ext)) {
                $data->avatar = "/img/avatar/default.png";
                return false;
            }

            move_uploaded_file($temp_name,$path_filename_ext);

            $data->avatar = IMG . "/" . $path["filename"] . "." . $path["extension"];
        }

        $data->user_id = R::store($users);

        R::store($data);
    }
}