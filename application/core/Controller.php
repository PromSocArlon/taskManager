<?php

namespace app\core;

use Doctrine\ORM\EntityManager;
use app\core\exceptions\ActionNotDefinedException;
use app\core\exceptions\UnauthorizedException;

abstract class Controller
{

    /**
     * @var EntityManager
     */
    protected $entityManager;
    /**
     * @var \Twig_Environment
     */
    protected $templateEngine;
    protected $model;

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

    public function __construct()
    {
        $classController = get_class($this);
        $controllerName = str_replace("Controller", "", $classController);
        $temp = explode('\\', $controllerName);
        $dirName = end($temp);
        $this->templateEngine = ConfigLoader::getConfig(
            'twig',
            ['viewPath' => 'application' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR]
        );
        $this->entityManager = ConfigLoader::getConfig('doctrine');
    }

    /**
     * Set the the request attribute to the request parameter value
     * @param request $request request that called the controller
     */
    public function setRequest(request $request): void
    {
        if ($request) {
            $this->request = $request;
        }
    }

    /**
     * Execute the given action
     * @param string $action the action to perform
     * @throws \Exception if action not defined
     */
    public function executeAction(string $action): void
    {
        if (method_exists($this, $action)) {
            if ($this->isAllowed($action)) {
                $this->action = $action;
                $this->{$this->action}();
            } else {
                throw new UnauthorizedException("Access denied !");
            }
        } else {
            throw new ActionNotDefinedException("Action " . $action . " not defined !");
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
        $actionView .= '.php';
        $this->templateEngine->render($actionView, $data);
    }

    protected function redirect($controller, $action = null)
    {
        header("taskManager/" . $controller . "/" . $action);
    }

    /**
     * Set the permission for the controller
     * @param array $permissions the array of permission for the controller
     * @throws \Exception if $t_perm not set
     */
    protected function setPermissions(array $permissions): void
    {
        if ($permissions != null) {
            $this->permissions = $permissions;
        } else {
            throw new \RuntimeException("Permission setting problem !", 500);
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