<?php
require_once('Member.php');

class Team{
	
	var $teamMember;
	var $teamLeader;
	var $teamTask;
	
	
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