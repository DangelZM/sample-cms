<?php

    error_reporting(E_ALL);
    ini_set("display_errors","1");

    $route = '/';

    if(isset($_GET['route'])){
        $route = $_GET['route'];
    };

    include_once("../system/start_engine.php"); // запускаем движек
    include_once("../system/config.php"); // класс - конфига

    //TODO add Registry Class

    $config = new Config(include_once("../config.php"));
    $router = new Router($route, $config->get('router'));
    $layout = new Layout($config->get('template'));
    $app = new App($layout);
    $app->dispatch($router->getPath());
