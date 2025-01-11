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

        $data               = R::dispense("data");
        $data->user_id      = R::store($users);
        
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

    public function editAvatar($dataFILE, $id)
    {
        if($dataFILE["name"] != '')
        {
            $data           = R::load("data", $id);

            $path           = pathinfo($dataFILE["name"]);
            $temp_name      = $dataFILE["tmp_name"];
            $full_filename  = ROOT . "/Public/img/avatar/" . $path["filename"] . "." . $path["extension"];

            move_uploaded_file($temp_name,$full_filename);

            $data->avatar   = IMG . "/" . $path["filename"] . "." . $path["extension"];

            return R::store($data);
        }

        return false;
    }
    
    public function createUser($post)
    {
        $users              = R::dispense("users");
        $users->name        = $post["name"];
        $users->email       = $post["email"];
        $users->password    = password_hash($post["password"], PASSWORD_DEFAULT);

        $data               = R::dispense("data");
        $data->work         = $post["work"];
        $data->phone        = $post["phone"];
        $data->address      = $post["address"];
        $data->status       = $post["status"];

        if($_FILES["file"]["name"] != '')
        {
            $path           = pathinfo($_FILES["file"]["name"]);
            $temp_name      = $_FILES["file"]["tmp_name"];
            $full_filename  = ROOT . "/Public/img/avatar/" . $path["filename"] . "." . $path["extension"];

            if (file_exists($full_filename)) {
                $data->avatar = "/img/avatar/default.png";
                return false;
            }

            move_uploaded_file($temp_name,$full_filename);

            $data->avatar   = IMG . "/" . $path["filename"] . "." . $path["extension"];
        }

        $data->user_id      = R::store($users);

        R::store($data);
    }

    public function editById($post, $id)
    {
        $users              = R::load( "users", $id);
        $users->name        = h($post["name"]);
        $users->role        = h($post["role"]);
        
        $data               = R::load( "data", $id);
        $data->work         = h($post["work"]);
        $data->phone        = h($post["phone"]);
        $data->address      = h($post["address"]);
        
        $data->user->id     = R::store($users);

        R::store($data);
    }

    public function editStatusById($post, $id)
    {
        $data               = R::load( "data", $id);
        $data->status       = h($post["status"]);
        
        R::store($data);
    }

    public function delete($id)
    {        
        return R::trashAll( [R::findOne("users", "id = ?", array($id)), R::findOne("data", "user_id = ?", array($id))] );
    }
}