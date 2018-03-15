<?php
namespace app\core\Storage;
class StorageFile extends Storage
{
    protected $type = 'file';

    public function __construct()
    {
        $config = parse_ini_file("config.ini");
        $this->connection = $config['fileName'];
    }

    public function __destruct()
    {
        // TODO: Fermeture du fichier.
    }

    /**
     * Load data from file to create a Week object.
     *
     * @return Week
     */
    public function load()
    {

    }

    /**
     * Save a week array to a file.
     *
     * @param Week
     */
    public function save()
    {

    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function read(array $data)
    {
        // TODO: Implement read() method.
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(array $data)
    {
        // TODO: Implement delete() method.
    }

}