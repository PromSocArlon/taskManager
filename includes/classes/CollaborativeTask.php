<?php
mb_internal_encoding('UTF-8');
require_once 'task.php';

class CollaborativeTask extends Task
{
	private $collaborators;
	
	public function __construct($name)
	{
		$this->setName($name);
		$this->setPriority(0);
		$this->setDesciption('');
		$this->subtasks = [];
		$this->collaborators = [];
	}
	
	
}
?>