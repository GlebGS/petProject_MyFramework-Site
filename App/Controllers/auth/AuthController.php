<?php

namespace App\Controllers\Auth;

use RedBeanPHP\R;
use Core\Controller;

class AuthController extends Controller
{
    public function registration()
    {
        if(mb_strlen($_POST["name"]) < 4){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткое имя! Минимум 4 символа.";
            return redirect_to("/registration");
        }

        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $_POST["email"])){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Не корректный EMAIL.";
            return redirect_to("/registration");
        }

        if(self::$model->verifyEmail($_POST)){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пользователь с таким EMAIL уже существует.";
            return redirect_to("/registration");
        }

        if(mb_strlen($_POST["password"]) < 8){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Короткий пароль! Минимум 8 символов.";
            return redirect_to("/registration");
        }

        if($_POST["password2"] != $_POST["password"]){
            $_SESSION["error"] = "<strong>Уведомление!</strong> Пароли не совподают.";
            return redirect_to("/registration");
        }

        self::$model->regUser($_POST);

        $_SESSION["true_registration"] = "<strong>Уведомление!</strong> Регистрация успешна.";
        return redirect_to("/login");
    }
}