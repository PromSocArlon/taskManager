<?php
require_once('Member.php');

class Team{
	
	var $teamName;
	var $teamID;
	var $teamMember;
	var $teamLeader;
	var $teamTask;
	
	
	function set_tName($new_teamName) {
		$this->teamName = $new_teamName;
	}
	function get_tName() {
		return $this->teamName;
	}	
	
	
	function set_tID($new_teamID) {
		$this->teamID = $new_teamID;
	}
	function get_tID() {
		return $this->teamID;
	}	
	
	
	function set_tMember($new_teamMember) {
		$this->teamMember = $new_teamMember;
	}
	function get_tMember() {
		return $this->teamMember;
	}	
	
	
	function set_tLeader($new_teamLeader) {
		$this->teamLeader = $new_teamLeader;
	}
	function get_tLeader() {
		return $this->teamLeader;
	}

	
	function set_tTask($new_teamTask) {
		$this->teamTask = $new_teamTask;
	}
	function get_tTask() {
		return $this->teamTask;
	}
}