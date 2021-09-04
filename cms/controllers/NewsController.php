<?php

class NewsController extends PageController
{
    protected $model;

    public function __construct(){
        parent::__construct();
        $user_id = Application::getUserSession();
        if ($user_id->checkSession() == 0) {
            $this->goUrl(SITE_HOST.'cms/index.php');
            exit();
        }
        $this->model = new NewsModel(MyDB::connect());
    }

    public function action_add(){
        $name = Application::getVariable("name", "");
        $url = Application::getVariable("url", "");
        $content = Application::getVariable("content", "");
        if(!empty($name) && !empty($content)) {
            $res = $this->model->addArticle($name, $content, $url);
            $this->view->name = '';
            $this->view->url = '';
            $this->view->content = '';
            $this->view->message = ($res)? "News added successfully!": "Failed to add news.";
        } 
        else {
            $this->view->name = $name;
            $this->view->url = $url;
            $this->view->content = $content;
            $this->view->message = "Incorrect input data.";
        }
        $this->view->list = $this->model->getArticles();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_update(){
        $id = Application::getVariable("id", 0);
        $name = Application::getVariable("name", "");
        $url = Application::getVariable("url", "");
        $content = Application::getVariable("content", "");
        if ($id != 0 && !empty($name) && !empty($content) && !empty($url)) {
            $res = $this->model->updateArticle($id, $name, $content, $url);
            $this->view->message = ($res)? "News updated successfully!": "Failed to update news.";
            $this->view->list = $this->model->getArticles();
            $views = array('list','add');
            $this->view->buildView($views);
        } else {
            $info['id'] = $id;
            $info['name'] = $name;
            $info['url'] = $url;
            $info['content'] = $content;
            $this->view->message = "Incorrect input data.";
            $this->view->article = $info;
            $views = array('edit');
            $this->view->buildView($views);
        }
    }

    public function action_delete(){
        $id = Application::getVariable("id", 0);
        if ($id != 0) {
            $res = $this->model->deleteArticle($id);
            $this->view->message = ($res)? "News deleted successfully!": "Failed to delete news.";
        }
        else
            $this->view->message = "Incorrect id.";
        $this->view->list = $this->model->getArticles();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_edit(){
        $id = Application::getVariable("id", 0);
        $this->view->article = $this->model->getArticle($id);
        $views = array('edit');
        $this->view->buildView($views);
    }

    public function action_default(){
        $this->view->list = $this->model->getArticles();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }
}

?>