<?php

//namespace app\controllers;

require_once 'application/core/Controller.php';

class TeamController extends Controller
{
    private $team;
    private $storage;

    public function __construct()
    {
        $perms = [
            'index' => ['public' => false, 'connect' => true],
            'save' => ['public' => false, 'connect' => true],
            'showAction' => ['public' => false, 'connect' => true]
        ];
        $this->setPermissions($perms);
    }

    public function index()
    {
        $this->generateView();
    }

    public function save()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->create($this->team, 0);
            $this->redirect('team', 'index');
        } catch (Exception $ex) {
            handleError($ex);
        }
    }

    public function initializeModel()
    {
        try {
            $this->team = $this->model('team');
            $this->team->set_tName($this->request->getParameter('teamName'));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function create()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (Exception $ex) {
            handleError($ex);
        }
    }

    public function viewTeamMembers()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (Exception $ex) {
            handleError($ex);
        }
    }

    public function delete()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (Exception $ex) {
            handleError($ex);
        }
    }

    public function update()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->update($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (Exception $ex) {
            handleError($ex);
        }
    }
}