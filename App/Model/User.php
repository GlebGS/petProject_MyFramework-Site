<?php

namespace App\Model;

use RedBeanPHP\R;
use Core\Model;

class User extends Model
{
    public function getAllDataUsers()
    {
        return R::getAll("SELECT * FROM users, data WHERE users.id = data.users_id");
    }
    public function getUserById($id)
    {
        return R::getAll("
            SELECT * FROM users
            INNER JOIN data
                ON data.users_id = {$id}
            WHERE users.id = {$id}
        ");
    }
}
