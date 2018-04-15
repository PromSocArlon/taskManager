<?php

namespace app\controllers;
use app\core\exceptions;

class ErrorController extends \app\core\Controller
{
    private $id;
    private $message;
    public function __construct()
    {
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'displayError' => ['public' => true, 'connect' => true]
        ];
        $this->setPermissions($perms);
    }
    public function index()
    {
        $this->generateView();
    }
    public function displayError(/*$code*/) : bool
    {
        try
        {
            throw new \app\core\exceptions\ActionNotDefinedException("Cedric",400,null);
            //$view->generate(null);
            return true;
        } catch (\app\core\exceptions\ActionNotDefinedException $ex)
        {
            $this->generateView(['Exception' => $ex]);//+"&code="+$ex->getCode());
            return false;
        }
    }
    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }
    public function __toString() : String
    {
        return $this->message;
    }
}