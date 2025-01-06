<?php

namespace App\Controllers\Admin;

use Core\Controller;

class MainController extends Controller
{

    public function index()
    {
        if($_SESSION["userROLE"] == "admin"){
            redirect_to("/admin/menu");
        }
    }

    public function menu()
    {
        $this->checkAdmin();
    }

}