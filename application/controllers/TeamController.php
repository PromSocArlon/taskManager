<?php

//namespace app\controllers;

require_once 'application/core/Controller.php';

class TeamController extends Controller
{
    private $team;
    private $storage;

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
            $view = new  View('error');
            $view->handleError($ex);
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

    public function delete()
    {
        try {
            $this->initializeModel();
            $this->storage = $this->model('teamDAO');
            $this->storage->delete($this->team, $this->request->getParameter('id'));
            $this->generateView();
        } catch (Exception $ex) {
            $view = new  View('error');
            $view->handleError($ex);
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
            $view = new  View('error');
            $view->handleError($ex);
        }
    }

    /**
     * Show information for one team
     */
    //public function showAction()
    //{
    //}

//    public function save($teamName, $teamID, $teamMember, $teamLeader, $teamTask)
//    {
//        $storageFactory = new StorageFactory();
//        $team = new team($storageFactory->getStorage());
//        $team->setFirstName($teamName);
//        $team->setLastName($teamID);
//        $team->setTeamMember($teamMember);
//        $team->setTeamLeader($teamLeader);
//        $team->setPassword($teamTask);
//        /*
//        $teamService = new TeamService();
//        $teamService->save($team);
//        */
//        $vue = new UserView();
//        if ($team->save()) {
//            $vue->displayTeam($team);
//        } else {
//            $vue->displayError($team->getErrors());
//        }
//    }


    /**
     * public function listAction(){
     * }
     * public function addAction(){
     * }
     * public function editAction(){
     * }
     */
}