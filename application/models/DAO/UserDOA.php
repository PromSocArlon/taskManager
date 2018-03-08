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
class UserDOA extends DAO
{

    private $connection;
    private $member;

    /**
     * @return StorageFile|StorageMysql
     */
    public function getConnection()
    {
        return $this->connection;
    }
    public function __construct($type)
    {
        $this->connection = StorageFactory::getStorage($type);
    }

    /**
     * Get all the users.
     *
     * @return array
     */
    public function getAll()
    {
        $member = new member();

        return null;
    }

    /**
     * Get a specific User.
     *
     * @return User
     */
    public function get($mail)         //get member by mail if exist
    {

        $data = $this->connection->getMember($mail);
         return $data;

    }



    /**
     * Update the specific User.
     *
     * @return boolean
     */
    public function update()
    {
        return false;
    }

    /**
     * Delete the specific User.
     *
     * @return boolean
     */
    public function delete()
    {
        return false;
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