<?php

require_once 'application/models/Entity/week.php';
require_once 'application/models/Entity/day.php';
require_once 'application/models/Storage/Storage.php';

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

    public function load()
    {
        $week = new Week();

        // Load the file data into an array
        // One line = one array element
        $data = file($this->connection, FILE_IGNORE_NEW_LINES);

        $i = 0;
        while ($i < sizeof($data)) {

            // If the current value is equal to a day name
            if (in_array($data[$i], Day::getAllDaysName())) {
                $day = new Day($data[$i]);
                $i++;
                continue;
            }
            // If not, it'a a task
            $task = new Task($data[$i]);
            $task->setPriority($data[$i + 1]);
            $day->addTask($task);

            $week->setDay($day);

            $i += 2;
        }
        return $week;
    }
    
    public function save($week)
    {
        // Empty file
        file_put_contents($this->connection, "");

        // Put the day name followed by all the tasks for the given day
        foreach ($week->getDays() as $day) {
            file_put_contents($this->connection, $day->getName() . PHP_EOL, FILE_APPEND);
            foreach ($day->getTasks() as $task) {
                file_put_contents($this->connection, $task->getName() . PHP_EOL, FILE_APPEND);
                file_put_contents($this->connection, $task->getPriority() . PHP_EOL, FILE_APPEND);
            }
        }
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