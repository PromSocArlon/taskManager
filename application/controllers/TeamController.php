<?php

//namespace TaskManager\controller;

require_once 'application/core/Controller.php';

class TeamController extends Controller
{

    public function index() {
        $this->generateView();
    }

    public function initializeModel()
    {
        // TODO: Implement initialize() method.
    }

    /**
     * Show information for one team
     */
    public function showAction()
    {
    }

    public function save($teamName, $teamID, $teamMember, $teamLeader, $teamTask)
    {
        $storageFactory = new StorageFactory();
        $team = new team($storageFactory->getStorage());
        $team->setFirstName($teamName);
        $team->setLastName($teamID);
        $team->setTeamMember($teamMember);
        $team->setTeamLeader($teamLeader);
        $team->setPassword($teamTask);
        /*
        $teamService = new TeamService();
        $teamService->save($team);
        */
        $vue = new UserView();
        if ($team->save()) {
            $vue->displayTeam($team);
        } else {
            $vue->displayError($team->getErrors());
        }
    }
    /**
     * public function listAction(){
     * }
     * public function addAction(){
     * }
     * public function editAction(){
     * }
     */
}