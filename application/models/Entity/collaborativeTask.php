<?php
mb_internal_encoding('UTF-8');
require_once 'task.php';
require_once 'includes/interfaces/collaborativeInterface.php';

class CollaborativeTask extends Task implements CollaborativeInterface
{
	private $collaborators;
	
	/* Constructeur d'une CollaborativeTask dont l'argument arg est
	soit une Task soit un String contenant le nom de la Task */
	public function __construct($arg)
	{
		if($arg instanceof Task)
		{
			$this->setName($arg->getName());
			$this->setPriority($arg->getPriority());
			$this->setDescription($arg->getDescription());
			$this->subtasks = $arg->getAllSubtasks();
			$this->collaborators = [];
		}
		else
		{
			$this->setName($arg);
			$this->setPriority(0);
			$this->setDesciption('');
			$this->subtasks = [];
			$this->collaborators = [];
		}
	}
	
	public function addCollaborator($colaId)
	{
		$this->collaborators[] = $colaId;
	}
	
	public function removeCollaborator($arg)
	{
		$collaborators = $this->collaborators;
		$bool = is_numeric($arg);
		$collaborator = null;
		$index = -1;
		if(!$bool)
		{
			$index = array_search($arg, $collaborators);
		}
		elseif($index >= 0 && $index < count($collaborators))
		{
			$index = $arg;
		}
		
		//si id ou index donné correspond à un collaborator du tableau collaborators
		if($index != -1)
		{
			$collaborator = $collaborators[$index];
			unset($collaborators[$index]);
			$this->collaborators = array_values($collaborators);
		}
		return $collaborator;
	}
	
	public function getCollaborator($arg)
	{
		$collaborators = $this->collaborators;
		$bool = is_numeric($var);
		$collaborator = null;
		$index = -1;
		if(!$bool)
		{
			$index = array_search($arg, $collaborators);
		}
		elseif($index >= 0 && $index < count($collaborators))
		{
			$index = $arg;
		}
		
		//si id ou index donné correspond à un collaborator du tableau collaborators
		if($index != -1)
		{
			$collaborator = $collaborators[$index];
		}
		return $collaborator;
	}
	
	/** Renvoie une copie du tableau des collaborators **/
	public function getCollaboratorsList()
	{
		$array = $this->collaborators;
		return $array;
	}
}
?>