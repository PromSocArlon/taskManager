<?php
namespace app\models\Entity;

class Status {
	
	public const NON_DEFINI = 0;
	public const A_FAIRE = 1;
	public const BLOQUE = 2;    // d abord, deja demarree
	public const EN_COURS = 3;
	public const INACTIF = 4;   // repoussee p.ex. au "siecle prochain" (comme dans avast, lol)
	public const TERMINE = 5;
	private static $statusMeaning = ["Non defini","A faire","Bloque","En cours","Inactif","Termine"];

	protected $statusName;        // < int
	protected $statusReason;      // < string
	protected $statusTime;        // < date

	/**
	 * Status constructor.
	 * @param int $statusName type of the status
	 * @param string $statusReason reason of the status
	 */
	public function __construct(int $statusName, string $statusReason) {
		$this->setStatusName($statusName);
		// TODO: error => Status::setStatusTime() must be an instance of date, integer given, ...
		//$this->setStatusTime(time());
		$this->setStatusReason($statusReason);
	}

	public static function getStatusMeaningByIndex(int $index): string {
		switch ($index) {
			case Status::NON_DEFINI:
			case Status::A_FAIRE:
			case Status::BLOQUE:
			case Status::EN_COURS:
			case Status::INACTIF:
			case Status::TERMINE:
				return self::$statusMeaning[$index];
			default: return null;
		}
	}

	/**
	 * Get meaning of the current status
	 * @return String Reason
	 */
	public function getStatusMeaning(): string {
		return self::$statusMeaning[$this->statusName];
	}

	/**
	 * Return the status of task in the array
	 * @return int Number of task in the array
	 */
	public function getStatusName(): int {
		return $this->statusName;
	}

	/**
	 * Set the name of the status
	 * @param int $statusName the type of status
	 */
	public function setStatusName(int $statusName): void {
		switch ($statusName) {
			case Status::A_FAIRE:
			case Status::BLOQUE:
			case Status::EN_COURS:
			case Status::INACTIF:
			case Status::TERMINE:
				$this->statusName = $statusName;
				break;
			default:
				$this->statusName = Status::NON_DEFINI;
		}
	}

	/**
	 * Return the reason status of task
	 * @return string The reason of this status
	 */
	public function getStatusReason(): string {
		return $this->statusReason;
	}

	/**
	 * Set the reason of the status change
	 * @param string $statusReason : Can't be an empty string
	 */
	public function setStatusReason(string $statusReason): void {
		if ($statusReason != "") {
			$this->statusReason = $statusReason;
		}
	}

	/**
	 * Return the time of status
	 * @return date of the status (historically, the last, I suppose)
	 */
	public function getStatusTime(): date {
		return $this->statusTime;
	}

	/**
	 * Set the date of the status to the given date parameter
	 * @param date $statusTime : date can't be null
	 */
	public function setStatusTime(date $statusTime): void {
		if ($statusTime) {
			$this->statusTime = $statusTime;
		}
	}

	/**
	 * Return a summary, if asked or needed
	 * @return string
	 */
	public function toString(): string {
	}

}