<?php

require_once 'view.php';
require_once 'request.php';

class Route {

    /**
     *  Analyse the URL and perform the action given by a specific controller
     */
    public function routeQuery() : void {
        try {
            $request= new request(array_merge($_GET, $_POST));
            $controller = $this->getNewController($request);
            $action = $this->getNewAction($request);
            $controller->executeAction($action);
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    /**
     * Give the controller wanted by a request
     * @param request $request request that create the controller
     * @return Controller the wanted controller
     * @throws Exception if controller doesn't exist
     */
    private function getNewController(request $request) : Controller {
        $controllerValue= "home";
        if ($request->existParameter('Controller')) {
            $controllerValue = $request->getParameter('Controller');
            $controllerValue = strtolower($controllerValue);
        }
        $classController = $controllerValue . "Controller";
        $fileController= "application/controllers/" . $classController . ".php";

        if (file_exists($fileController)) {
            /** @var string $fileController */
            require($fileController);

            $controller = new $classController();
             if (isset($request) && $controller instanceof Controller) {
                $controller->setRequest($request);
             }
             return $controller;
        }
        else {
            throw new Exception("File '$fileController' nor found.");
        }
    }

    /**
     * Give the action wanted by a request
     * @param request $request
     * @return string the type of action to perform
     */
    private function getNewAction(request $request) : string {
        $action = "index";
        try {
            $action = $request->getParameter('action');
        }
        catch (Exception $e) {
            $action ="index";
        }
        finally {
            return $action;
        }
    }

    /**
     * Handle any error.
     * @param Exception $exception the error that must be handled
     */
    private function handleError(Exception $exception) : void {
        $view = new View('template');
        $view->generate(array('msgError'=> $exception->getMessage()));
    }

}