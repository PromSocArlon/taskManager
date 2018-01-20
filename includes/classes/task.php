<?php

class Task {
	private $name;
	private $priority;
	private $description;
	private $subtasks;
	
	public function __construct($name, $priority, $description)
	{
		$this->setName($name);
		$this->setPriority($priority);
		$this->setDesciption($description);
		$this->subtasks = [];
	}
	
	public function setPriority($priority)
	{
		$this->priority = $priority;
	}
	
	public function getPriority()
	{
		return $this->priority;
	}
	
	public function setName($name)
	{
		$this->name =  ucfirst(strtolower($name));
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function addSubTask($subtask)
	{
		$this->subtasks[] = $subtask;
	}
	
	/* supprime la subtask demandée
	et déplace de -1 l'index des élément suivant l'élément supprimé
	*/
	public function removeSubTask($var)
	{
		$tasks = $this->subtasks;
		$index = $this->getSubTaskIndex($var);
		if($index != -1)
		{
			unset($tasks[$index]);
			$this->subtasks = array_values($tasks);
		}
		else
			echo 'Pas de correspondance pour index/Nom donne : ' . $var . PHP_EOL;
	}
	
	/* Permet d'obtenir l'index d'une subtask soit par un integer donné
	soit par un string correspondant au nom*/
	private function getSubTaskIndex($var)
	{
		$tasks = $this->subtasks;
		$index = -1;
		$bool = is_numeric($var);
		//si pas numérique recherche sur l'attribut name
		if(!$bool)
		{
			$i = 0;
			do
			{
				$name = $tasks[$i]->getName();
				if(strcmp($var, $name) == 0)
				{
					$index = $i;	
				}
				$i++;
			}while(($index == -1) && $i < count($tasks));
		}
		//sinon vérification que l'integer donné correspond bien à un index des subtasks
		elseif($var >= 0 && $var < count($tasks))
		{
			$index = $var;
		}
		return $index;
	}
	/*renvoie la subtasks identifié par soit un nom ou l'index du tableau de la subtask
	revoie null si aucun élément ne correspond à la demande ou index out of bound*/
	public function getSubTask($var)
	{
		$index = $this->getSubTaskIndex($var);
		if($index != -1)
		{
			return $this->subtasks [$index];
		}
		else
		{
			echo 'Pas de correspondance pour index/Nom donne : ' . $var . PHP_EOL;
			return null;
		}
	}
}