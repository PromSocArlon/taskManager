<?php
namespace app\controllers;

use app\models\DAO\TaskDAO;
use app\models\Entity\Task;

class TaskController extends \app\core\Controller
{
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
        $this->model = new Task();
        $this->dao = new TaskDAO();
    }

    public function create()
    {
        $this->generateView();
    }

    public function edit()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model = $this->dao->read($this->model);
        $this->generateView($this->model);
    }

    public function read()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model = $this->dao->read($this->model);
        $this->generateView($this->model);
    }

    public function update()
    {
        $this->initializeModel();
        $this->dao->update($this->model);
        $this->generateView();
    }

    public function delete()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->dao->delete($this->model);
        $this->generateView();
    }

    public function save()
    {
        $this->initializeModel();
        // get last id add 1 and insert in object task
        $this->model->setID($this->dao->getLastId('task') + 1);

        print_r($this->model);

        $this->dao->create($this->model);
        $this->generateView();
    }

    public function index()
    {
        $tasks = $this->dao->read();

        // if there is no tasks in the database
        if ($tasks == false) {
            $tasks = array();
        }
        $this->generateView($tasks);
    }

    public function initializeModel()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model->setName($this->request->getParameter('name'));
        $this->model->setPriority($this->request->getParameter('priority'));
        $this->model->setDescription($this->request->getParameter('description'));

        print_r($this->model);
        //$this->task->addStatus(0, '0');
        //$this->task->addSubTask(0);
    }
}