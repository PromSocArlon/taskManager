<?php
namespace app\core\Storage;
class StorageFactory
{
    public static function getStorage($type)
    {
        switch (strtolower($type)) {
            case 'file':
                $storage = new StorageFile();
                break;
            case 'mysql':
                $storage = new StorageMysql();
                break;
            default:
                if (checkConnectivityDB()) {
                    $storage = new StorageMysql();
                } else {
                    $storage = new StorageFile();
                }
        }
        return $storage;
    }
}