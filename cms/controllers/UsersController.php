<?php

class UsersController extends PageController
{
    protected $model;
    protected $idUser;

    public function __construct(){
        parent::__construct();
        $this->idUser= Application::getUserSession();
        if ($this->idUser->checkSession() == 0) {
            $this->goUrl(SITE_HOST.'cms/index.php');
            exit();
        }
        $this->model = new UserModel(MyDB::connect());
    }

    public function action_add(){
        $login = Application::getVariable("login", "");
        $password = Application::getVariable("password", "");
        $name = Application::getVariable("name", "");
        if (!empty($login) && !empty($password) && !empty($name)) {
            $res = $this->model->userAdd($login, $password, $name);
            $this->view->name = '';
            $this->view->login = '';
            $this->view->message = ($res)? "User added successfully!": "Failed to add user.";
        } 
        else {
            $this->view->name = $name;
            $this->view->login = $login;
            $this->view->message = "Incorrect input data";
        }
        $this->view->ulist = $this->model->getUsers();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_update(){
        $id = Application::getVariable("id", 0);
        $login = Application::getVariable("login", "");
        $name = Application::getVariable("name", "");
        $password = Application::getVariable("password", "");
        if ($id != 0 && !empty($login) && !empty($password) && !empty($name)){
            $res = $this->model->userUpdate($id, $login, $password, $name);
            $this->view->message = ($res)? "User data changed successfully!": "Failed to update user.";
            $this->view->ulist = $this->model->getUsers();
            $views = array('list','add');
            $this->view->buildView($views);
        }
        else
        {
            $info['id'] = $id;
            $info['login'] = $login;
            $info['name'] = $name;
            $this->view->message = "Incorrect input data";
            $this->view->user = $info;
            $views = array('edit');
            $this->view->buildView($views);
        }
    }

    public function action_delete(){
        $id = Application::getVariable("id", 0);
        if ($id == $this->idUser->getUserId()) {
            $this->view->message = "Can't delete yourself.";
        } 
        else {
            if ($id != 0) {
                $res = $this->model->userDelete($id);
                $this->view->message = ($res)? "User deleted successfully!": "Failed to delete user.";
            }
            else
                $this->view->message = "Incorrect id.";
        }
        $this->view->ulist = $this->model->getUsers();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_edit(){
        $id = Application::getVariable("id", 0);
        $this->view->user = $this->model->getUser($id);
        $views = array('edit');
        $this->view->buildView($views);
    }

    public function action_default(){
        $this->view->ulist = $this->model->getUsers();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }
}

?>