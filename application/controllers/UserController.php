<?php
/**
 * Created by PhpStorm.
 * User: localadm
 * Date: 1/21/2018
 * Time: 10:56 AM
 */

require_once __DIR__ . '/../models/Entity/Member.php';
require_once __DIR__ . '/../core/UserService.php';
require_once __DIR__ . '/../models/DAO/TaskDAO.php';
require_once __DIR__ . '/../models/DAO/UserDOA.php';
require_once __DIR__ . '/../core/Security.php';
//require_once __DIR__ . '/HomeController.php';
//session_start();

class UserController extends app\core\Controller{

    public function index() {
        $this->generateView();
    }

    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            //session_destroy();
        }
        header('Location: index.php/controller=home');
    }
    public function initializeModel(){

    }

    public function save() {

        $password = $this->request->params['password'];
        $firstName = $this->request->params['firstName'];
        $lastName = $this->request->params['lastName'];

        $storageFactory = new StorageFactory();
        $user = new user($storageFactory->getStorage());
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPassword($password);
        /*
        $userService = new UserService();
        $userService->save($user);
        */
        $vue = new UserView();
        if($user->save()){
            $vue->displayUser($user);
        } else {
            $vue->displayError($user->getErrors());
        }


    }

    public function register(){
	    $this->generateView();
    }

    public function connexion()
    {


        $p = new Security();
        $data = $p->getId($_POST['login'],$_POST['password']);
        if ($data)
        {
            $x = new TaskDAO('mysql');
            $x = $x->getAll();
            self::$data = $x;
            $this->generateView();
        }
        else
            header('Location:?controller=home&action=index');
    }
}
