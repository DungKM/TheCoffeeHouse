<?php

namespace App;

class Router
{
    public static $routes = [];

    protected $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public static function get($path, $callback)
    {
        static::$routes['get'][$path] = $callback;
    }
    public static function post($path, $callback)
    {
        static::$routes['post'][$path] = $callback;
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
//         ' REQUEST_URI '
// URI được cung cấp để truy cập trang này; ví dụ, ' /index.html'.
        $path = str_replace("/public/", '/', $path); // Hàm str_replace() thay thế một số ký tự bằng một số ký tự khác trong một chuỗi.
        $position = strpos($path, '?');  // Tìm vị trí xuất hiện dấu ? đầu tiên trong chuỗi
        if ($position) {
            $path = substr($path, 0, $position); // lấy kí tự từ 0 tới vị trí xuất hiện dấu ?
        }
        return $path; 
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']); // Chuyển đổi tất cả các ký tự thành chữ thường(trả về một phương thức yêu cầu ví dụ : POST, PUT, GET)
    }
    public function resolve()
    {
        $path = $this->getPath();
        $method = $this->getMethod();

        $callback = static::$routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "404 FILE NOT FOUND";
            exit;
        }
        //Nếu $callback là 1 function
        if (is_callable($callback)) {
            return $callback();
        }
        //nếu $callback là 1 array
        if (is_array($callback)) {
            $class = new $callback[0];
            $action = $callback[1];
            return call_user_func([$class, $action], $this->request);
        }
    }
}