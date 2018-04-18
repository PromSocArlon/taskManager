<?php

namespace app\controllers;

class ErrorController extends Controller
{
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
        $this->generateView(['Code'=>500]);
    }
    public function displayError(int $code)
    {
        $this->generateView(['Code' => $code]);
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