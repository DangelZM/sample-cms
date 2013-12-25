<?php
class Controller {

    private $layout;

    function __construct($layout)
    {
        $this->layout = $layout;
    }


    function setAction($action )
    {
        $method = $action . 'Action'; //метод
        if(method_exists($this, $method)) // проверяем есть ли такой метод
        {
            $this->$method($action); // вызов методов которые мы задали, для существующих страниц
        } else {
            $this->notFound(); // а сдесь для тех которые 404 тоесть пользователь ввел что то не то и страницы для адреса нет
        }
    }

    private function homeAction($action){
        $this->layout->setView($action);
        $data = array(
            'title' => 'Тайтл', //ещ' немного
            'text' => 'Текст'
        );

        $this->layout->render($data);
    }

    private function contactAction(){
        echo "Это страница контактов";
    }

    private function aboutAction($action){ //пробуем, может сразу не получиться, писал как ты видел по ходу все продумывая
        $this->layout->setView($action);
        $data = array(
            'title' => 'Тайтл', //ещ' немного
            'text' => 'Текст'
        );

        $this->layout->render($data);
    }

    function notFound(){
        echo "Cтраница не найдена!";
    }

}