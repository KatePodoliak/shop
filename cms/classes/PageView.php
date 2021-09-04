<?php

class PageView extends View
{
    protected $header;
    protected $footer;
    protected $nameController;

    public function __construct($nameController){
        parent::__construct();
        $this->nameController = $nameController;
        $this->header = "include/header.php";
        $this->footer = "include/footer.php";
    }

    public function setHeader($filepath){
        $this->header = $filepath;
    }

    public function setFooter($filepath){
        $this->footer = $filepath;
    }

    public function buildView($view_name = ""){
        @include $this->header;
        $ctrl = strtolower($this->nameController);
        $ctrl = str_replace('controller','',$ctrl);
        if(is_array($view_name)){
            foreach ($view_name as $item){
                if(file_exists('views/'.$ctrl.'/'.$item.'.php'))
                    include_once 'views/'.$ctrl.'/'.$item.'.php';
            }
        } 
        else
            if(!empty($view_name)){
                if(file_exists('views/'.$ctrl.'/'.$view_name.'.php'))
                    include_once 'views/'.$ctrl.'/'.$view_name.'.php';
            } 
            else {
                if(file_exists('views/'.$ctrl.'/index.php'))
                    include_once 'views/'.$ctrl.'/index.php';
        }
        include $this->footer;
    }
}

?>