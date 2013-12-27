<?php

    error_reporting(E_ALL);
    ini_set("display_errors","1");

    $route = '/';

    if(isset($_GET['route'])){
        $route = $_GET['route'];
    };

    if (is_file('../config.php')) {
        $config_array = require_once('../config.php');
    } else {
        $config_array = require_once('../config.def.php');
    }

    include_once("../system/start_engine.php"); // запускаем движек
    include_once("../system/config.php"); // класс - конфига

    $registry = new Registry();

    $config = new Config($config_array);
    $registry->set('config', $config);

    $router = new Router($route, $config->get('router'));
    $registry->set('router', $router);

    $layout = new Layout($config->get('template'));
    $registry->set('router', $layout);

    $app = new App($layout, $registry);
    $app->dispatch($router->getPath());
