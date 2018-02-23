<?php

require_once 'request.php';
require_once 'view.php';

abstract class Controller {

    private $action;
    protected $request;

    public abstract function index();

    /**
     * Set the the request attribute to the request parameter value
     * @param request $request request that called the controller
     */
    public function setRequest(request $request) : void {
        if ($request) {
            $this->request = $request;
        }
    }

    /**
     * Execute the given action
     * @param string $action the action to perform
     * @throws Exception if action not defined
     */
    public function executeAction(string $action) : void {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classController = get_class($this);
            throw new Exception("Action '$action' not defined in the class $classController");
        }
    }

    /**
     * Generate the view with a given data set
     * @param array $data the data set to be added to the generation
     */
    protected function generateView(array $data = array()) : void {
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);
        $view = new View($this->action, $controller);
        $view->generate($data);
    }


    /**
     * Give an instance of the given class.
     * @param string $model the wanted model object
     * @return object the object of the wanted model.
     * @throws Exception if class not found
     */
    public function model(string $model): object {
        $modelFile = $model == 'StorageFactory' ? 'application/models/Storage/StorageFactory.php' : 'application/models/Entity/' . $model . '.php' ;
        if (file_exists($modelFile)) {
            require_once($modelFile);
            return new $model();
        } else {
            throw new Exception("File '".$modelFile."' not found.");
        }

    }

}