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
       // $this->member->setid($idFromEdite);
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

    public function update()
    {
        $data[0]="test";
       //recuperation de la ligne editer sous forme de tableau et la transmettre à la vue
        $this->generateView($data);
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