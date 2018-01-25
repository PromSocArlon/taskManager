<?php
/**
 * Created by PhpStorm.
 * User: localadm
 * Date: 1/21/2018
 * Time: 11:05 AM
 */

namespace TaskManager\services;

class Dispatcher{
    private $parameters;

    public function _construct(){
        $this->parameters = $_GET;
    }

    public function dispatch(){
        $controller = $this->parameters['controller'];
        $action = $this->parameters['action'];

        $viewPath = sprintf('../views/$s/$s.html', $controller, $action);

        if(!file_exists($viewPath)){
            throw new \Exception("view $viewPath not found");
        }

        echo file_get_contents($viewPath);
    }
}