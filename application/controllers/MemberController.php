<?php
namespace app\controllers;
use app\models\Entity\Member;
use app\models\DAO\MemberDAO;
class MemberController extends \app\core\Controller
{
    private $member;

    public function initializeModel()
    {
        $this->member->setLogin($this->request->getParameter('login'));
        $this->member->setPassword($this->request->getParameter('password'));
        $this->member->setMail($this->request->getParameter('mail'));
    }

    public function __construct($entityManager)
    {
        parent::__construct($entityManager);

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
    }

    public function index()
    {
        $members = $this->entityManager->getRepository('app\models\Entity\Member')->findAll();
        foreach ($members as $member)
        {
            $membersData[] = $member->toArray();
        }
        $this->generateView(['members' => $membersData]);
    }

    public function getMemberData($memberId)
    {
        $this->member = $this->entityManager->getRepository('app\models\Entity\Member')->find($memberId);
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
        $this->member = $this->entityManager->getRepository('app\models\Entity\Member')->find($memberId);
        $this->member = $this->initializeModel();
        $this->entityManager->flush();
        $this->generateView();
    }

    public function save()
    {
        $this->member = new member();
        $this->initializeModel();
        $this->entityManager->persist($this->member);
        $this->entityManager->flush();
        $this->generateView();
    }

	public function delete()
    {
        $memberId = $this->request->getParameter('id');
        $this->member = $this->entityManager->getRepository('app\models\Entity\Member')->find($memberId);
        $this->entityManager->remove($this->member);
        $this->entityManager->flush();
        $this->generateView();
    }
}