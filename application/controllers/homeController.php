<?php

class homeController extends Controller {
    
    public function index(){
        require_once(__DIR__."/../views/_shared/header.php");
        $this->generateView();
        require_once(__DIR__."/../views/_shared/footer.php");
    }

    public function login() {
        if ($this->request->existParameter('loginID') && $this->request->existParameter('loginPassword')) {
            if (true) { //TODO: Gestion de l'identifiant.
                session_start();

                try { //TODO: Changer l'initialisation par un appel DAO.
                    $member = new Member();
                    $member->setId(0001);
                    $member->setLogin($this->request->getParameter('loginID'));
                    $member->setMail("cornichon@windaube.usa");
                    $member->setPassword($this->request->getParameter('loginPassword'));

                    $_SESSION['user'] = $member;
                    header('Location: localhost/index.php?controller=user');
                }
                catch (Exception $exception) {
                    echo 'Parameter Problem';
                }
            }
            else {
                require_once(__DIR__."/../views/_shared/header.php");
                $this->generateView();
                require_once(__DIR__."/../views/_shared/footer.php");
            }
        }
        else {
            require_once(__DIR__."/../views/_shared/header.php");
            $this->generateView();
            require_once(__DIR__."/../views/_shared/footer.php");
        }
    }
}