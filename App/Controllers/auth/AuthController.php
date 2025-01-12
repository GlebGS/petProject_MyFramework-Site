<?php

namespace App\Controllers\Auth;

use RedBeanPHP\R;
use Core\Controller;

class AuthController extends Controller
{

    public function registration()
    {
        if(mb_strlen($_POST["name"]) < 4)
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткое имя! Минимум 4 символа.";
            return redirect_to("/registration");
        }

        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST["email"]))
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Не корректный EMAIL.";
            return redirect_to("/registration");
        }

        if(self::$model->verifyEmail($_POST))
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пользователь с таким EMAIL уже существует.";
            return redirect_to("/registration");
        }

        if(mb_strlen($_POST["password"]) < 8)
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткий пароль! Минимум 8 символов.";
            return redirect_to("/registration");
        }

        if($_POST["password2"] != $_POST["password"])
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пароли не совподают.";
            return redirect_to("/registration");
        }

        self::$model->regUser($_POST);

        $_SESSION["true_registration"] = "Регистрация прошла успешна.";
        
        return redirect_to("/login");
    }

    public function login()
    {
        $user = self::$model->getUser($_POST);

        if($user)
        {
            if(password_verify($_POST["password"], $user->password))
            {
                $_SESSION["userID"]         = $user->id; 
                $_SESSION["userROLE"]       = $user->role;

                redirect_to("/users");
            }
        }

        $_SESSION["error"] = "<strong>Уведомление!</strong> Такого пользователя не существует.";

        redirect_to("/login");
    }

    public function loginAdmin()
    {
        $user = self::$model->getUser($_POST);
        
        if($user)
        {
            if($user->role != "admin")
            {
                redirect_to("/admin");
            }
            if(!password_verify($_POST["password"], $user->password))
            {
                redirect_to("/admin");
            }

            $_SESSION["userID"]         = $user->id; 
            $_SESSION["userROLE"]       = $user->role;

            redirect_to("/admin/menu");
        }

        redirect_to("/admin");
    }

    public function statusController() 
    {
        debug($_FILES);

        debug(IMG . "/" . $_FILES["file"]["name"]);
    }

    public function create_user()
    {
        if(mb_strlen($_POST["name"]) < 4){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Слишком короткое имя.";
            return redirect_to("/create");
        }

        if(self::$model->verifyEmail($_POST))
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пользователь с таким EMAIL уже существует.";
            return redirect_to("/create");
        }

        if(self::$model->verifyPhone($_POST))
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пользователь с таким номером телефона уже существует.";
            return redirect_to("/create");
        }

        if(mb_strlen($_POST["password"]) < 8)
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткий пароль! Минимум 8 символов.";
            return redirect_to("/create");
        }

        self::$model->createUser($_POST);

        $_SESSION["true"] = "Пользователь успешно добавлен.";

        redirect_to("/create"); 
    }

    public function edit_user()
    {
        if(strlen($_POST["phone"]) < 15)
        {
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткий номер телефона.";
            return redirect_to("/edit?id={$_GET["id"]}");
        }
        self::$model->editById($_POST, $_GET["id"]);

        $_SESSION["true"] = "Данные успешно изменены.";

        redirect_to("/edit?id={$_GET["id"]}");
    }

    public function edit_status()
    {
        self::$model->editStatusById($_POST, $_GET["id"]);

        $_SESSION["true"] = "Данные успешно изменены.";

        redirect_to("/status?id={$_GET["id"]}");
    }

    public function auth_edit_avatar()
    {
        self::$model->editAvatar($_FILES["file"], $_GET["id"]);

        $_SESSION["true"] = "Данные успешно изменены.";

        redirect_to("/edit_avatar?id={$_GET["id"]}");
    }

    public function delete()
    {
        self::$model->delete($_GET["id"]);
        redirect_to("/admin/menu");
    }
}