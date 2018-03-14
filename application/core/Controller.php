<?php

require_once 'Request.php';
require_once 'View.php';
require_once 'UserService.php';


abstract class Controller {

    private $action;
    /**
     * @var request $request
     */
    protected $request;
	/**
	 * @var [][] $permissions
	 */
	private $permissions;
	
    public abstract function index();
    public abstract function initializeModel();

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
        if (method_exists($this, $action) && $this->isAllowed($action)) {
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
    public function model(string $model){
        $modelFile = strpos($model, "DAO") !== false ? 'application/models/DAO/' . $model . '.php' : 'application/models/Entity/' . $model . '.php' ;
        if (file_exists($modelFile)) {
            require_once($modelFile);
            //TODO: ajout support pour DAO du type de storage (file ou mysql) pour le moment DAO est par défaut sur mysql
            return new $model();
        } else {
            throw new Exception("File '".$modelFile."' not found.");
        }

    }
	
	protected function setPermissions($t_perm) : void
	{
		$this->permissions = $t_perm;
	}
	
	/**
	 * check the permission for the given $action
	 * @param string $action the name of the action
	 * @return bool the permission of the action
	 */
	public function isAllowed($action)
	{
		echo 'hello' . $action;
//		if(UserService::isConnected())
//			return $this->permissions[$action]['connect'];
//		else
//			return $this->permissions[$action]['public'];

		return UserService::isConnected() ? $this->permissions[$action]['connect'] : $this->permissions[$action]['public'];
	}

}