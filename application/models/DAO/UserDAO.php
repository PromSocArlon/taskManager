<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:03
 */
require_once __DIR__.('\..\Entity\Team.php');
require_once __DIR__.('\..\Entity\Member.php');
require_once __DIR__.('\DAO.php');
require_once __DIR__.('\..\..\core\Storage\StorageFactory.php');

class UserDAO extends DAO
{

    private $member;

    protected function objectToArray($arguments)
    {

    }

    /**
     * Create a new User.
     *
     * @return boolean
     */
    public function addMember($mail,$login,$password)
    {

           $this->member = new Member();
           $this->member->setLogin($login);
           $this->member->setMail($mail);
           $this->member->setPassword($password);
           $this->connection->add($this->member);

    }



}