<?php

class Application {
    private $handlers = [];

    // public function __construct($routes) {
    //     $this->routes = $routes;
    // }
    public function get($route, $hander) {
        $this->append('GET', $route, $hander);
    }

    public function post($route, $hander) {
        $this->append('POST', $route, $hander);
    }

    private function append($method, $route, $handler) {
        $this->handlers[] = [$route, $method, $handler]; 
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        foreach ($this->handlers as $item) {
            list($route, $handlerMethod, $handler) = $item;
            $preparedRoute = str_replace('/', '\/', $route);
            $matches = [];
            if($method == $handlerMethod && preg_match("/^$preparedRoute$/i", $uri, $matches)) {
                $arguments = array_filter($matches, function($key) {
                    return !is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);
                echo $handler($_GET, $arguments);
                // echo json_encode($arguments);
            }
        }
    }
}