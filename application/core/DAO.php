<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:01
 */

namespace app\core;

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
        $this->connection = Storage\StorageFactory::getStorage($type);
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
    public function read($object = null)
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

    /**
     * @param String $table
     * @return int
     */
    public function getLastId(String $table)
    {
        $array = $this->connection->getLastId($table);
        return $array['id'];
    }
}