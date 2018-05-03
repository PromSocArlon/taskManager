<?php

namespace app\controllers;

use app\core\MemberService;
use app\models\DAO\MemberDAO;
use app\models\Entity\Member;

class HomeController extends \app\core\Controller {

	public function __construct($entityManager)
	{
	    parent::__construct($entityManager);
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

    public function login()
    {
        if (isset($_POST['loginID']) && isset($_POST['loginPassword'])) {
            if (true) { //TODO: Gestion de l'identifiant.
                $member = new Member();
                $member->setId(0001);
                $member->setLogin($this->request->getParameter('loginID'));
                $member->setMail("Trump@windaube.usa");
                $member->setPassword($this->request->getParameter('loginPassword'));

                $_SESSION['user'] = serialize($member);
                header('Location: index.php?controller=member&action=index');
            } else {
                $this->generateView();
            }
        } else {
            $this->generateView();
        }
    }


    public function logConnect()
    {
        $login = $this->request->getParameter('loginID');
        $pwd = $this->request->getParameter('loginPassword');
        $dao = new MemberDAO();
        //TODO : ajouter user in db pour check
        $userId = MemberService::checkCredential($dao, $login, $pwd);
        if (true) {
            MemberService::setCurrentUser($userId);
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
        if (MemberService::isConnected()) {
            MemberService::disconnect();
            //session_destroy();
        }
        header('Location: index.php/controller=home');
    }
}