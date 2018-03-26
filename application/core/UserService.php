<?php
namespace app\core;

use app\models\DAO\MemberDAO;
use app\models\Entity\Member;

require_once 'functions.php';

class UserService
{
    /**
     * Give a copy of the User from the Session params
     * @param  : none
     * @return Member copie de session['user'] / null si aucune
     * @throws \Exception if session['user'] doesn't exist
     */
    public static function getCurrentUser()
    {
		return isset($_SESSION['user']) ? ($temp = $_SESSION['user']) : null;
    }
	
	public static function isConnected()
	{
		return isset($_SESSION['user']);
	}
	
	public static function checkCredential(MemberDAO $dao, $login, $password)
    {
		$searchMember = new Member();
		$searchMember->setLogin($login);
		$searchMember->setPassword($password);
		$data = $dao->read($searchMember);
		return $data != false ? $data->getId() : false;
    }
	
	public static function setCurrentUser($id)
	{
		$_SESSION['user'] = $id;
	}
	
	public static function disconnect()
	{
		unset($_SESSION['user']);
	}
}
