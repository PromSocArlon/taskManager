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

    public function edit()
    {
       $this->read();
    }
    
    public function read()
    {
        try
        {
            $this->task = $this->model('task');
            $this->task->setID($this->request->getParameter('id'));
            $this->storage = $this->model('taskDAO');
            $this->task = $this->storage->read($this->task);
        }
        catch(Exception $ex)
        {
            $this->task = [];
            $this->task['Exception'] = $ex;
        }
        $this->generateView($this->task);
    }

    public function update()
    {
        try
        {
            $this->initializeModel();
            $this->storage = $this->model('taskDAO');
            $this->storage->update($this->task);
            $this->generateView();
        }
        catch(Exception $ex)
        {
            $this->generateView(['Exception' => $ex]);
        }
    }

    public function delete()
    {
        try
        {
            $this->task = $this->model('task');
            $this->task->setID($this->request->getParameter('id'));
            $this->storage = $this->model('taskDAO');
            $this->storage->delete($this->task);
            $this->generateView();
        }
        catch(Exception $ex)
        {
            $this->generateView(['Exception' => $ex]);
        }
    }

    public function save()
    {
        try
        {
            $this->initializeModel();
            $this->storage = $this->model('taskDAO');
            $this->storage->create($this->task);
            $this->generateView();
        }
        catch(Exception $ex)
        {
            $this->generateView(['Exception' => $ex]);
        }
    }

    public function index()
    {
        $this->generateView();
    }

    public function initializeModel()
    {
        try
        {
            $this->task = $this->model('task');
            $this->task->setID($this->request->getParameter('id'));
            $this->task->setName($this->request->getParameter('name'));
            $this->task->setPriority($this->request->getParameter('priority'));
            $this->task->setDescription($this->request->getParameter('description'));
            $this->task->setDay($this->request->getParameter('day'));
            //$this->task->addStatus(0, '0');
            //$this->task->addSubTask(0);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
}