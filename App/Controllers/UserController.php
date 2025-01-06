<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller
{
    public function users()
    {
        self::checkUser();

        $this->setUsers(self::$model->getAllUsers());
        $this->setData(["user_id" => $_SESSION["userID"], "role" => $_SESSION["userROLE"]]);
        $this->setMeta("Главная страница", self::$users);
    }

    public function page_login(){}

    public function page_register(){}

}