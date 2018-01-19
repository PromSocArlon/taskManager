<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 17-01-18
 * Time: 19:34
 */

require_once 'task.php';

class Status
{
    public const A_FAIRE = 1;
    public const BLOQUE = 2;    // d abord, deja demarree
    public const EN_COURS = 3;
    public const INACTIF = 4;   // repoussee p.ex. au "siecle prochain" (comme dans avast, lol)
    public const TERMINE = 5;

    protected $statusName;        // < int
    protected $statusReason;      // < string
    protected $statusTime;        // < date

    private $statusMeaning = array();       // < string[]

    /*public function __construct()
    {

    }*/
    public function __construct(int $statusNameInt, string $sName)
    {
        if ( DefineTheCorrespondencesArray() )
        {
            $this->setstatusReason(time());
            $this->setStatusName($statusNameInt);
            $this->setStatusName($sName);
        }
        else return null;
    }

    public function DefineTheCorrespondencesArray() : bool
    {
        $this->statusMeaning = [];
        $this->statusMeaning[] = new Status(Status::A_FAIRE);
        $this->statusMeaning[] = new Status(Status::BLOQUE);
        $this->statusMeaning[] = new Status(Status::EN_COURS);
        $this->statusMeaning[] = new Status(Status::INACTIF);
        $this->statusMeaning[] = new Status(Status::TERMINE);
    }


    /**
     * Get the last index added to the history of this StatusMeaning(/s) History
     * @return String Reason
     */
    public function getStatusMeaning(int $indexS) : string
    {
        if ($indexS>=0 && $indexS<sizeof($this->statusMeaning))
        {
            return $this->statusMeaning[$indexS];
        }
        return "]Raison_Inexistante ![";
    }

/**************************************************************/
    /**
     * Return the status of task in the array
     * @return int Number of task in the array
     */
    public function getStatusName() : int
    {
        return $this->statusName;
    }
    /**
     * Set the number of task in the array
     */
    public function setStatusName($statusName)             //int
    {
        $this->statusName =  $statusName;
    }
/**************************************************************/
    /**************************************************************/
    /**
     * Return the reason status of task
     * @return int Number of task
     */
    public function getstatusReason() : string
    {
        return $this->statusReason;
    }
    /**
     * Set the number of task
     */
    public function setstatusReason($statusReason)          //string
    {
        $this->statusReason =  $statusReason;
    }
    /**************************************************************/
    /**************************************************************/
    /**
     * Return the time of status
     * @return date of the status (historically, the last, I suppose)
     */
    public function getstatusTime() : date
    {
        return $this->statusTime;
    }
    /**
     * Set the number of task in the array
     */
    public function setstatusTime($statusTime)             //date
    {
        $this->statusTime =  $statusTime;
    }
    /**************************************************************/



	/**
	 * Return a summary, if asked or needed
	 * @return string
	 */
	public function toString(): string
    {
	}

}