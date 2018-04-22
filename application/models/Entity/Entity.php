<?php
namespace app\models\Entity;

abstract class Entity {

    //TODO: set to protected ?
    /**
     * @id
     * @Column(type="integer")
     * @GeneratedValue
     */
	private $id;
	
	public function getID()
    {
        return $this->id;
    }
	
	public function setID(int $id)
    {
        $this->id = $id;
    }

    //TODO: usable ?
    //abstract function entityToArray();

}