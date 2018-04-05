<?php


use Jenssegers\Blade\Blade;

class Router
{
    private $url;
    private $controllerName;

    public function __construct()
    {
        $this->controllerName = 'DefaultController';
    }

    public function start()
    {
        $blade = new Jenssegers\Blade\Blade('views', 'cache');

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

        /*foreach($this->route as $key => $value) {
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
        }*/
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



