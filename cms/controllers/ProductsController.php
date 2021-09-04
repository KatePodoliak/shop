<?php

class ProductsController extends PageController
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
        $brand = Application::getVariable("brand", "");
        $img = Application::getVariable("img", "");
        $price = Application::getVariable("price", "");
        $code = Application::getVariable("code", "");
        $idSection = Application::getVariable("select", "");
        if (!empty($name) && !empty($brand) && !empty($img) && !empty($price) && !empty($code)) {
            $res = $this->model->addProduct($name, $brand, $img, $price, $code, $idSection);
            $this->view->message = ($res)? "Product added successfully!": "Failed to add product.";
            $this->view->id = $this->model->getProductByCode($code);
            $this->view->name = '';
            $this->view->brand = '';
            $this->view->img = '';
            $this->view->price = '';
            $this->view->code = '';
            $this->view->idSection = '';
        } else {
            $this->view->message = "Incorrect input data.";
            $this->view->name = $name;
            $this->view->brand = $brand;
            $this->view->img = $img;
            $this->view->price = $price;
            $this->view->code = $code;
            $this->view->idSection = $idSection;
        }
        $this->view->list = $this->model->getAllProducts();
        $this->view->sections = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_delete(){
        $id = Application::getVariable("id", 0);
        if ($id != 0) {
            $res = $this->model->deleteProduct($id);
            $this->view->message = ($res)? "Product deleted successfully!": "Failed to delete product.";
        }
        else
            $this->view->message = "Incorrect id.";
        $this->view->list = $this->model->getAllProducts();
        $this->view->sections = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }

    public function action_update_product(){
        $id = Application::getVariable("id", 0);
        $name = Application::getVariable("name", "");
        $brand = Application::getVariable("brand", "");
        $img = Application::getVariable("img", "");
        $price = Application::getVariable("price", "");
        $code = Application::getVariable("code", "");
        $info = $this->model->getProduct($id);
        if ($id != 0 && !empty($name) && !empty($brand) && !empty($img) && !empty($price) && !empty($code)) {
            $res = $this->model->updateProduct($id, $name, $brand, $img, $price, $code);
            $this->view->message = ($res)? "Product updated successfully!": "Failed to update product.";
            $this->view->list = $this->model->getAllProducts();
            $this->view->sections = $this->model->getSections();
            $views = array('list', 'add');
            $this->view->buildView($views);
        } 
        else {
            $info['id'] = $this->model->getProductByCode($code);
            $info['name'] = $name;
            $info['brand'] = $brand;
            $info['img'] = $img;
            $info['price'] = $price;
            $info['code'] = $code;
            $this->view->id = $id;
            $this->view->info = $info;
            $this->view->info_params = $this->model->getProduct($id);
            $this->view->message = "Incorrect input data";
            $views = array('edit','editParams');
            $this->view->buildView($views);
        }
    }

    public function action_edit(){
        $id = Application::getVariable("id", 0);
        $this->view->info = $this->model->getProduct($id);
        $this->view->info_params = $this->model->getProduct($id);
        $this->view->id = $id;
        $views = array('edit','editParams');
        $this->view->buildView($views);
    }

    public function action_delete_param(){
        $id_p = Application::getVariable("id_p", 0);
        $id = Application::getVariable("id", 0);
        if ($id_p != 0) {
            $res = $this->model->deleteParam($id_p);
            $this->view->message = ($res)? "Product parameter deleted successfully!": "Failed to delete product parameter.";
        }
        else
            $this->view->message = "Incorrect id.";
        $this->view->id = $id;
        $this->view->info_params = $this->model->getProduct($id);
        $this->view->info = $this->model->getProduct($id);
        $views = array('edit','editParams');
        $this->view->buildView($views);
    }

    public  function action_add_extra_info(){
        $id = Application::getVariable("id", 0);
        $name_p = Application::getVariable("param_name", "");
        $value_p = Application::getVariable("param_value", "");
        if(!empty($name_p) && !empty($value_p)) {
            $res = $this->model->addParam($id, $name_p, $value_p);
            $this->view->message = ($res)? "Product parameter added successfully!": "Failed to add product parameter.";
            $this->view->name_p = '';
            $this->view->value_p = '';
        }
        else {
            $this->view->name_p = $name_p;
            $this->view->value_p = $value_p;
            $this->view->message = "Incorrect input data.";
        }
        $this->view->id = $id;
        $this->view->info = $this->model->getProduct($id);
        $this->view->info_params = $this->model->getProduct($id);
        $views = array('edit','editParams');
        $this->view->buildView($views);
    }

    public function action_default(){
        $this->view->list = $this->model->getAllProducts();
        $this->view->sections = $this->model->getSections();
        $views = array('list', 'add');
        $this->view->buildView($views);
    }
}

?>