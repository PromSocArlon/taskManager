<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 30-01-18
 * Time: 01:58
 */
require_once 'application/core/controller.php';
require_once 'application/models/DAO/TaskDAO.php';

class taskController extends Controller
{
    private $task;
    private $storage;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct(/*$storageType*/)
    {

        // TODO: nouvelle instance de l'objet StorageMYsql pour chaque task... pas super opti !
        //$this->storage = StorageFactory::getStorage($storageType);
    }

    public function create()
    {
       $this->generateView();
    }

    //on passe l'objet task a la view pour l'afficher
    public function read()
    {
        return $this->task;
    }

    public function delete()
    {
        $this->initializeModel();
        $taskDao = new TaskDAO('mysql');
        $taskDao->delete($this->task, $_POST['day']);
        $this->generateView();
    }

    public function save()
    {
        $this->initializeModel();
        $taskDao = new TaskDAO('mysql');
        $taskDao->create($this->task,$_POST['day']);
        $this->generateView();
    }

    public function index()
    {
        $this->generateView();
    }

    public function initializeModel()
    {
        $this->task = $this->model('task');
        $this->task->setName($_POST['taskName']);
        $this->task->setPriority($_POST['taskPriority']);
        $this->task->setDescription($_POST['taskDescription']);
        $this->task->addStatus(0,'0');
        $this->task->addSubTask(NULL);
    }

    public function deleteTest()
    {
        $this->generateView();
    }
}