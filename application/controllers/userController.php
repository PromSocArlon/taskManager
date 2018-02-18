<?php
/**
 * Created by PhpStorm.
 * User: localadm
 * Date: 1/21/2018
 * Time: 10:56 AM
 */

//namespace TaskManager\controller;

class userController extends controller{

    /**
     * Show information for one user
     */
    public function showAction(){

    }

    public function index(){
        require_once 'application/views/_shared/header.php';
        $this->generateView();
        require_once 'application/views/_shared/footer.php';
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
        require_once 'application/views/_shared/header.php';
        $this->generateView();
        require_once 'application/views/_shared/footer.php';
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