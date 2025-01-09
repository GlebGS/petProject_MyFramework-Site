<?php

namespace App\Controllers\Admin;

use Core\Controller;

class MainController extends Controller
{

    public function index()
    {
        $this->setMeta("Вход администратора");
    }

    public function menu()
    {
        $this->checkAdmin();

        $this->setData([self::$model->countOnlineUsers()]);
        $this->setMeta("Главная страница администратора", self::$model->getAllDataUsers(), self::$model->getUserById($_SESSION["userID"]));
    }

}