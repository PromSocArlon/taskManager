<?php
namespace app\core;

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
     * @throws \Exception if action not defined
     */
    public function executeAction(string $action) : void {
        if (method_exists($this, $action) ) {
            if($this->isAllowed($action)) {
                $this->action = $action;
                $this->{$this->action}();
            } else {
                throw new \HttpException("Access denied", 401);
            }
        } else {
            $classController = get_class($this);
            throw new \Exception("Action '$action' not defined in the class $classController");
        }
    }

    /**
     * Generate the view with a given data set
     * @param array $data the data set to be added to the generation
     * @param string $action
     */
    protected function generateView($data = array(), $action = null)
    {
        $actionView = $this->action;
        if ($action != null) {
            $actionView = $action;
        }
        $classController = get_class($this);
        $controller = str_replace("Controller", "", $classController);

        $view = new view($actionView, $controller);
        $view->generate($data);
    }

    protected function redirect($controller, $action = null)
    {
        header("taskManager/" . $controller . "/" . $action);
    }

    /**
     * Set the permission for the controller
     * @param array $t_perm the array of permission for the controller
     * @throws \Exception if $t_perm not set
     */
    protected function setPermissions(array $permissions) : void
	{
		if ($permissions!=null) {
            $this->permissions = $permissions;
        }
	    else {
		    throw new \Exception("Permission not set !");
        }
	}

	/**
	 * check the permission for the given $action
	 * @param string $action the name of the action
	 * @return bool the permission of the action
	 */
    public function isAllowed($action)
    {
        return \app\core\MemberService::isConnected() ?
            $this->permissions[$action]['connect'] :
            $this->permissions[$action]['public'];
    }

}