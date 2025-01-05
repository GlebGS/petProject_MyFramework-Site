<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller
{
    
    public function users()
    {
        self::checkUser();

        $this->setData(["id" => self::$userID, "role" => self::$userROLE]);
        $this->setMeta("Главная страница");
    }

    public function page_login(){}

    public function page_register(){}

}