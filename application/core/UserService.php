<?php
namespace app\core;

use app\models\Entity\Member;

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
	
	public static function setCurrentUser($id)
	{
		$_SESSION['user'] = $id;
	}
	
	public static function disconnect()
	{
		unset($_SESSION['user']);
	}
}
