<?php

namespace app\controllers;

use app\core\exceptions;

class ErrorController extends \app\core\Controller
{
    private $id;
	private $message;

    public function __construct()
    {

    }

    public function index()
    {
        $this->generateView();
    }

    public function displayError($code) : bool
    {
        try
        {
            $view = new View('error');
            $view = new View('error'+$code);
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