<?php

class route {

    public function routeQuery() {
        try {
            $request= new request(array_merge($_GET, $_POST));

            $controller=$this->getNewController($request);
            $action = $this->getNewAction($request);
    
            $controller->executeAction($action);
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    private function getNewController(request $request) {
        $controllerValue= "home";
        if ($request->existParameter('controller')){
            $controllerValue=$request->getParameter('controller');
            $controllerValue=ucfirst(strtolower($controllerValue));
        }
        $classController = $controllerValue . "Controller";
        $fileController= "application/controllers/" . $classController . ".php";

        if (file_exists($fileController)){
            require($fileController);

            $controller = new $classController();
             if (isset($request)) {
                $controller->setRequest($request);
             }
            return $controller;
        }else {
            throw new Exception("File '$fileController' nor found.");
        }
    }

    private function getNewAction(request $request) {
        $action ="index"; 
        if ($request->existParameter('action')){
            $action =$request->getParameter('action');
        }
        return $action;
    }

    private function handleError(Exception $exception){
        $view= new view('error');
        $view->generate(array('msgError'=> $exception->getMessage()));
    }

}