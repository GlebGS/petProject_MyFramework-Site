<?php

namespace Core;

use Exception;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];

    protected static $controller;
    protected static $pathController;

    public static function add($uri, $route = [])
    {
        return self::$routes[$uri] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    protected static function removeQueryString($url){
        if($url){
            $param = explode('&', $url, 2);
            $param2 = explode('?', $url, 2);
            
            if(false === str_contains($param[0], '='))
            {
                return rtrim($param[0], '');
            }elseif(false === str_contains($param2[0], '='))
            {
                return rtrim($param2[0], '');
            }
        }
        
        return '';
    }

    public static function dispatch()
    {
        $action = lowerCamelCase(self::$route["method"]);

        if(class_exists(self::$pathController))
        {
            // вызываем объект класса
            $controllerObject = new self::$pathController(self::$route);

            if(method_exists($controllerObject, $action)){
                // Вызов модели
                $controllerObject->getModel(self::$route);
                // Вызов метод класса
                $controllerObject->$action();
                // Вызов вида
                $controllerObject->getView(self::$route);
            }else{
                throw new Exception("Метод " . self::$controller . "::" . $action . " не найден!", 500);
            }
        }else{
            throw new Exception("Класса " . self::$controller . " не существует!", 500);
        }
    }

    public static function matchRoute($uri)
    {
        $uri = self::removeQueryString($uri);

        // Если текущий маршрут есть в таблице маршрутов, то записать его в self::$route
        foreach(self::$routes as $path => $route)
        {
            if($path == $uri){
                foreach($route as $k => $v){
                    $route[$k] = $v;
                    self::$route = $route;
                }
            }
        }
        // Формирование префикса в пути к контроллеру
        if(!empty(self::$route["prefix"])) {
            $pathControllerPrefix = '' . self::$route["prefix"] . '\\';
        }else{
            $pathControllerPrefix = '';
        }
        // controller формат CamelCase
        self::$controller = upperCamelCase(self::$route["controller"]) . "Controller";
        // путь к контроллеру
        self::$pathController = "App\Controllers\\" . $pathControllerPrefix . self::$controller;

        return self::dispatch();
    }
}