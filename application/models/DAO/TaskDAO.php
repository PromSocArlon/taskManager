<?php

require_once '../application/models/Entity/week.php';
require_once '../application/models/Entity/task.php';
require_once '../application/models/DAO/DAO.php';
require_once '../application/core/Storage/StorageFactory.php';

class TaskDAO extends DAO
{
    private $connection;

    public function __construct($type)
    {
        $this->connection = StorageFactory::getStorage($type);
    }

    public function getAll()
    {
        $result = StorageFactory::getStorage()->query("SELECT * FROM tbl_task");
        if (sizeof($result) > 0)
        {
            return $result;
        }

        return null;
    }

    public function get(Task $task)
    {
        $result = StorageFactory::getStorage()->read($task);
        if (sizeof($result) > 0)
        {
            // Create a new Task object with the name
            return new Task($result[1]);
        }
        return null;
    }

    private function objectToArray(Task $task, $dayName)
    {
        $array = [];
        $dayKey = (new Week)->getDayIndex($dayName);

        $taskArray = (array)$task;

        foreach ($taskArray as $key => $value) {
            $array['tasks'][0][str_replace('Task', '', $key)] = $value;
        }
        $array['tasks'][0]['day'] = $dayKey + 1;

        return $array;
    }

    public function create(Task $task, $dayName)
    {
        $array = $this->objectToArray($task, $dayName);

        if ($this->connection->create($array))
        {
            return true;
        }

        return false;
    }

    public function read()
    {

    }

    public function update(Task $task)
    {
        //$validTableUpdate['tasks'][0]['get']['name'] = "Test999";
        //$validTableUpdate['tasks'][0]['set']['day'] = "2";

        if (StorageFactory::getStorage()->update($task))
        {
            return true;
        }
        return false;
    }

    /**
     * @param Task $task
     * @param string $dayName
     * @return bool
     */
    public function delete(Task $task, string $dayName)
    {
        $array = $this->objectToArray($task, $dayName);
        if (StorageFactory::getStorage("mysql")->delete($array))
        {
            return true;
        }
        return false;
    }
}