<?php

namespace app\core;


use app\core\exceptions\ControllerNotDefinedException;
use Exception;

class Route
{
    private $request;

    /**
     *  Analyse the URL and perform the action given by a specific controller
     * @throws Exception if request can't be read properly
     */
    public function routeQuery(): void
    {
        $this->request = new request(array_merge($_GET, $_POST));
        unset($_GET);
        unset($_POST);

        $controller = $this->getNewController();
        $action = $this->getNewAction();
        $controller->executeAction($action);

    }

    /**
     * Give the controller wanted by a request
     * @param request $request request that create the controller
     * @return Controller the wanted controller
     * @throws Exception if controller doesn't exist
     */
    private function getNewController(): Controller
    {
        $controllerValue = "home";
        if ($this->request->existParameter("controller")) {
            $controllerValue = strtolower($this->request->getParameter("controller"));
        }
        $classController = '\\app\\controllers\\' . $controllerValue . "Controller";

        try {
            $controller = new $classController();
            if (isset($this->request) && $controller instanceof Controller) {
                $controller->setRequest($this->request);
            }
            return $controller;
        }
        catch (\Throwable $ex) {
            throw new ControllerNotDefinedException();
        }

    }

    /**
     * Give the action wanted by a request
     * @param request $request
     * @return string the type of action to perform
     */
    private function getNewAction(): string
    {
        $action = "index";
        try {
            $action = $this->request->getParameter("action");
        } catch (\Throwable $e) {
            $action = "index";
        } finally {
            return $action;
        }
    }
}