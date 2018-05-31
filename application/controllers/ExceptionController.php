<?php
namespace app\controllers;

class ExceptionController extends \app\core\Controller
{

    public function __construct()
    {
        parent::__construct();
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'initializeModel' => ['public' => true, 'connect' => true],
            'error400' => ['public' => true, 'connect' => true],
            'error401' => ['public' => true, 'connect' => true],
            'error403' => ['public' => true, 'connect' => true],
            'error404' => ['public' => true, 'connect' => true],
            'error408' => ['public' => true, 'connect' => true],
            'error500' => ['public' => true, 'connect' => true]
        ];
        $this->setPermissions($perms);
    }

    public function index()
    {
        $this->generateView();
    }

    public function error400($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message], "error400");
        else
        $this->generateView();
    }

    public function error401($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message]);
        else
            $this->generateView();
    }

    public function error403($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message]);
        else
            $this->generateView();
    }

    public function error404($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message]);
        else
            $this->generateView();
    }

    public function error408($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message]);
        else
            $this->generateView();
    }

    public function error500($message = null)
    {
        if($message != null)
            $this->generateView(["error" => $message], "error500");
        else
            $this->generateView();
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

}