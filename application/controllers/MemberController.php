<?php
namespace app\controllers;

use app\models\DAO\MemberDAO;

class MemberController extends \app\core\Controller
{
    private $member = array();
    private $storage;

    public function __construct($entityManager)
    {
        parent::__construct($entityManager);

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
public function object_to_array()
{
    if (is_array($this) || is_object($this))
    {
        $result = array();
        foreach ($this as $key => $value)
        {
            $resultat[$key] = $this -> $key;
        }
        return $result;
    }
    return $this;
}
    public function index()
    {
       $this->member[] = $this->entityManager->getRepository('app\models\Entity\Member')->findAll(); //problème resolu avec le passe du namespace

        $this->generateView($this->member); //doit renvoyer un tableau à generate view à voir comment resoudre ça

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