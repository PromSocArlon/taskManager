<?php

require_once 'request.php';
require_once 'view.php';

abstract class controller {

    private $action;
    protected $request;

    public function setRequest(request $request)
    {
        $this->request = $request;
    }

    public function executeAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classControleur = get_class($this);
            throw new Exception("Action '$action' not defined in the class $classControleur");
        }
    }
    
    public abstract function index();
    
    protected function generateView($data = array())
    {

        $classControleur = get_class($this);
        $controller = str_replace("Controller", "", $classControleur);
        
        $view= new view($this->action, $controller);
        $view->generate($data);
    }

    public function model($model)
    {
        if ($model == 'StorageFactory') require_once 'application/models/Storage/' . $model . '.php';
        else require_once 'application/models/Entity/' . $model . '.php';
        return new $model();
    }

}