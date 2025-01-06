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
        $this->setMeta("Главная страница администратора");
    }

}