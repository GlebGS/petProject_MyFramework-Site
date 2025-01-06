<?php

namespace App\Controllers;

use Core\Controller;

class MainController extends Controller
{
    
    public function index()
    {
        redirect_to("/users");
    }

    public function out()
    {
        session_destroy();
        redirect_to("/login");
    }

}