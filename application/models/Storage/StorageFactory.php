<?php

class StorageFactory
{
    public function getStorage($type)
    {
        switch ($type) {
            case 'file':
                $storage = new StorageFile();
                break;
            case 'mysql':
                $storage = new StorageMysql();
            default:
                throw new Exception('Unknown database');
        }
        return $storage;
    }
}