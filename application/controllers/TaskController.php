<?php
namespace app\controllers;

use app\models\DAO\TaskDAO;
use app\models\Entity\Task;

class TaskController extends \app\core\Controller
{
    private $task;
    private $storage;

    //$storage doit etre = 'file' ou 'mysql'
    public function __construct(/*$storageType*/)
    {
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'create' => ['public' => true, 'connect' => true],
            'read' => ['public' => true, 'connect' => true],
            'update' => ['public' => true, 'connect' => true],
            'delete' => ['public' => true, 'connect' => true],
            'save' => ['public' => true, 'connect' => true],
            'edit' => ['public' => true, 'connect' => true], //TODO:public doit être false mais pour l'instant true
        ];
        $this->setPermissions($perms);
    }

    public function create()
    {
        $this->generateView();
    }

    public function edit()
    {
        try
        {
            $this->task = new Task();
            $this->task->setID($this->request->getParameter('id'));
            $this->storage = new TaskDAO();
            $this->task = $this->storage->read($this->task);
            $this->generateView($this->task);
        }
        catch(\Exception $ex)
        {
            handleError($ex);
        }
    }

    public function read()
    {
        try
        {
            $this->task = new Task();
            $this->task->setID($this->request->getParameter('id'));
            $this->storage = new TaskDAO();
            $this->task = $this->storage->read($this->task);
            $this->generateView($this->task);
        }
        catch(\Exception $ex)
        {
            handleError($ex);
        }
    }

    public function update()
    {
        try
        {
            $this->initializeModel();
            $this->storage = new TaskDAO();
            $this->storage->update($this->task);
            $this->generateView();
        }
        catch(\Exception $ex)
        {
            handleError($ex);
        }
    }

    public function delete()
    {
        try
        {
            $this->task = new Task();
            $this->task->setID($this->request->getParameter('id'));
            $this->storage = new TaskDAO();
            $this->storage->delete($this->task);
            $this->generateView();
        }
        catch(\Exception $ex)
        {
            handleError($ex);
        }
    }

    public function save()
    {
        try
        {
            $this->initializeModel();

            $this->storage = new TaskDAO();

            // get last id add 1 and insert in object task
            $this->task->setID($this->storage->getLastId('task') + 1);

            print_r($this->task);

            $this->storage->create($this->task);
            $this->generateView();
        }
        catch(\Exception $ex)
        {
            print_r($ex);
            // handleError($ex);
        }
    }

    public function index()
    {
        try
        {
            $this->storage = new TaskDAO();
            $tasks = $this->storage->read();

            // if there is no tasks in the database
            if ($tasks == false) {
                $tasks = array();
            }
            $this->generateView($tasks);
        }
        catch(\Exception $ex)
        {
            handleError($ex);
        }
    }

    public function initializeModel()
    {
        try
        {
            $this->task = new Task();
            $this->task->setID($this->request->getParameter('id'));
            $this->task->setName($this->request->getParameter('name'));
            $this->task->setPriority($this->request->getParameter('priority'));
            $this->task->setDescription($this->request->getParameter('description'));

            print_r($this->task);
            //$this->task->addStatus(0, '0');
            //$this->task->addSubTask(0);
        }
        catch(\Exception $ex)
        {
            throw $ex;
        }
    }
}