<?php

abstract class Storage
{
    protected $connection;
    protected $type;

    abstract public function getType();

    abstract public function createTask($day, $task);

    abstract public function readTask($day);

    abstract public function updateTask($day, $newTask, $oldTask);

    abstract public function deleteTask($day, $task);

    abstract public function load();

    abstract public function save($week);

    abstract public function closeConnection();
}