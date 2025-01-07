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
            INNER JOIN data
                ON data.id = users.id
            WHERE users.id = data.id
        ");
    }
    public function getUserById($id)
    {
        return R::getAll("
            SELECT * FROM users
            INNER JOIN data
                ON data.id = {$id}
            WHERE users.id = {$id}
        ");
    }
}