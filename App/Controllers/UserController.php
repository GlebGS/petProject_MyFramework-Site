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
    
    public function page_profile(){
        $this->setMeta("Профиль", [], self::$model->getUserById($_GET["id"]));
    }

    public function edit(){
        $this->setMeta("Редактировать", [], self::$model->getUserById($_GET["id"]));
    }

    public function status(){
        $this->setMeta("Изменить статус", [], self::$model->getUserById($_GET["id"]));
    }

    public function avatar(){
        $this->setMeta("Изменить аватар", [], self::$model->getUserById($_GET["id"]));
    }
}