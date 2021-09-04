<?php

class LoginController extends PageController
{
    private $session;

    public function __construct() {
        parent::__construct();
        $this->session = Application::getUserSession();
    }

    public function action_default(){
        if($this->session->checkSession()){
            $url = Controller::formatUrl('HomeController');
            $this->goUrl($url);
            return;
        }
        $this->showAdminPage();
    }

    public function action_login(){
        $password = Application::getVariable('pwd', '');
        $login = Application::getVariable('login', '');
        $user = new UserModel(MyDB::connect());
        if (!empty($password) && !empty($login)) {
            if ($user->getUserByLogin($login) != 0) {
                $id = $user->checkUser($login, $password);
                if ($id != 0) {
                    $this->session->addSession($id, $this->session->getIdSession());
                    $url = Controller::formatUrl('HomeController');
                    $this->goUrl($url);
                    return;
                } else {
                    $this->view->message = 'Incorrect password.';
                    $this->view->login = $login;
                }
            } else {
                $this->view->message = 'Incorrect login.';
            }
        }
        $this->showAdminPage();
    }

    public function action_logout(){
        $this->session->deleteSession($this->session->getIdSession());
        $this->showAdminPage();
    }

    private function showAdminPage(){
        $this->view->setHeader(null);
        $this->view->buildView('login');
        $this->view->setFooter(null);
    }
}

?>