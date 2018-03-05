<?php

//require_once 'view.php';
//require_once 'controller.php';
//require_once 'request.php';

class UserService
{
    /**
     * Give a copy of the User from the Session params
     * @param  : none
     * @return copie de session['user'] / null si aucune
     * @throws Exception if session['user'] doesn't exist
     */
    public static function getCurrentUser() : void
    {
        if (isset($_SESSION['name'])) {
            $cuName = $_SESSION['name'];
            echo $cuName;
        } else {
            $cuName = null;
            echo "pas de user setté pour le moment" . PHP_EOL;
        }

        if (isset($_SESSION['password'])) {
            $cuPsw = $_SESSION['password'];
            echo $cuPsw;
        } else {
            $cuPsw = null;
            echo "pas de psw setté pour le moment" . PHP_EOL;
        }
    }
}

try
{
    /*session_start();
    $_SESSION['name'] = "Cedric";
    $_SESSION['password'] = "blabla";
    */

    UserService::getCurrentUser();

} catch (Exception $ex) {
    $this->handleError($ex); }

