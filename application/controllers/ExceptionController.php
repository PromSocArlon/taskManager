<?php
namespace app\controllers;

class ExceptionController extends \app\core\Controller
{

    public function __construct()
    {
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

    public function error400()
    {
        $this->generateView();
    }

    public function error401()
    {
        $this->generateView();
    }

    public function error403()
    {
        $this->generateView();
    }

    public function error404()
    {
        $this->generateView();
    }

    public function error408()
    {
        $this->generateView();
    }

    public function error500()
    {
        $this->generateView();
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

}