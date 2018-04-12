<?php
namespace app\core\Storage;
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
                    throw new \RuntimeException("\"" . $type . "\" is not a valid type of database.",500);
            }
            return $storage;
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}