<?php
require_once(__DIR__."/../models/Entity/Member.php");

require_once (__DIR__.'\..\models\DAO\TaskDAO.php');
require_once (__DIR__.'\..\models\DAO\UserDOA.php');
require_once (__DIR__.'\..\core\Security.php');
class homeController extends Controller
{

class homeController extends Controller {
    
    public function index() {
        require_once(__DIR__."/../views/_shared/header.php");
        $this->generateView();
        require_once(__DIR__."/../views/_shared/footer.php");
    }

    public function login() {
        if (isset($_POST['loginID']) && isset($_POST['loginPassword'])) {
            if (true) { //TODO: Gestion de l'identifiant.
                try { //TODO: Changer l'initialisation par un appel DAO.
                    $member = new Member();
                    $member->setId(0001);
                    $member->setLogin($this->request->getParameter('loginID'));
                    $member->setMail("Trump@windaube.usa");
                    $member->setPassword($this->request->getParameter('loginPassword'));

                    $_SESSION['user'] = serialize($member);
                    header('Location: index.php?controller=user&action=index');
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

    public function register()
    {
        require_once(__DIR__ . "/../views/_shared/header.php");
        $this->generateView();
        require_once(__DIR__ . "/../views/_shared/footer.php");
    }

    public function check()
    {
        $p = new Security();                   /* objet pour verifier si le compte existe via le mail introduit  */
        $data = $p->m->get($_POST['mail']);
        if(!($data)) {
            $p->m->addMember($_POST['mail'], $_POST['login'], $_POST['password']);  /*un objet dao qui vient du constructeur securite */
            require_once(__DIR__ . "/../views/_shared/header.php");
            $this->generateView();
            require_once(__DIR__ . "/../views/_shared/footer.php");
        }else echo 'compte avec le mail  !!!!' .$_POST['mail']. ' !!!!! est existant Veuillez définir un autre email svp';

    }
}