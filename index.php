<?php
//FRONT CONTROLLER

  //Options
    ini_set('diisplay_errors',1);
    error_reporting(E_ALL);

    // file system
    define('ROOT', dirname(__FILE__));
   // ROOT =  W:\domains\botvot.loc

    require_once(ROOT.'/components/Router.php');
    //require_once(ROOT.'/components/Db.php');

    //Call Rputer
    $router = new Router();
    $router->start();
//    $router->run();