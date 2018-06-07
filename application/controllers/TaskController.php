<?php

namespace app\controllers;

use app\core\DependencyInjectionContainer;
use app\models\Entity\Task;
use app\models\Entity\TaskStatus;

class TaskController extends \app\core\Controller
{
    public function __construct(DependencyInjectionContainer $dic)
    {
        parent::__construct($dic);

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
    }

    public function create()
    {
		// $this->generateView();
        //$x = [0 =>'Task'];
        echo $this->templateEngine->render('Task/create.twig');
    }

    public function edit()
    {
		$this->read();
    }

    public function read()
    {
        $taskId = $this->request->getParameter('id');
        $taskObject = $this->entityManager->getRepository("app\models\Entity\Task")->find($taskId);
        $taskArray = $taskObject->entityToArray();
        $taskArray['id'] = $taskId;

        $this->generateView($taskArray);
    }

    public function update()
    {
		$taskId = $this->request->getParameter('id');
        $taskObject = $this->entityManager->getRepository("app\models\Entity\Task")->find($taskId);	
		
		$taskObject->setID($this->request->getParameter('id'));
        $taskObject->setName($this->request->getParameter('name'));
        $taskObject->setPriority($this->request->getParameter('priority'));
        $taskObject->setDescription($this->request->getParameter('description'));
        $taskObject->setStatus($this->request->getParameter('status'));
		
		$this->entityManager->flush();
        $this->generateView();
    }

    public function delete()
    {
        $taskId = $this->request->getParameter('id');
        $taskObject = $this->entityManager->getRepository("app\models\Entity\Task")->find($taskId);
        $this->entityManager->remove($taskObject);
        $this->entityManager->flush();
        $this->generateView();
    }

    public function save()
    {
        $this->initializeModel();

        $this->entityManager->persist($this->model);
        $this->entityManager->flush();

        echo $this->templateEngine->render('Task/save.twig');
    }

    public function index()
    {
        $tasks = $this->entityManager->getRepository(get_class($this->model))->findAll();
        $this->generateView(
            [
                'tasks' => $tasks,
            ],'index.twig');
        //echo $this->templateEngine->render('Task/index.twig', $tasks);
    }

    public function initializeModel()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model->setName($this->request->getParameter('name'));
        $this->model->setPriority($this->request->getParameter('priority'));
        $this->model->setDescription($this->request->getParameter('description'));
        $this->model->setStatus($this->request->getParameter('status'));

        print_r($this->model);
    }
}