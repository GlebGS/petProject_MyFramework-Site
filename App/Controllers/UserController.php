<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller
{
    public function users()
    {
        self::checkUser();
        $this->setMeta("Главная страница", self::$model->getAllDataUsers(), self::$model->getUserById($_SESSION["userID"]));
    }

    public function page_login(){}

    public function page_register(){}

    public function create_user()
    {
        $this->setMeta("Добавить пользователя");
    }
    
    public function page_profile(){}
}