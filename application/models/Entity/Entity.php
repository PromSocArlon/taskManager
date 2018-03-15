<?php

abstract class Entity {
	
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