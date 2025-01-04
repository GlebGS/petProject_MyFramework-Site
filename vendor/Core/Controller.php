<?php 

namespace Core;

abstract class Controller
{
    public static array $data = [];
    public static array $meta = [];
    public static object $model;
    public static $user;

    public function __construct(public $route = []){}

    public static function checkUser(){
        if(empty($_SESSION["userID"])){
            redirect_to("/login");
        }

        return self::$user = $_SESSION["userID"];
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
    public static function setMeta($title = '')
    {
        self::$meta = [
            "title" => $title
        ];
    }
}