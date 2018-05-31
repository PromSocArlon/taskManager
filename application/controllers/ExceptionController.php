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

    public function error400()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
		$this->generateView(["error" => $message], "error400.php");
    }

    public function error401()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
		$this->generateView(["error" => $message], "error401.php");
    }

    public function error403()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
		$this->generateView(["error" => $message], "error403.php");
    }

    public function error404()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
		$this->generateView(["error" => $message], "error404.php");
    }

    public function error408()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
        $this->generateView(["error" => $message], "error408.php");
    }

    public function error500()
    {
		isset($_SESSION["errorMessage"]) ? ($message = $_SESSION["errorMessage"]) : "Pas erreur message";
		unset($_SESSION["errorMessage"]);
        $this->generateView(["error" => $message], "error500.php");
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

}