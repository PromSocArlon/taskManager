<?php

abstract class Storage
{
    protected $connect;
    protected $type;

    abstract public function getType();

    abstract public function createTask();

    abstract public function readTask();

    abstract public function updateTask();

    abstract public function deleteTask();

    abstract public function showTables();

    abstract public function load();

    abstract public function save();

    abstract public function closeConnection();
}