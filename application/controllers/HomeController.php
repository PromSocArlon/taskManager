<?php

namespace app\controllers;

use app\models\Entity\Member;
use app\core\UserService;

class HomeController extends \app\core\Controller {

	public function __construct()
	{
	    parent::__construct();
		$perms = [
			'index' => ['public' => true, 'connect' => true],
			'login' => ['public' => true, 'connect' => false],
			'logConnect' => ['public' => true, 'connect' => false],
			'logout' => ['public' => false, 'connect' => true],
			'register' => ['public' => true, 'connect' => false]
		];
		$this->setPermissions($perms);
	}

    public function index() {
        $this->generateView();
    }

	//Formulaire de login
    public function login()
    {
        $this->generateView();
    }

	//traitement du formulaire de login
    public function logConnect()
    {
        $login = $this->request->getParameter('loginID');
        $pwd = $this->request->getParameter('loginPassword');

        $user = $this->entityManager->getRepository('app\models\Entity\Member')->findOneBy(array('login' => $login, 'password' => $pwd));

        if ($user != null) {
            UserService::setCurrentUser($user->getID());
            $this->generateView();
        } else {
            echo 'Mauvaise combinaison login/password' . PHP_EOL;
            header('Location: index.php?controller=home&action=login');
        }
    }


    public function register()
    {
        $this->generateView();
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

    public function logout()
    {
        if (UserService::isConnected()) {
            UserService::disconnect();
        }
        header('Location: index.php/controller=home');
    }
}