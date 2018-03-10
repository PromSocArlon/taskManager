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

    public function createANDupdate()
    {
       $this->generateView();
    }
    
    public function read()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->generateView($this->storage->read($this->task, $this->request->getParameter('day')));
    }

    public function update()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        //$this->storage->update($this->task, $this->request->getParameter('day'));
        $this->generateView();
    }

    public function delete()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->storage->delete($this->task, $this->request->getParameter('day'));
        $this->generateView();
    }

    public function save()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->storage->create($this->task, $this->request->getParameter('day'));
        $this->generateView();
    }

    public function index()
    {
        $this->generateView();
    }

    public function initializeModel()
    {
        $this->task = $this->model('task');
        $this->task->setName($this->request->getParameter('taskName'));
        $action = $this->request->getParameter('action');
        if ($action == 'save' || $action == 'update') {
            if ($action == 'update') $updateAction = $this->request->getParameter('updateAction');
            if ($action == 'save' || $updateAction == 'priority')$this->task->setPriority($this->request->getParameter('taskPriority'));
            if ($action == 'save' || $updateAction == 'description')$this->task->setDescription($this->request->getParameter('taskDescription'));
            if ($action == 'save' || $updateAction == 'status')$this->task->addStatus(0, '0');
            if ($action == 'save' || $updateAction == 'subTask')$this->task->addSubTask(NULL);
        }
    }
}