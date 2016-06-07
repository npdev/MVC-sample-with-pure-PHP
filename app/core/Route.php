<?php

namespace app\core;

class Route {

    public $action = 'index';

    public function init() {
        $model = new Model();
        $routes = \explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $p = strrpos($routes[1], '.');
            if ($p > 0) {
                $routes[1] = substr($routes[1], 0, $p);
            }
            if ($model->isStaticPage($routes[1])) {
                $this->action = 'page';
            } else {
                $this->action = $routes[1];
            }
        }
        $controller = new Controller($routes[1]);
        $action_name = 'action' . ucfirst(strtolower($this->action));
        if (method_exists($controller, $action_name)) {
            $controller->$action_name($routes[1]);
        } else {
            $this->ErrorPage404();
        }
        return;
    }

    public function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host);
    }

}
