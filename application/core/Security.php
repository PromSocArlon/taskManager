<?php
require_once (__DIR__.'\..\models\DAO\UserDAO.php');

/**
 * Created by PhpStorm.
 * User: Sami
 * Date: 07-03-18
 * Time: 15:51
 */
class Security
{
    public $m;

    public function __construct()
    {
        $this->m = new UserDOA('mysql');
    }

    public function getId($login, $password)
    {
       $data = $this->m->getConnection()->getMemberId($login,$password);
        return $data;
    }

}