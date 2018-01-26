<?php

namespace TaskManager\controller;


class taskController
{
    public function save($taskName, $taskPriority) {

        $storageFactory = new StorageFactory();
        $task = new task($storageFactory->getStorage(), $taskName);
        $task->setName($taskName);
        $task->setPriority($taskPriority);

    }
}