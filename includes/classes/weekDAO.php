<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 20/01/2018
 * Time: 11:17
 */

interface WeekDAO
{

    /**
     * Get all the tasks. We store only a week for now.
     *
     * @return array
     */
    public function getWeek();

    /**
     * Get all the tasks for the given day.
     *
     * @param String $day
     * @return array
     */
    public function getTasksByDay($day);

    /**
     * Add the given task to the given day.
     *
     * @param String $day, Task $task
     * @return void
     */
    public function addTask($day, $task);

    /**
     * Add the given task to the given day.
     *
     * @param String $day, Task $task
     * @return void
     */
    public function updateTask($day, $task);

    /**
     * Delete the given task to the given day.
     * Return true if deleted, else false.
     *
     * @param String $day, Task $task
     * @return Boolean
     */
    public function deleteTask($day, $task);
}