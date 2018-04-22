<?php

namespace app\controllers;

use app\models\DAO\TeamDAO;
use app\models\entity\team;

class TeamController extends \app\core\Controller
{
    private $team;
    private $storage;

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
        ];
            $this->setPermissions($perms);
            $this->storage = new TeamDAO;
    }

    public function index()
    {
        $teams = $this->storage->read();
        $this->generateView(['teams' => $teams]);
    }

    public function save()
    {
            $this->initializeModel();
            $this->storage->create($this->team);
        $this->generateView(['id' => $this->team->getID()], 'read');
    }

    public function initializeModel()
    {
        $this->team = new Team();
        $this->team->setName($this->request->getParameter('name'));
    }

    public function create()
    {
        $this->generateView();
        /* try {
             $this->initializeModel();
             $this->storage->create($this->team, $this->request->getParameter('id'));
             $this->generateView();
         } catch (\Exception $ex) {
             handleError($ex);
         }*/
    }

// function viewTeamMembers - useless ?
	/*
    public function viewTeamMembers()
    {
        try {
            $this->initializeModel();
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }
	*/
    public function read()
    {
            $this->team = new team;
            $this->team->setID($this->request->getParameter('id')); // "read" instead of "setID" ?
            $this->team = $this->storage->read($this->team);
            $this->generateView($this->team);
    }

    public function delete()
    {
            $this->initializeModel();
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
    }

    public function update()
    {
            $this->initializeModel();
            $this->storage->update($this->team, $this->request->getParameter('id'));
            $this->generateView();
    }
}