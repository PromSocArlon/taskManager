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
                'index' => ['public' => true, 'connect' => true]
            ];
            $this->setPermissions($perms);
    }

    public function index()
    {
        $this->generateView();
    }

    public function displayError($code) : bool
    {
        try
        {
            $view = new View('index');
            $view = new View('index'+$code);
            $view->generate(null);
            return true;
        } catch (\Exception $ex)
            {
               echo $message=$ex->getMessage();
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