<?php

namespace App\Model;

use RedBeanPHP\R;
use Core\Model;

class User extends Model
{
    public function getAllUsers() 
    {
        return R::findAll("users");
    }
}