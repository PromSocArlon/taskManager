<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 20/01/2018
 * Time: 11:56
 */

require_once 'week.php';
require_once 'day.php';

class Storage
{
    /**
     * Represents the file in which to store/retrieve the data.
     *
     * @var string
     */
    private $filename;

    /**
     * Storage constructor.
     */
    public function __construct() {
        $this->filename = 'data.txt';
    }

    /**
     * Load all the tasks from file to memory.
     *
     * @return Week
     */
    public function load() {
        $week = new Week();

        // Load the file data into an array
        // One line =  one array element
        $data = file($this->filename,  FILE_IGNORE_NEW_LINES );

        $i = 0;
        while ($i < sizeof($data)) {

            // If the current value is equal to a day name
            if(in_array($data[$i], Day::getAllDaysName())) {
                $day = new Day($data[$i]);
                $i++;
                continue;
            } else {
                // If not, it'a a task
                $task = new Task($data[$i]);
                $task->setPriority($data[$i+1]);
                $day->addTask($task);
                $i++;
            }

            $week->setDay($day);

            $i++;
        }
        return $week;
    }

    /**
     * Save all the tasks from memory to file.
     *
     * @param Week $week
     * @return void
     */
    public function save($week) {

        // Empty file
        file_put_contents($this->filename, "");

        // Put the day name followed by all the tasks for the given day
        foreach($week->getDays() as $day) {
            file_put_contents($this->filename, $day->getName() . PHP_EOL, FILE_APPEND);
            foreach($day->getTasks() as $task) {
                file_put_contents($this->filename, $task->getName() . PHP_EOL, FILE_APPEND);
                file_put_contents($this->filename, $task->getPriority() . PHP_EOL, FILE_APPEND);
            }
        }
    }
}