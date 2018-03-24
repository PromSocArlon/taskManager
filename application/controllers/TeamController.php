<?php

namespace app\controllers;

use app\models\DAO\TeamDAO;
use function app\core\handleError;

class TeamController extends \app\core\Controller
{
    private $team;
    private $storage;

    public function __construct()
    {
        $perms = [
            'index' => ['public' => true, 'connect' => true],
            'save' => ['public' => true, 'connect' => true],
            'create' => ['public' => true, 'connect' => true],
            'viewTeamMembers' => ['public' => true, 'connect' => true],
            'delete' => ['public' => true, 'connect' => true],
            'update' => ['public' => true, 'connect' => true],
        ];
        try {
            $this->setPermissions($perms);
            $this->storage = new TeamDAO;
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }

    public function index()
    {
        $teams = $this->storage->read();
        $this->generateView($teams);
    }

    public function save()
    {
        try {
            $this->initializeModel();
            $this->storage->create($this->team);
            $this->redirect('team', 'index');
        } catch (\Exception $ex) {
            handleError(ex);
        }
    }

    public function initializeModel()
    {
        try {
            $this->team = $this->model('team');
            $this->team->setName($this->request->getParameter('teamName'));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function create()
    {
        try {
            $this->initializeModel();
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }

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

    public function delete()
    {
        try {
            $this->initializeModel();
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }

    public function update()
    {
        try {
            $this->initializeModel();
            $this->storage->update($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (\Exception $ex) {
            handleError($ex);
        }
    }
}