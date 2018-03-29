<?php

namespace app\core;

class Request {
    private $parameters;

    public function __construct(array $parameters) {
        $this->parameters = $parameters;
    }

    /**
     * @param $parameterName
     * @return string parameter's value
     * @throws \Exception if parameter doesn't exist
     */
    public function getParameter(string $parameterName) : string{
        if ($this->existParameter($parameterName)){
            return $this->parameters[$parameterName];
        } else {
            throw new \Exception("Missing parameter '$parameterName'.");
        }
    }

    /**
     * @param string $parameterName
     * @return bool true if this parameter exist and is not null, false otherwise.
     */
    public function existParameter(string $parameterName) : bool {
        return (isset($this->parameters[$parameterName]) && $this->parameters[$parameterName] != "");
    }
}