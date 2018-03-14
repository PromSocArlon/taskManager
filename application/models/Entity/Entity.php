<?php

class Entity {
	
	protected $id;
	
	public function getID()
    {
        return $this->id;
    }
	
	public function setID($id)
    {
        $this->id = $id;
    }
}