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

    public function getErrorMessage()
    {
        $message = "Pas de message d'erreur";
        if(isset($_SESSION["errorMessage"]))
        {
            $message = $_SESSION["errorMessage"];
            unset($_SESSION["errorMessage"]);
        }
        return $message;
    }

    public function index()
    {
        $this->generateView();
    }

    public function error400()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 400,
            "errorDescription" => "Bad request!"];
        $this->generateView($params, "error.twig");
    }

    public function error401()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 401,
            "errorDescription" => "Unauthorized access!"];
        $this->generateView($params, "error.twig");
    }

    public function error403()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 403,
            "errorDescription" => "Forbidden access!"];
        $this->generateView($params, "error.twig");
    }

    public function error404()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 404,
            "errorDescription" => "Not found!"];
		$this->generateView($params, "error.twig");
    }

    public function error408()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 408,
            "errorDescription" => "Request time out try again!"];
        $this->generateView($params, "error.twig");
    }

    public function error500()
    {
        $message = $this->getErrorMessage();
        $params = ["errorMessage" => $message,
            "errorNumber" => 500,
            "errorDescription" => "Internal server error"];
        $this->generateView($params, "error.twig");
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

}