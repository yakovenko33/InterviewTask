<?php

class Router
{
    private $url;
    private $controllerName;

    public function __construct()
    {
        $this->controllerName = 'DefaultController';
    }

    /*
     * Get URL and connect Controller and Action;
     */
    public function start()
    {
        $this->url = explode( '/', $_SERVER['REQUEST_URI']);

        $controllerObj = $this->requireController($this->controllerName);
        $actionName = 'home';

        if(!empty($this->url[1])) {
            $actionName = $this->url[1];
        }

        $actionName = $actionName .'Action';

        if(!empty($this->url[2])) {
            $value = (int)$this->url[2];
        }

        if(!method_exists($controllerObj,$actionName)) {
            print_r("Error 404");
            exit;
        } else {
            if(!empty($value)) {
                $controllerObj->$actionName($value);
            }
            $controllerObj->$actionName();
        }
    }

    /*
     * Include our NameController.php and create object $controller
     * return object $controller;
     */
    private function requireController($controllerName)
    {
        require_once(ROOT.'/controller/'.$this->controllerName .'.php');
        $controller = new $controllerName;

        return $controller;
    }
}



