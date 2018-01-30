<?php
require_once('Member.php');

class Team{
	
	private $teamName;
    private $teamID;
    private $teamMember;
    private $teamLeader;
    private $teamTask;
	
	
	public function set_tName($new_teamName) {
		$this->teamName = $new_teamName;
	}
	public function get_tName() {
		return $this->teamName;
	}	
	
	
	public function set_tID($new_teamID) {
		$this->teamID = $new_teamID;
	}
	 public function get_tID() {
		return $this->teamID;
	}	
	
	
	public function set_tMember($new_teamMember) {
		$this->teamMember = $new_teamMember;
	}
	public function get_tMember() {
		return $this->teamMember;
	}	
	
	
	public function set_tLeader($new_teamLeader) {
		$this->teamLeader = $new_teamLeader;
	}
	public function get_tLeader() {
		return $this->teamLeader;
	}

	
	public function set_tTask($new_teamTask) {
		$this->teamTask = $new_teamTask;
	}
	public function get_tTask() {
		return $this->teamTask;
	}
}