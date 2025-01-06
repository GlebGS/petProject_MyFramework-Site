<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller
{
    public function users()
    {
        self::checkUser();
        
        $this->setMeta("Главная страница", self::$model->getAllUsers());
    }

    public function page_login(){}

    public function page_register(){}

}