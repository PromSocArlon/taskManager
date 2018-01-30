<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 30-01-18
 * Time: 01:58
 */
require_once 'controller.php';
class taskController extends Controller
{
    private $task;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct($storage){
        $this->task = $this->model('task');
        $this->task->setStorage($storage);
    }

    public function create($taskName, $taskPriority, $taskDescription, $taskStatus){
        $this->task->setName($taskName);
        $this->task->setPriority($taskPriority);
        $this->task->setDescription($taskDescription);
        $this->task->addStatus($taskStatus, $taskDescription); //ne fonctionne pas encore
    }
    //addSubTask est en dehors du create car il est optionnel
    public function addSubTask($subTask){
        $this->task->addSubTask($subTask);
    }
    //on passe l'objet task a la view pour l'afficher
    public function read(){
        return $this->task;
    }
    
    public function updateName($update){
        $this->task->setName($update);
    }
    public function updatePriority($update){
        $this->task->setPriority($update);
    }
    public function updateDescription($update){
        $this->task->setDescription($update);
    }
    public function updateStatus($update){
        $this->task->setStatus($update);
    }

    public function delete(){
        $this->task = 0;
    }

    public function save() {
        $storageFactory = $this->model('StorageFactory');
        $storage = $storageFactory->getStorage($this->task->getStorage());
        $storage->saveTask($this->task);
    }


}