<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:01
 */

require_once '../Entity/task.php';

class TaskDAO extends DAO
{
    /**
     * Get all the users.
     *
     * @return array
     */
    public function getAll()
    {
        $result = StorageFactory::getStorage()->query("SELECT * FROM tbl_task");
        if (sizeof($result) > 0)
        {
            return $result;
        }

        return null;
    }

    /**
     * Get a specific Task.
     *
     * @param Task
     * @return Task
     */
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

    /**
     * Update the specific Task.
     *
     * @param Task
     * @return boolean
     */
    public function update(Task $task)
    {
        if (StorageFactory::getStorage()->update($task))
        {
            return true;
        }
        return false;
    }

    /**
     * Delete the specific Task
     *
     * @param Task
     * @return boolean
     */
    public function delete(Task $task)
    {
        if (StorageFactory::getStorage()->delete($task))
        {
            return true;
        }
        return false;
    }

    /**
     * Create a new Task
     *
     * @param Task
     * @return boolean
     */
    public function create(Task $task)
    {

        if (StorageFactory::getStorage()->create($task))
        {
            return true;
        }
        return false;
    }
}