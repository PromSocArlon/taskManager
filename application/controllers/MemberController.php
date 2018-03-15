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
        // TODO: Implement index() method.
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
    }

    public function update()
    {
        // TODO: Implement index() method.
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
}