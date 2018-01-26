<?php

namespace TaskManager\controller;


class taskController
{

    public function save($taskName, $taskPriority) {

        $storageFactory = new StorageFactory();
        if (checkConnectivityDB()) {
            $task = new task($storageFactory->getStorage('mysql'), $taskName);
        } else {
            $task = new task($storageFactory->getStorage('file'), $taskName);
        }
        $task->setName($taskName);
        $task->setPriority($taskPriority);

        $vue = new UserView();
        if($user->save()){
            $vue->displayUser($user);
        } else {
            $vue->displayError($user->getErrors());
        }

    }
}