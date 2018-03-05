<?php
/**
 * Created by PhpStorm.
 * User: localadm
 * Date: 1/21/2018
 * Time: 10:56 AM
 */

require_once __DIR__.'/../models/Entity/Member.php';

class userController extends Controller{

    /**
     * Show information for one user
     */
    public function showAction(){

    }

    public function index() {
    	require_once(__DIR__."/../views/_shared/header.php");
	session_start();
        if(isset($_SESSION['user'])) {
        	$test = $_SESSION['user'];
        	if ($test instanceof Member) {
			echo $test->getLogin().': '.$test->getPassword();
	        }
        }
        //$this->generateView();
        require_once(__DIR__."/../views/_shared/footer.php");
    }

    public function save() {
    }

    public function register(){
	    require_once(__DIR__."/../views/_shared/header.php");
	    session_start();
	    $this->generateView();
	    require_once(__DIR__."/../views/_shared/footer.php");
    }
    /**
    public function listAction(){

    }

    public function addAction(){

    }

    public function editAction(){

    }
 */
}