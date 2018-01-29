<?php

namespace TaskManager\controller;


class taskController
{
    private $model;

    //$model needs to be a Task class type
    public function __construct($model){
        $this->model = $model;
    }

    public function create($taskName, $taskPriority, $taskDescription, $taskStatus){

        $this->model->setName($taskName);
        $this->model->setPriority($taskPriority);
        $this->model->setDescription($taskDescription);
        $this->model->addStatus($taskStatus, $taskDescription);
    }

    public function update(){
        // TODO: A completer
    }

    public function delete(){

        $this->model = 0;
    }

    public function save() {

        $storageFactory = new StorageFactory();
        $task = new task($storageFactory->getStorage($this->model->getStorage()));
        $task->setName($this->model->getName());
        $task->setPriority($this->model->getPriority());
        $task->setDescription($this->model->getDescription());
        $task->addStatus($this->model->getStatus());
    }


}