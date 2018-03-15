<?php

//require_once('Member.php');
/* MAJ */
class Team extends \app\core\Members{
    private $teamID;
    private $teamName;
    private $teamMember = array ();
    private $teamLeader;
    private $teamTask = array();


    public function __construct($idMember)
    {
        $this->teamMember[0] = new member($idMember);
    }


    public function set_tName($new_teamName) {                              //save in database
		$this->teamName = $new_teamName;
	}
	public function get_tName() {                                           // from database
		return $this->teamName;
	}	
	
	
	public function set_tID($new_teamID) {                      // $New_teamID from database (sizeof team +1)
		$this->teamID = $new_teamID;                             //save in database
	}
	 public function get_tID() {                                // from database too
		return $this->teamID;
	}	
	
	
	public function set_tMember($new_IdMember) {
        //$new_IdMember  must be tested before , if exists in teamMember throw exception and propose another teamMemeber)
        array_push($this->teamMember,$new_IdMember);            //save in database
	}

	public function get_tMember() {
		//or get from database
        return $this->teamMember;
	}	
	
	
	public function set_tLeader($new_teamLeader) {
		$this->teamLeader = $new_teamLeader;
	}
	public function get_tLeader() {
		return $this->teamLeader;
	}

	public function set_tTask($new_teamTask){
        array_push($this->teamTask, $new_teamTask);           //save in database	}
    }
        public function get_tTask() {
		return $this->teamTask; // or get from database
	}
}