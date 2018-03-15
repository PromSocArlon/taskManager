<?php
require_once __DIR__.'/../models/Entity/Member.php';
require_once __DIR__.'\..\models\DAO\TaskDAO.php';
require_once __DIR__.'\..\models\DAO\UserDOA.php';
require_once __DIR__.'\..\core\Security.php';


class HomeController extends Controller {
    
	public function __construct()
	{
		$perms = [
			'index' => ['public' => true, 'connect' => true],
			'login' => ['public' => true, 'connect' => false],
			'logout' => ['public' => false, 'connect' => true]
		];
		$this->setPermissions($perms);
	}
	
    public function index() {
        $this->generateView();
    }

    public function login()
	{
            $this->generateView();
    }
	
	public function logConnect()
	{
		try
		{
			$login = $this->request->getParameter('loginID');
			$pwd = $this->request->getParameter('loginPassword');
			//TODO : verifier que c'est correct quand les toute les fonction object_to_array sont faites
			//$dao = new MemberDAO();
			//$id = UserService::getId($dao, $login, $pwd);
			$id = true;
			if($id != false)
			{
				
				$_SESSION['user'] = $login;
				$this->generateView();
			}
			else
			{
				echo 'Mauvaise combinaison login/password' . PHP_EOL;
				header('Location: index.php?controller=home&action=login');
			}
		}
		catch (Exception $e)
		{
			echo 'error';
			$e->getMessage();
		}
	}

    public function register()
    {
        $this->generateView();
    }

    public function check()
    {
        $p = new Security();                /* objet pour verifier si le compte existe via le mail introduit  */
        $data = $p->m->read() ($_POST['mail']);
        if(!($data)) {
            $p->m->addMember($_POST['mail'], $_POST['login'], $_POST['password']);  /*un objet dao qui vient du constructeur securite */
            $this->generateView();
        }else echo 'compte avec le mail  !!!!' .$_POST['mail']. ' !!!!! est existant Veuillez définir un autre email svp';

    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            //session_destroy();
        }
        header('Location: index.php/controller=home');
    }
}