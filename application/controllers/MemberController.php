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
			'profil' => ['public' => false, 'connect' => true]
        ];
        $this->setPermissions($perms);
    }

    public function index()
    {
		//appel de model necessite que controller.php connaisse tous les dao et entity possibles
		//temporairement desactive a discuter mais ca creait des erreurs

        $this->storage = new app\models\Entity\Member();
        //$this->storage = $this->model('MemberDAO');
		$this->storage = new MemberDAO();
		//actuellement renvoie false cree donc une erreur dans generateView
        $members = $this->storage->read();
        $this->generateView($members);
    }
    public function read()
    {
        try
        {
            $this->member = $this->model('member');
            $this->member->setID($this->request->getParameter('id'));
            $this->storage = new MemberDAO();
            $this->member = $this->storage->read($this->member);
        }
        catch(\Exception $ex)
        {
            $this->member = [];
            $this->member['Exception'] = $ex;
        }
        $this->generateView($this->member);
    }
    public function edit()
    {
        try
        {
            $this->member = $this->model('member');
            $this->member->setID($this->request->getParameter('id'));
            $this->storage = new MemberDAO();
            $this->member = $this->storage->read($this->member);
        }
        catch(\Exception $ex)
        {
            $this->member = [];
            $this->member['Exception'] = $ex;
        }
        $this->generateView($this->member);
    }

        public function initializeModel()
    {
        try
        {

            $this->member = $this->model('member');
            $this->member->setID($this->request->getParameter('id'));
            $this->member->setLogin($this->request->getParameter('login'));
            $this->member->setPassword($this->request->getParameter('password'));
            $this->member->setMail($this->request->getParameter('mail'));

        }
        catch(\Exception $ex)
        {
            throw $ex;
        }
    }

    public function save()
    {
        $this->initializeModel();
        $this->storage = new MemberDAO();
        $this->storage->create($this->member);
        $this->generateView();
    }

    public function update()
    {
        try
        {
            $this->initializeModel();
            //$this->member->setID($this->request->getParameter('id'));
            $this->storage = new MemberDAO();
            $this->storage->update($this->member);
            $this->generateView();
        }
        catch(\Exception $ex)
        {
            $this->generateView(['Exception' => $ex]);
        }
    }



	public function delete()
    {
        $this->initializeModel();
        $this->storage = $this->model('MemberDAO');
        $this->storage->delete($this->member);
    }

    public function profil()
    {
        $this->storage = new MemberDAO();
        $myMember = $this->storage->getMember(\app\core\MemberService::getCurrentUser());
        $this->generateView(["member" => $myMember]);
    }
}