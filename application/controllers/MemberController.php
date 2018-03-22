<?php
/**
 * Created by PhpStorm.
 * User: Sebastien Munoz
 * Date: 3/10/2018
 * Time: 7:45 AM
 */

class MemberController extends app\core\Controller
{
    private $member;
    private $storage;

    public function index()
    {
        $this->storage = $this->model('MemberDAO');
        $members = $this->storage->read();
        $this->generateView($members);
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