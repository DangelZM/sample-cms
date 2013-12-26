<?php
class App {

    private $layout;

    function __construct($layout)
    {
        $this->layout = $layout;
    }


    function dispatch($action )
    {
        $method = $action . 'Action'; //метод
        if(method_exists($this, $method)) // проверяем есть ли такой метод
        {
			$this->layout->setView($action);
            $this->$method($action); // вызов методов которые мы задали, для существующих страниц
        } 
    }

    private function homeAction(){
        $data = array(
            'title' => 'Главная страница', //ещё немного данных для отображения
            'text' => 'Текст для главной страницы'
        );

        $this->layout->render($data);
    }

    private function contactAction(){
		$data = array(
            'title' => 'Контакты',
            'text' => 'Это страница контактов'
        );
		
		$this->layout->render($data);
    }

    private function aboutAction(){ //пробуем, может сразу не получиться, писал как ты видел по ходу все продумывая
        $data = array(
            'title' => 'Страница о нас',
            'text' => 'Текст страницы о нас'
        );

        $this->layout->render($data);
    }

    function notfoundAction(){
        $this->layout->render();
    }

}