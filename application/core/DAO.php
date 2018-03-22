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
    protected $connection;

    public function __construct($type = 'mysql')
    {
        $this->connection = Storage\StorageFactory::getStorage($type);
    }

    abstract protected function objectToArray($array);

    public function create()
    {
        $array = $this->objectToArray(func_get_args());

        if ($this->connection->create($array)) {
            return true;
        }
        return false;
    }

    public function read()
    {
        $array = $this->objectToArray(func_get_args());

        $result = Storage\StorageFactory::getStorage("mysql")->read($array);

        if (!empty($result)) {
            return $result;
        }
        return false;
    }


    public function update()
    {
        $array = $this->objectToArray(func_get_args());

        if (Storage\StorageFactory::getStorage("mysql")->update($array)) {
            return true;
        }
        return false;
    }


    public function delete()
    {
        $array = $this->objectToArray(func_get_args());
        if (Storage\StorageFactory::getStorage("mysql")->delete($array)) {
            return true;
        }
        return false;
    }
}
