<?php
namespace app\models\Entity;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity {

    //TODO: set to protected ?
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	public $id;
	
	public function getID()
    {
        return $this->id;
    }
	
	public function setID(int $id)
    {
        $this->id = $id;
    }
}