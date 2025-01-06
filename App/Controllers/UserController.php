<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller
{
    
    public function users()
    {
        self::checkUser();

        $this->setData(["id" => $_SESSION["userID"], "role" => $_SESSION["userROLE"]]);
        $this->setMeta("Главная страница");
    }

    public function page_login(){}

    public function page_register(){}

}