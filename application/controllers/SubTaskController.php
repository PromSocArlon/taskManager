<?php
/**
 * Created by PhpStorm.
 * User: My Little Pony
 * Date: 21-08-18
 * Time: 21:17
 */

namespace app\controllers;
use app\core\DependencyInjectionContainer;
use app\models\entity\SubTask;

class SubTaskController extends \app\core\Controller
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

        $this->model = new SubTask();
    }

    public  function index()
    {
        $subTasks = $this->entityManager->getRepository(get_class($this->model))->findAll();
        $this->generateView('index.twig', ['subTasks' => $subTasks,]);
    }


    public function initializeModel()
    {
        $this->model->setID($this->request->getParameter('id'));
        $this->model->setName($this->request->getParameter('name'));
        $this->model->setDescription($this->request->getParameter('description'));
    }

    public function create()
    {
        echo $this->templateEngine->render('SubTask/create.twig');
    }

    public function update()
    {
        $subTaskId = $this->request->getParameter('id');
        $subTaskObject = $this->entityManager->getRepository(get_class($this->model))->find($subTaskId);

        $subTaskObject->setID($this->request->getParameter('id'));
        $subTaskObject->setName($this->request->getParameter('name'));
        $subTaskObject->setDescription($this->request->getParameter('description'));

        $this->entityManager->flush();
        $this->generateView('update.twig');
    }

    public function delete()
    {
        $subTaskId = $this->request->getParameter('id');
        $subTaskObject = $this->entityManager->getRepository(get_class($this->model))->find($subTaskId);

        $this->entityManager->remove($subTaskObject);
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

    public function read()
    {
        $subTaskId = $this->request->getParameter('id');
        $subTask = $this->entityManager->getRepository(get_class($this->model))->find($subTaskId);

        $this->generateView('edit.twig', ['subTask' => $subTask,]);
    }

    public function edit()
    {
        $subTaskId = $this->request->getParameter('id');
        $subTask = $this->entityManager->getRepository(get_class($this->model))->find($subTaskId);

        $this->generateView('edit.twig', ['$subTask' => $subTask,]);
    }

}