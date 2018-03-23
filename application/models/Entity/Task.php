<?php
namespace app\models\Entity;

class Task extends Entity {

    private $name;
    private $priority;
    private $description;
    private $day;
    private $status;
    private $subtasks;

    public function __construct() {

	}

    /**
     * @param String $name
     */
    public function setName(String $name) {
		$this->name = ucfirst(strtolower($name));
	}

    /**
     * @return String
     */
    public function getName() : String {
		return $this->name;
	}

    /**
     * @param String $priority
     */
    public function setPriority(String $priority) {
        $this->priority = $priority;
    }

    /**
     * @return String
     */
    public function getPriority() : String {
        return $this->priority;
    }

    /**
     * @param String $description
     */
    public function setDescription(String $description) {
		$this->description = $description;
	}

    /**
     * @return String
     */
    public function getDescription() : String {
		return $this->description;
	}

    /**
     * @param String $day
     */
    public function setDay(String $day) {
        $this->day = $day;
    }

    /**
     * @return String
     */
    public function getDay() : String {
        return $this->day;
    }

    /**
     * @param $subtask
     */
    public function addSubTask($subtask) {
		$this->subtasks[] = $subtask;
	}

	/** supprime la subtask demandée
	 * et déplace de -1 l'index des élément suivant l'élément supprimé
	 **/
	public function removeSubTask($var) {
		$tasks = $this->subtasks;
		$index = $this->getSubTaskIndex($var);
		$subtask = null;
		if ($index != -1) {
			$subtask = $tasks[$index];
			unset($tasks[$index]);
			$this->subtasks = array_values($tasks);
		}
		return $subtask;
	}

	/** Permet d'obtenir l'index d'une subtask soit par un integer donné
	 * soit par un string correspondant au nom **/
	private function getSubTaskIndex($var) {
		$tasks = $this->subtasks;
		$index = -1;
		$bool = is_numeric($var);
		//si pas numérique recherche sur l'attribut name
		if (!$bool) {
			$i = 0;
			do {
				$name = $tasks[$i]->getName();
				if (strcmp($var, $name) == 0) {
					$index = $i;
				}
				$i++;
			} while (($index == -1) && $i < count($tasks));
		} //sinon vérification que l'integer donné correspond bien à un index des subtasks
		elseif ($var >= 0 && $var < count($tasks)) {
			$index = $var;
		}
		return $index;
	}

	/** Renvoie la subtasks identifié par soit un nom ou l'index du tableau de la subtask
	 * revoie null si aucun élément ne correspond à la demande ou index out of bound **/
	public function getSubTask($var) {
		$index = $this->getSubTaskIndex($var);
		if ($index != -1) {
			return $this->subtasks [$index];
		} else {
			return null;
		}
	}

	/** Renvoie une copie du tableau des subtasks **/
	public function getAllSubtasks() {
		$array = $this->subtasks;
		return $array;
	}

    /**
     * @param int $statusName
     * @param string $description
     */
    public function addStatus(int $statusName, string $description): void {
		if($description != "") {
			$status[] = new Status($statusName, $description);
		}
	}

    /**
     * @param int $index
     */
    public function removeStatus(int $index): void {
		if($index>=0 && $index < count($this->status)) {
			array_splice($this->status, $index,1);
		}
	}

    /**
     * @param int $index
     * @return Status
     */
    public function getStatus(int $index): Status {
		if($index>=0 && $index < count($this->status)) {
			return $this->status[$index];
		}
		else {
			return null;
		}
	}

    public function entityToArray() {
        return get_object_vars($this);
    }

}