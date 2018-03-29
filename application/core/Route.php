<?php

namespace app\core;


class Route
{
    private $request;

    /**
     *  Analyse the URL and perform the action given by a specific controller
     */
    public function routeQuery(): void
    {
        try {
            $this->request = new request(array_merge($_GET, $_POST));
            unset($_GET);
            unset($_POST);

            $controller = $this->getNewController();
            $action = $this->getNewAction();
            $controller->executeAction($action);
        } catch (\Exception $ex) {
           // handleError($ex);
            echo 'prob';
        }
    }

    /**
     * Give the controller wanted by a request
     * @param request $request request that create the controller
     * @return Controller the wanted controller
     * @throws \Exception if controller doesn't exist
     */
    private function getNewController(): Controller
    {
        $controllerValue = "home";
        if ($this->request->existParameter("controller")) {
            $controllerValue = strtolower($this->request->getParameter("controller"));
        }
        $classController = '\\app\\controllers\\' . $controllerValue . "Controller";

        $controller = new $classController();
        if (isset($this->request) && $controller instanceof Controller) {
            $controller->setRequest($this->request);
        }
        return $controller;
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
        } catch (\Exception $e) {
            $action = "index";
        } finally {
            return $action;
        }
    }
}