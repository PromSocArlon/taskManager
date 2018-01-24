<?php
require_once('day.php');

class Week {
	private $days;
	
	public function __construct() {
        $this->days = [];
		$this->days[] = new Day(Day::MONDAY);
		$this->days[] = new Day(Day::TUESDAY);
		$this->days[] = new Day(Day::WEDNESDAY);
		$this->days[] = new Day(Day::THURSDAY);
		$this->days[] = new Day(Day::FRIDAY);
		$this->days[] = new Day(Day::SATURDAY);
		$this->days[] = new Day(Day::SUNDAY);
    }
	
	public function getDayByName($name){
		$tempDay = new Day($name);
		foreach($this->days as $day){
			if($day->getName() == $tempDay->getName()){
				return $day;
			}
		}
		return null;
	}
	
	public function setDay(Day $day){
		for($i = 0; $i < count($this->days); ++$i){
			if($this->days[$i]->getName() == $day->getName()){
				$this->days[$i] = $day;
				return true;
			}
		}
		return false;
	}
	
	public function getDays(){
		return $this->days;
	}
}