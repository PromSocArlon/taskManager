<?php

namespace app\controllers;

use app\models\entity\team;

class TeamController extends \app\core\Controller
{
    public function __construct()
    {
        parent::__construct();
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'save' => ['public' => true, 'connect' => true],
            'create' => ['public' => true, 'connect' => true],
            'viewTeamMembers' => ['public' => true, 'connect' => true],
            'read' => ['public' => true, 'connect' => true],
            'delete' => ['public' => true, 'connect' => true],
            'update' => ['public' => true, 'connect' => true],
            'edit' => ['public' => true, 'connect' => true],
        ];
        $this->setPermissions($perms);
    }

    public function index()
    {
        $teams = $this->entityManager->getRepository('app\models\entity\team')->findAll();
        $this->generateView(['teams' => $teams]);
    }

    public function initializeModel()
    {
        if ($this->request->existParameter('name')) {
            $this->model->setName($this->request->getParameter('name'));
        }
        if ($this->request->existParameter('leader')) {
            $result = $this->entityManager->getRepository('app\models\entity\member')->find($this->request->getParameter('leader'));
            $this->model->setLeader($result);
        }
        if ($this->request->existParameter('members')) {
            $members = [];
            foreach ($this->request->getParameter('members') as $row) {
                $result = $this->entityManager->getRepository('app\models\entity\member')->find($row);
                $members[] = $result;
            }
            $this->model->setMembers($members);
        }
        if ($this->request->existParameter('tasks')) {
            $tasks = [];
            foreach ($this->request->getParameter('tasks') as $row) {
                $result = $this->entityManager->getRepository('app\models\entity\task')->find($row);
                $tasks[] = $result;
            }
            $this->model->setTasks($tasks);
        }
    }

    public function create()
    {
        $tasks = $this->entityManager->getRepository('app\models\entity\task')->findAll();
        $members = $this->entityManager->getRepository('app\models\entity\member')->findAll();
        $this->generateView([
            'tasks' => $tasks,
            'members' => $members
        ]);
    }

    public function read()
    {
        $result = $this->getTeamFromId();
        $tasks = $this->entityManager->getRepository('app\models\entity\task')->findAll();
        $members = $this->entityManager->getRepository('app\models\entity\member')->findAll();

        if (!(is_null($result))) {
            $this->generateView([
                'team' => $result,
                'tasks' => $tasks,
                'members' => $members
            ]);
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

    public function update()
    {
        $result = $this->getTeamFromId();
        if (!is_null($result)) {
            $this->model = $result;
            $this->initializeModel();

            $this->entityManager->persist($this->model);
            $this->entityManager->flush();
            $this->generateView();
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

    public function delete()
    {
        $result = $this->getTeamFromId();
        if (!is_null($result)) {
            $this->entityManager->remove($result);
            $this->entityManager->flush($result);
            $this->generateView(['team' => $result]);
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

    private function getTeamFromId()
    {
        if (!$this->request->existParameter('id')) {
            throw new \Exception('Invalid request');
        }
        return $this->entityManager->find(Team::class, $this->request->getParameter('id'));
    }

    public function save()
    {
        $this->model = new team();
        $this->initializeModel();
        $this->entityManager->persist(($this->model));
        $this->entityManager->flush();
        $this->generateView();
    }

    public function edit()
    {
        $result = $this->getTeamFromId();

        $tasks = $this->entityManager->getRepository('app\models\entity\task')->findAll();
        $members = $this->entityManager->getRepository('app\models\entity\member')->findAll();
        if (!is_null($result)) {
            $this->generateView([
                'team' => $result,
                'tasks' => $tasks,
                'members' => $members
            ]);
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }


}