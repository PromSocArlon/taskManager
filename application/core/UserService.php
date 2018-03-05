<?php

//require_once 'view.php';
//require_once 'controller.php';
//require_once 'request.php';
require_once 'functions.php';


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
            out($cuName);
        } else {
            $cuName = null;
            out("pas de user setté pour le moment");
        }

        if (isset($_SESSION['password'])) {
            $cuPsw = $_SESSION['password'];
            out($cuPsw);
        } else {
            $cuPsw = null;
            out("pas de psw setté pour le moment");
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

