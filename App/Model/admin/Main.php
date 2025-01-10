<?php

namespace App\Model\Admin;

use RedBeanPHP\R;
use Core\Model;

class Main extends Model
{
    public function getAllDataUsers()
    {
        return R::getAll("SELECT * FROM users, data WHERE users.id = data.user_id");
    }

    public function getUserById($id)
    {
        return R::getAll("
            SELECT * FROM users
            LEFT JOIN data
                ON data.user_id = {$id}
            WHERE users.id = {$id}
        ");
    }

    public function countOnlineUsers()
    {
        return R::getAll("SELECT COUNT(*) FROM data WHERE status = 'success';");
    }
}
