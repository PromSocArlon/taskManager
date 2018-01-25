<?php
/**
 * Created by PhpStorm.
 * User: localadm
 * Date: 1/21/2018
 * Time: 10:56 AM
 */

namespace TaskManager\controller;

class UserController{

    /**
     * Show information for one user
     */
    public function showAction(){

    }

    public function save($firstName, $lastName, $password) {

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
/**
    public function listAction(){

    }

    public function addAction(){

    }

    public function editAction(){

    }
 */
}