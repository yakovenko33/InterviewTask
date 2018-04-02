<?php

class Router
{
    private $url;
    private $route;
    private $controllerName;

    public function __construct()
    {
        require_once(ROOT.'/config/routers.php');
        $this->route = routersConfig();
    }

    private function getURL()
    {
        $this->url = trim($_SERVER['REQUEST_URI']);

        return $this->url;
    }

    public function start()
    {
        $this->getURL();

        foreach($this->route as $key => $value) {
            if(preg_match("~$key~", $this->url)) {
                $internalRoute = preg_replace("~$key~", $value, $this->url);
                $temp = explode('/',$internalRoute);

                $this->controllerName = array_shift($temp)."Controller";
                $this->controllerName = ucfirst($this->controllerName);

                $actionName = array_shift($temp)."Action";

                $controller = $this->requireController($this->controllerName);

                call_user_func_array(array($controller,$actionName),$temp);
                break;
            }
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



