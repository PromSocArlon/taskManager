<?php
namespace app\core;

use app\models\DAO\MemberDAO;
use app\models\Entity\Member;

require_once 'functions.php';

class MemberService
{
    /**
     * Give a copy of the UserId from the Session params
     * @param  : none
     * @return String copie de session['id'] / null si aucune
     * @throws \Exception if session['id'] doesn't exist
     */
    public static function getCurrentUser()
    {
		return isset($_SESSION['id']) ? ($temp = $_SESSION['id']) : null;
    }
	
	public static function isConnected()
	{
		return isset($_SESSION['id']);
	}
	
	public static function checkCredential(MemberDAO $dao, $login, $password)
    {
		$searchMember = new Member();
		$searchMember->setLogin($login);
		$searchMember->setPassword($password);
		$data = $dao->read($searchMember);
		return $data != false ? $data['id'] : false;
    }
	
	public static function setCurrentUser($id)
	{
		$_SESSION['id'] = $id;
	}
	
	public static function disconnect()
	{
		unset($_SESSION['id']);
	}
	
	public static function getById(MemberDao $dao, $memberId)
	{
		$searchMember = new Member();
		$searchMember->setId($memberId);
		$data = $dao->read($searchMember);
		return $data != false ? $data : null;
	}
}
