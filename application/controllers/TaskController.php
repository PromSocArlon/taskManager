<?php

/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 30-01-18
 * Time: 01:58
 */

class TaskController extends app\core\Controller
{
    private $task;
    private $storage;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct(/*$storageType*/)
    {
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'create' => ['public' => false, 'connect' => true],
            'delete' => ['public' => false, 'connect' => true],
            'save' => ['public' => false, 'connect' => true],
			'initializeModel' => ['public' => true, 'connect' => true], //TODO:public doit être false mais pour l'instant true
            'deleteTest' => ['public' => true, 'connect' => true] //vs de Sami, inclus par Cédric tmp. dans les actions.
        ];
        $this->setPermissions($perms);
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

    public function save()
    {
        $this->initializeModel();
        $this->storage = $this->model('taskDAO');
        $this->storage->create($this->task,$_POST['day']);
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