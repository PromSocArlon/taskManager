<?php
namespace app\controllers;

use app\models\DAO\MemberDAO;
use app\models\Entity\Member;

class MemberController extends \app\core\Controller
{
    private $member;
    private $storage;

    public function __construct()
    {
        $perms = [
            'index' => ['public' => true, 'connect' => true],
			'initializeModel' => ['public' => true, 'connect' => true],
			'save' => ['public' => true, 'connect' => true],
			'update1' => ['public' => true, 'connect' => true],
			'update' => ['public' => true, 'connect' => true],
			'read' => ['public' => true, 'connect' => true],
			'delete' => ['public' => true, 'connect' => true],
			'profil' => ['public' => true, 'connect' => true]
        ];
        $this->setPermissions($perms);
    }

    public function index()
    {
		//appel de model necessite que controller.php connaisse tous les dao et entity possibles
		//temporairement desactive a discuter mais ca creait des erreurs
        //$this->storage = $this->model('MemberDAO');
		$this->storage = new MemberDAO();
		//actuellement renvoie false cree donc une erreur dans generateView
        //$members = $this->storage->read();
        //$this->generateView($members);
		$this->generateView();
    }


    public  function initializeModel()
    {

        $this->member = $this->model('member');
        $this->member->setMail($_POST['mail']);
        $this->member->setTeam($_POST['team']);
        $this->member->setLogin($_POST['login']);
        $this->member->setPassword($_POST['password']);
    }

    public function save()
    {
        $this->initializeModel();
        $this->storage = $this->model('MemberDAO');
        $this->storage->create($this->member);
        $this->generateView();
    }

    public function update1(){
        $this->generateView();

    }

    public function update()
    {
        $this->member = $this->model('member');
        $this->storage = $this->model('MemberDAO');
        $this->member->setId($_GET['id']);
        $this->member->setMail("test@test.test");
        $this->member->setTeam("1");
        $this->member->setLogin("test");
        $this->member->setPassword("test");
        $this->storage->getMember($this->member);
        $this->generateView();
    }
	
	public function read()
    {
        return $this->member;
    }

	public function delete()
    {
        $this->initializeModel();
        $this->storage = $this->model('MemberDAO');
        $this->storage->delete($this->member);
    }

    public function profil(){
        $this->storage = $this->model('MemberDAO');
        $myMember = $this->storage->getMember($_GET['id']);
        $this->generateView($myMember);
    }
}