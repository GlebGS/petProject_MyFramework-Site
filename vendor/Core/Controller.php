<?php 

namespace Core;

abstract class Controller
{
    public static array $data = [];
    public static array $users = [];
    public static array $meta = [];
    public static object $model;

    public function __construct(public $route = []){session_start();}

    public static function checkUser(){
        if(empty($_SESSION["userID"])){
            redirect_to("/login");
        }
    }

    public static function checkAdmin(){
        if(empty($_SESSION["userID"])){
            redirect_to("/admin");
        }elseif($_SESSION["userROLE"] != "admin"){
            redirect_to("/admin");
        }
    }

    public static function getModel($route)
    { 
        $modelController = upperCamelCase($route["controller"]);
        
        if(empty($route["prefix"]))
        {
            $modelPrefix = '';
        }else{
            $modelPrefix = '' . $route["prefix"] . '\\';
        }

        $model = "App\Model\\" . "{$modelPrefix}" . "{$modelController}";

        if(class_exists($model))
        {
            self::$model = new $model(); 
        }
    }

    public static function getView($route)
    {
        (new View($route, self::$meta))->render(self::$data);
    }

    public static function setData($data)
    {
        self::$data = $data;
    }
    public static function setUsers($users)
    {
        self::$users = $users;
    }
    public static function setMeta($title = '', $users = [])
    {
        self::$meta = [
            "title" => $title,
            $users
        ];
    }
}