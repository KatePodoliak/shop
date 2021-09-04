<?php

class HomeController extends PageController
{
    public function __construct(){
        parent::__construct();
        $user_id = Application::getUserSession();
        if ($user_id->checkSession() == 0) {
            $this->goUrl(SITE_HOST.'cms/index.php');
            exit();
        }
    }

    public function action_default(){
        $views = array('home');
        $this->view->buildView($views);
    }
}

?>