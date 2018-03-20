<?php

abstract class Entity {

    //TODO: set to protected ?
	public $id;
	
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