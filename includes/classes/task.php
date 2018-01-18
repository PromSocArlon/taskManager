<?php

class Task {
	private $name;
	private $priority;
	
	public function __construct($name){
		$this->setName($name);
	}
	
	public function setPriority($priority){
		$this->priority = $priority;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function setName($name){
		$this->name =  ucfirst(strtolower($name));
	}
	
	public function getName(){
		return $this->name;
	}
}