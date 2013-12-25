<?php
class Router {

    private $path;

    public function __construct($route, $route_array)
    {
        //пока пусть будет так
        $this->path = $route_array[$route];
        //echo 'наш путь - ' . $this->path;
    }

    public function getPath()
    {
        return $this->path; //возвращает путь
    }


}