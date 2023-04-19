<?php

namespace Core;

class Route
{
    public function __construct()
    {
        require_once __DIR__ . '/../routes/web.php';
    }
    public static $routes = [];

    // Tuong ung http method = get
    public static function get($path, $callback)
    {
        // echo $path . '</br>';
        $path = self::handlePath($path);
        self::$routes['get'][$path] = $callback;
    }
    // Tuong ung http method = post
    public static function post($path, $callback)
    {
        $path = self::handlePath($path);
        self::$routes['post'][$path] = $callback;
    }
    public static function handlePath($path)
    {
        $path = preg_replace('/\{.+?\}/', '(.+)', $path);
        return trim($path, '/');
    }
    public function execute()
    {

        $path = $this->getPath(); //Lay path hien tai ma nguoi dung go vao
        $method = $this->getMethod(); // lay method hien tai
        // echo $path . '</br>';
        // echo '<pre>';
        // print_r(self::$routes[$method]);
        // echo '</pre>';
        $callback = null;
        $params = [];
        if (!empty(self::$routes[$method])) {
            foreach (self::$routes[$method] as $key => $value) {
                if (preg_match('~^' . $key . '$~i', $path, $matches)) {
                    $callback = self::$routes[$method][$key];
                    if (!empty($matches[1])) {
                        $params = $matches;
                    }
                }
            }
        }
        unset($params[0]);
        $params = array_values(($params));
        // echo '<pre>';
        // print_r($params);
        // echo '</pre>';
        if (!empty($callback)) {
            // $callback = self::$routes[$method][$path];
            //execute callback
            if (is_array($callback)) {
                $controllerName = $callback[0];
                $controllerAction = $callback[1];
                $controller = new $controllerName();
                echo call_user_func_array([$controller, $controllerAction], $params);
            } else {
                echo call_user_func_array($callback, []);
            }
        } else {
            require_once '../core/errors/404.php';    //Boi vi dang di vao app của bootstrap -> cần ../core
        }
    }
    public function getPath()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestUri = $requestUri['path'];
        $dirnamePublic = dirname($_SERVER['SCRIPT_NAME']);
        $pathArr = explode($dirnamePublic, $requestUri);
        $path = trim(end($pathArr), '/');
        return $path;
    }
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
