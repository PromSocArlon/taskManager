<?php

abstract class Storage
{
    protected $connection;
    protected $type;

    public function getType()
    {
        return $this->type;
    }

    abstract public function create(array $array);

    abstract public function read(array $array);

    abstract public function update(array $array);

    abstract public function delete(array $array);

    abstract public function close();
}