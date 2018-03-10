<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:01
 */

abstract class DAO
{
    protected $connection;

    public function __construct($type = 'mysql')
    {
        $this->connection = StorageFactory::getStorage($type);
    }

    abstract protected function objectToArray($object);

    public function create($object)
    {
        $array = $this->objectToArray($object);

        if ($this->connection->create($array)) {
            return true;
        }
        return false;
    }

    public function read($object = NULL)
    {
        $array = $this->objectToArray($object);

        $result = $this->connection->read($array);

        if (!empty($result)) {
            return $result;
        }
        return false;
    }

    public function update($object)
    {
        $array = $this->objectToArray($object);

        if ($this->connection->update($array)) {
            return true;
        }
        return false;
    }

    public function delete($object)
    {
        $array = $this->objectToArray($object);
        if ($this->connection->delete($array)) {
            return true;
        }
        return false;
    }
}