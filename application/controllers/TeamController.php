<?php

namespace app\controllers;

use app\models\DAO\TeamDAO;
use app\models\entity\team;

class TeamController extends \app\core\Controller
{

    public function __construct($entityManager)
    {
        parent::__construct($entityManager);
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
            $this->storage = new TeamDAO;
    }

    public function index()
    {
        $teams = $this->storage->read();
        $counts=[];
        foreach ( $teams as $team)
        {
            $counts[$team['id']]['Members']=$this->storage->getCountOfMembersFromTeam($team['id']);
            $counts[$team['id']]['Tasks']=$this->storage->getCountOfTasksFromTeam($team['id']);
        }
        $this->generateView(['teams' => $teams,'counts'=> $counts]);
    }

    public function save()
    {
        $this->initializeModel();
        $this->storage->create($this->model);
        $this->generateView();
    }

    public function initializeModel()
    {
        $this->model = new team;
        if ($this->request->existParameter('id')) {
            $this->model->setID($this->request->getParameter('id'));
        }
        if ($this->request->existParameter('name')) {
            $this->model->setName($this->request->getParameter('name'));
        }
        if ($this->request->existParameter('leader')) {
            $this->model->setLeader($this->request->getParameter('leader'));
        }
    }

    public function create()
    {
        $this->generateView();
    }

    public function read()
    {
        $this->initializeModel();
        $result = $this->storage->read($this->model);
        $members = $this->storage->getAllMembersFromTeam($this->model);
        $tasks = $this->storage->getAllTasksFromTeam($this->model);
        if ($result != false) {
            $this->arrayToObject($result);
            $this->generateView([
                'team' => $this->model,
                'members' => $members,
                'tasks' => $tasks
            ]);
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

    private function arrayToObject($array)
    {
        $this->model->setId($array['id']);
        $this->model->setName($array['name']);
        $this->model->setLeader($array['leader']);
    }

    public function edit()
    {
        $this->initializeModel();
        $result = $this->storage->read($this->model);
        if ($result != false) {
            $this->arrayToObject($result);
            $this->generateView(['team' => $this->model]);
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

    public function delete()
    {
        $this->initializeModel();
        $result = $this->storage->read($this->model);
        if ($result != false) {
            $this->arrayToObject($result);
            $this->storage->delete($this->model);
            $this->storage->removeAllMembersFromTeam($this->model);
            $this->storage->removeAllTasksFromTeam($this->model);
            $this->generateView(array('name' => $this->model));
        } else {
            throw  new \Exception("Team doesn't exist.");
        }
    }

        public function update()
    {
        $this->initializeModel();
        $this->storage->update($this->model);
        $this->generateView();
    }
}