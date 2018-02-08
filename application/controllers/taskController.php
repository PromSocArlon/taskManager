<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 30-01-18
 * Time: 01:58
 */
require_once 'application/core/services/controller.php';

class taskController extends Controller
{
    private $task;
    private $storage;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct(/*$storageType*/)
    {
        $this->task = $this->model('task');

        // TODO: nouvelle instance de l'objet StorageMYsql pour chaque task... pas super opti !
        //$this->storage = StorageFactory::getStorage($storageType);
    }

    public function create($taskName, $taskPriority, $taskDescription, $taskStatus)
    {
        $this->task->setName($taskName);
        $this->task->setPriority($taskPriority);
        $this->task->setDescription($taskDescription);
        $this->task->addStatus($taskStatus, $taskDescription); //ne fonctionne pas encore
    }

    //addSubTask est en dehors du create car il est optionnel
    public function addSubTask($subTask)
    {
        $this->task->addSubTask($subTask);
    }

    //on passe l'objet task a la view pour l'afficher
    public function read()
    {
        return $this->task;
    }

    public function updateName($update)
    {
        $this->task->setName($update);
    }

    public function updatePriority($update)
    {
        $this->task->setPriority($update);
    }

    public function updateDescription($update)
    {
        $this->task->setDescription($update);
    }

    public function updateStatus($update)
    {
        $this->task->setStatus($update);
    }

    // Storage
    public function delete($day)
    {
        $this->storage->deleteTask($day, $this->task);
    }

    public function save()
    {
        $this->storage->saveTask($this->task);
    }

    public function index(){
        require_once 'application/views/_shared/header.php';
        $this->generateView();
        require_once 'application/views/_shared/footer.php';
    }
}