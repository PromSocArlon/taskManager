<?php
/* MAJ */

class member extends \app\core\Members {

    private $id;
    private $login;
    private $password;
    private $mail;
    private $teamLeader;
    private $team;


    /**
     * @param array $task
     */
    public function setTask($task)
    {
        $this->task = $task;
 
    }

    /**
     * @return array
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    public function setId($new_id) {
        $this->id = $new_id;
    }
    public function getId() {
        return $this->id;
    }


    public function setLogin($new_login) {
        $this->login = $new_login;
    }
    public function getLogin() {
        return $this->login;
    }


    public function setPassword($new_password) {
        $this->password = $new_password;
    }
    public function getPassword() {
        return $this->password;
    }


    public function setMail($new_mail) {
        $this->mail= $new_mail;
    }
    public function getMail() {
        return $this->mail;
    }


    public function setTeamLeader($new_teamLeader) {
        $this->teamLeader= $new_teamLeader;
    }
    public function getTeamLeader() {
        return $this->teamLeader;
    }

}
