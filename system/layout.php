<?php
class Layout {

    private $template;
    private $view;

    function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    public function render($data) {

        $layout = file_get_contents('../views/' . $this->template . '/main.tpl');
        $view = file_get_contents('../views/' . $this->template . '/pages/' . $this->view . '.tpl');

        foreach($data as $key=>$val){
            $view = str_replace('{' . $key . '}', $val , $view);
        }

        $output = str_replace('{content}', $val , $layout);

        echo $output;

    }


    //тут нужно будет найти готовый код для обфускации шаблона, думаю в опенкарте найдем, пока просто вывод попробую сделать


} 