<?php

require_once 'View.php';
require_once 'Controller.php';
require_once 'Request.php';


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
            /*if (isset($_GET)) {
                unset($_GET);
            }
            if (isset($_POST)) {
                unset($_POST);
            }*/

            $controller = $this->getNewController();
            $action = $this->getNewAction();
            $controller->executeAction($action);
        } catch (Exception $ex) {
            $this->handleError($ex);
        }
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
        $classController = $controllerValue . "Controller";

        $fileController = "application/controllers/" . $classController . ".php";

        if (file_exists($fileController)) {
            /** @var string $fileController */
            require($fileController);

            $controller = new $classController();
            if (isset($this->request) && $controller instanceof Controller) {
                $controller->setRequest($this->request);
            }
            return $controller;
        } else {
            throw new Exception("File '$fileController' not found.");
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
        } catch (Exception $e) {
            $action = "index";
        } finally {
            return $action;
        }
    }

    /**
     * Handle any error.
     * @param Exception $exception the error that must be handled
     */
    private function handleError(Exception $exception): void
    {
        $view = new View('template');
        $view->generate(array('msgError' => $exception->getMessage()));
    }

}