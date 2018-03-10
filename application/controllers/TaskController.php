<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 30-01-18
 * Time: 01:58
 */
require_once 'application/core/Controller.php';

class TaskController extends Controller
{
    private $task;
    private $storage;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct(/*$storageType*/)
    {

    }

    public function create()
    {
        $this->generateView();
    }

    public function read()
    {
        return $this->task;
    }

    public function delete()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->storage->delete($this->task, $_POST['day']);
        $this->generateView();
    }

    public function initializeModel()
    {
        $this->task = $this->model('task');
        $this->task->setName($_POST['taskName']);
        $this->task->setPriority($_POST['taskPriority']);
        $this->task->setDescription($_POST['taskDescription']);
        $this->task->addStatus(0, '0');
        $this->task->addSubTask(NULL);
    }

    public function save()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->storage->create($this->task, $_POST['day']);
        $this->generateView();
    }

    public function index()
    {
        $this->generateView();
    }

    public function deleteTest()
    {
        $this->generateView();
    }
}