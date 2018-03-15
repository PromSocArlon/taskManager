<?php

require_once 'application/core/Storage/StorageMysql.php';

class StorageFactory
{
    public static function getStorage($type)
    {

        try {
            switch (strtolower($type)) {
                case 'file':
                    $storage = new StorageFile();
                    break;
                case 'mysql':
                    $storage = new StorageMysql();
                    break;
                default:
                    throw new Exception("\"" . $type . "\" is not a valid type of database.");
            }
            return $storage;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}