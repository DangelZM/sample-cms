<?php
final class App {

    private $layout;
    private $registry;
    private $document;


    function __construct($layout, $registry)
    {
        $this->layout = $layout;
        $this->registry = $registry;
        $this->document = array(
            'meta_title' => 'SampleCMS - Example site',
            'header_title' => 'SampleCMS',
            'footer_text' => '&copy;SampleCMS, 2013 -' . date("Y")
        );
    }


    function dispatch($action)
    {
        $method = $action . 'Action'; //метод
        if(method_exists($this, $method)) // проверяем есть ли такой метод
        {
			$this->layout->setView($action);
            $this->$method($action); // вызов методов которые мы задали, для существующих страниц
        } 
    }

    private function homeAction(){
        $page_data = array(
            'title' => 'Главная страница', //ещё немного данных для отображения
            'text' => 'Текст для главной страницы'
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function contactAction(){
		$page_data = array(
            'title' => 'Контакты',
            'text' => 'Это страница контактов'
        );

        $data = array_merge($this->document, $page_data);

		$this->layout->render($data);
    }

    private function aboutAction(){ //пробуем, может сразу не получиться, писал как ты видел по ходу все продумывая
        $page_data = array(
            'title' => 'Страница о нас',
            'text' => 'Текст страницы о нас'
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    function notfoundAction(){
        $this->layout->render();
    }

}