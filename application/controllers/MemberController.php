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
        $this->storage = new MemberDAO();
    }
    public function index()
    {
        $members = $this->storage->read();
        $this->generateView($members);
    }
    public function read()
    {
        $this->member = new member;
        $this->member->setID($this->request->getParameter('id'));
        $this->member = $this->storage->read($this->member);
		$this->generateView($this->member);
    }
    public function edit()
    {
	    $this->member = $this->model('member');
        $this->member->setID($this->request->getParameter('id'));
        $this->member = $this->storage->read($this->member);
		$this->generateView($this->member);
    }
    public function initializeModel()
    {
        $this->member = new Member();
        $this->member->setName($this->request->getParameter('name'));
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
        $this->initializeModel();
        $this->storage->update($this->member, $this->request->getParameter('id'));
        $this->generateView();
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
