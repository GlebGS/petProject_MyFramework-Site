<?php

namespace App\Model;

use RedBeanPHP\R;
use Core\Model;

class User extends Model
{
    public function getAllDataUsers() 
    {

        return R::getAll("
            SELECT * FROM users
            INNER JOIN users_data
                ON users_data.user_id = id
            WHERE users.id = id
        ");
    }
    public function getUserById($id)
    {
        return R::getAll("
            SELECT * FROM users
            INNER JOIN users_data
                ON users_data.user_id = {$id}
            WHERE users.id = {$id}
        ");
    }
}