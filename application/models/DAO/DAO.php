<?php

// namespace TasMan;

require_once 'application/core/Storage/StorageFactory.php';
require_once 'application/core/Storage/StorageMysql.php';
require_once 'application/core/Storage/StorageFile.php';

abstract class DAO
{
    /**
     * @var StorageFile|StorageMysql
     */
    protected $connection;

    /**
     * DAO constructor.
     * @param string $type
     */
    public function __construct($type = 'mysql')
    {
        $this->connection = StorageFactory::getStorage($type);
    }

    /**
     * @param $object
     * @return mixed
     */
    abstract protected function objectToArray($object);

    /**
     * @param $object
     * @return bool
     */
    public function create($object)
    {
        $array = $this->objectToArray($object);

        if ($this->connection->create($array)) {
            return true;
        }
        return false;
    }

    /**
     * @param null $object
     * @return bool|mixed
     */
    public function read($object = NULL)
    {
        $array = $this->objectToArray($object);

        $result = $this->connection->read($array);

        if (!empty($result)) {
            return $result;
        }
        return false;
    }

    /**
     * @param $object
     * @return bool
     */
    public function update($object)
    {
        $array = $this->objectToArray($object);

        if ($this->connection->update($array)) {
            return true;
        }
        return false;
    }

    /**
     * @param $object
     * @return bool
     */
    public function delete($object)
    {
        $array = $this->objectToArray($object);
        if ($this->connection->delete($array)) {
            return true;
        }
        return false;
    }
}