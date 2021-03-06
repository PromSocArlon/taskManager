<?php

namespace app\controllers;

use app\core\DependencyInjectionContainer;
use app\models\Entity\Task;


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
        echo $this->templateEngine->render('Task/create.twig');
    }

    public function edit()
    {
        $taskId = $this->request->getParameter('id');
        $task = $this->entityManager->getRepository(get_class($this->model))->find($taskId);

        $this->generateView('edit.twig', ['task' => $task,]);
    }

    public function read()
    {
        $taskId = $this->request->getParameter('id');
        $task = $this->entityManager->getRepository(get_class($this->model))->find($taskId);

        $this->generateView('read.twig', ['task' => $task,]);
    }

    public function update()
    {
        $taskId = $this->request->getParameter('id');
        $taskObject = $this->entityManager->getRepository(get_class($this->model))->find($taskId);

        $taskObject->setID($this->request->getParameter('id'));
        $taskObject->setName($this->request->getParameter('name'));
        $taskObject->setPriority($this->request->getParameter('priority'));
        $taskObject->setDescription($this->request->getParameter('description'));
        $taskObject->setStatus($this->request->getParameter('status'));

        $this->entityManager->flush();
        $this->generateView('update.twig');
    }

    public function delete()
    {
        $taskId = $this->request->getParameter('id');
        $taskObject = $this->entityManager->getRepository(get_class($this->model))->find($taskId);

        $this->entityManager->remove($taskObject);
        $this->entityManager->flush();

        $this->generateView('delete.twig');
    }

    public function save()
    {
        $this->initializeModel();

        $this->entityManager->persist($this->model);
        $this->entityManager->flush();

        $this->generateView('save.twig');
    }

    public function index()
    {
        $tasks = $this->entityManager->getRepository(get_class($this->model))->findAll();
        $this->generateView('index.twig', ['tasks' => $tasks,]);
    }

    public function initializeModel()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model->setName($this->request->getParameter('name'));
        $this->model->setPriority($this->request->getParameter('priority'));
        $this->model->setDescription($this->request->getParameter('description'));
        $this->model->setStatus($this->request->getParameter('status'));
    }
}