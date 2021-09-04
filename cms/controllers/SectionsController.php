<?php

class SectionsController extends PageController
{
    protected $model;

    public function __construct(){
        parent::__construct();
        $user_id = Application::getUserSession();
        if ($user_id->checkSession() == 0) {
            $this->goUrl(SITE_HOST.'cms/index.php');
            exit();
        }
        $this->model = new ProductModel(MyDB::connect());
    }
    public function action_add(){
        $name = Application::getVariable("name", "");
        if (!empty($name)) {
            $res = $this->model->addSection($name);
            $this->view->name = '';
            $this->view->message = ($res)? "Section added successfully!": "Failed to add section.";
        } 
        else {
            $this->view->name = $name;
            $this->view->message = "Incorrect input data.";
        }
        $this->view->list = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_update(){
        $id = Application::getVariable("id", 0);
        $name = Application::getVariable("name", "");
        if ($id != 0 && !empty($name)) {
            $res = $this->model->updateSection($id, $name);
            $this->view->message = ($res)? "Section updated successfully!": "Failed to update section.";
            $this->view->list = $this->model->getSections();
            $views = array('list','add');
            $this->view->buildView($views);
        } 
        else {
            $info['id'] = $id;
            $info['name'] = $name;
            $this->view->message = "Incorrect input data.";
            $this->view->section = $info;
            $views = array('edit');
            $this->view->buildView($views);
        }
    }

    public function action_delete(){
        $id = Application::getVariable("id", 0);
        if ($id != 0) {
            $res = $this->model->deleteSection($id);
            $this->view->message = ($res)? "Section deleted successfully!": "Failed to delete section.";
        }
        else
            $this->view->message = "Incorrect id.";
        $this->view->list = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_edit(){
        $id = Application::getVariable("id", 0);
        $this->view->section = $this->model->getSection($id);
        $views = array('edit');
        $this->view->buildView($views);
    }

    public function action_default(){
        $this->view->list = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }
}

?>