<?php

class request {

    private $parameters;

    public function __construct($parameters) {
        $this->parameters= $parameters;
    }

    public function getParameter($parameterName){
        if ($this->existParameter($parameterName)){
            return $this->parameters[$parameterName];
        }else{
            throw new Exception("Missing parameter '$parameterName'.");
        }
    }

    public function existParameter($parameterName){
        return (isset($this->parameters[$parameterName]) && $this->parameters[$parameterName] != "");
    }
}