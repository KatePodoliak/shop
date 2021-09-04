<?php

class Route
{
    public function __construct(){}

    public  function route(){

        $ctrl_name = Application::getVariable('controller','');
        $ctrl_action = Application::getVariable('action','');
        if(empty($ctrl_name))
            $ctrl_name = 'LoginController';
        if(file_exists('controllers/'.$ctrl_name.'.php'))
        {
            include_once 'controllers/'.$ctrl_name.'.php';
            $ctrl = new $ctrl_name();
            if(empty($ctrl_action))
                $ctrl_action = 'default';
            $action_name = 'action_'.$ctrl_action;
            if (method_exists($ctrl, $action_name))
                $ctrl->$action_name();
            else {
                Application::error404();
                return;
            }
        }
        else{
            Application::error404();
            return;
        }
    }
}

?>