<?php

class Team extends Entity {

    private $name;
    /**
     * @var Member
     */
    private $leader;


    //public function __construct($idMember)
    public function __construct()
    {
        $this->members[0] = new Member();
    }


    public function set_tName($new_teamName) {                              //save in database
        $this->name = $new_teamName;
	}
	public function get_tName() {                                           // from database
        return $this->name;
	}	
	
	
	public function set_tID($new_teamID) {                      // $New_teamID from database (sizeof team +1)
        $this->Id = $new_teamID;                             //save in database
	}
	 public function get_tID() {                                // from database too
         return $this->id;
	}	
	
	
	public function set_tMember($new_IdMember) {
        //$new_IdMember  must be tested before , if exists in teamMember throw exception and propose another teamMemeber)
        array_push($this->members, $new_IdMember);            //save in database
	}

	public function get_tMember() {
		//or get from database
        return $this->members;
	}	
	
	
	public function set_tLeader($new_teamLeader) {
        $this->leader = $new_teamLeader;
	}
	public function get_tLeader() {
        return $this->leader;
	}

	public function set_tTask($new_teamTask){
        array_push($this->tasks, $new_teamTask);           //save in database	}
    }
        public function get_tTask() {
            return $this->tasks; // or get from database
	}

    public function entityToArray() {
        return get_object_vars($this);
    }

}