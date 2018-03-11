<?php

//namespace TaskManager\controller;

require_once '../core/Controller.php';

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
            $this->generateView($ex);
        }
    }

    public function initializeModel()
    {
        try {
            $this->team = $this->model('team');
            $this->team->set_tName($this->request->getParameter('teamName'));
        } catch (Exception $ex) {
            throw;
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