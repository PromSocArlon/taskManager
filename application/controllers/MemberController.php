<?php
namespace app\controllers;
use app\models\Entity\Member;

class MemberController extends \app\core\Controller
{
    private $member;

    public function initializeModel()
    {
        if ($this->request->existParameter('login')){
            $this->member->setLogin($this->request->getParameter('login'));
        }
        if ($this->request->existParameter('password')){
            $this->member->setPassword($this->request->getParameter('password'));
        }
        if ($this->request->existParameter('mail')){
            $this->member->setMail($this->request->getParameter('mail'));
        }
		if($this->request->existParameter('team')) {
			$this->member->setTeam(intval($this->request->getParameter('team')));
		}
    }

    public function __construct()
    {
        parent::__construct();

        $perms = [
            'index' => ['public' => true, 'connect' => true],
			'initializeModel' => ['public' => true, 'connect' => true],
			'save' => ['public' => true, 'connect' => true],
			'update' => ['public' => true, 'connect' => true],
			'read' => ['public' => true, 'connect' => true],
			'delete' => ['public' => true, 'connect' => true],
			'profil' => ['public' => true, 'connect' => true],
            'edit' => ['public' => true, 'connect' => true]
        ];
        $this->setPermissions($perms);
        $this->member = new member();
    }

    public function index()
    {
        $membersData = array();
        $members = $this->entityManager->getRepository(get_class($this->member))->findAll();
        if(count($members) != 0) {
            foreach ($members as $member) {
                $membersData[] = $member->toArray();
            }
        }
        $this->generateView(['members' => $membersData]);
    }

    public function getMemberData($memberId)
    {
        $this->member = $this->entityManager->getRepository(get_class($this->member))->find($memberId);
        $memberData = $this->member->toArray();
        return ['member' => $memberData];
    }

    public function read()
    {
        $memberId = $this->request->getParameter('id');
        $member = $this->getMemberData($memberId);
        $this->generateView($member);
    }

    public function profil()
    {
        $memberId = $this->request->getParameter('id');
        $member = $this->getMemberData($memberId);
        $this->generateView($member);
    }

    public function edit()
    {
        $memberId = $this->request->getParameter('id');
        $member = $this->getMemberData($memberId);
        $this->generateView($member);
    }

    public function update()
    {
        $memberId = $this->request->getParameter('id');
        $this->member = $this->entityManager->getRepository(get_class($this->member))->find($memberId);
        $this->member = $this->initializeModel();
        $this->entityManager->flush();
        $this->generateView();
    }

    public function save()
    {
        $this->initializeModel();
        $this->entityManager->persist($this->member);
        $this->entityManager->flush();
        $this->generateView();
    }

	public function delete()
    {
        $memberId = $this->request->getParameter('id');
        $this->member = $this->entityManager->getRepository(get_class($this->member))->find($memberId);
        $this->entityManager->remove($this->member);
        $this->entityManager->flush();
        $this->generateView();
    }
}