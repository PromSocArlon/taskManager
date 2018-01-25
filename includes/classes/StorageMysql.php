<?php

class StorageMysql
{
    private $mysqlConnect;
    private $type;

    public function __construct($type, $host, $port, $db, $user, $password)
    {
        try {
            $this->mysqlConnect = new PDO($type . ":host=" . $host . ";port=" . $port . ";dbname=" . $db, $user, $password);
            $this->mysqlConnect->errorInfo();
            $this->type = "mysql";
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            die();
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function createTask($day, $task)
    {
        try {
            $sql = "
            INSERT INTO tbl_task 
            (
                Id,
                Name,
                Priority,
                Day
            )
            VALUES
            (
                NULL, " .
                "'" . $task->getName() . "'," .
                "'" . $task->getPriority() . "',
                (SELECT Id FROM tbl_day WHERE Name='" . $day->getName() . "')
            )";
            $this->mysqlConnect->query($sql);
            $this->mysqlConnect->errorInfo();
            return true;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function readTask($day)
    {
        try {
            $sql = "
                SELECT Name, Priority
                FROM tbl_task
                WHERE Day = (SELECT Id FROM tbl_day WHERE Name='" . $day->getName() . "')
            ";
            $data = $this->mysqlConnect->query($sql);
            $this->mysqlConnect->errorInfo();

            $day = new Day($day->getName());
            foreach ($data as $value) {
                $task = new Task($value['Name']);
                $task->setPriority($value['Priority']);
                $day->addTask($task);
            }

            return $day;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function updateTask($day, $newTask, $oldTask)
    {
        try {
            $sql = "
                UPDATE tbl_task 
                SET
                    Name = '" . $newTask->getName() . "',
                    Priority = '" . $newTask->getPriority() . "'
                WHERE Name = '" . $oldTask->getName() . "' AND Day = (SELECT Id FROM tbl_day WHERE Name='" . $day->getName() . "')
            ";
            $this->mysqlConnect->query($sql);
            $this->mysqlConnect->errorInfo();
            return true;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function deleteTask($day, $task)
    {
        try {
            $sql = "DELETE 
                FROM tbl_task 
                WHERE Name = '" . $task->getName() . "' AND Day = (SELECT Id FROM tbl_day WHERE Name='" . $day->getName() . "')
            ";
            $this->mysqlConnect->query($sql);
            $this->mysqlConnect->errorInfo();
            return true;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function showTables()
    {
        foreach ($this->mysqlConnect->query('SHOW TABLES') as $row) {
            print_r($row);
        }
    }

    public function load()
    {
        $week = new Week();

        $sql = "
          SELECT tbl_day.Name as day, tbl_task.Name as task, tbl_task.Priority as priority 
          FROM tbl_task 
          INNER JOIN tbl_day on tbl_task.Day = tbl_day.Id
        ";
        $data = $this->mysqlConnect->query($sql);

        foreach ($data as $value) {
            $dataAssoc[$value['day']][] = array($value['task'], $value['priority']);
        }

        foreach ($dataAssoc as $day => $value) {
            $day = new Day($day);
            foreach ($value as $taskValue) {
                $task = new Task($taskValue[0]);
                $task->setPriority($taskValue[1]);
                $day->addTask($task);
            }
            $week->setDay($day);
        }

        return $week;
    }

    public function save($week)
    {
        try {
            $sql = "TRUNCATE TABLE tbl_task";
            $this->mysqlConnect->query($sql);
            $this->mysqlConnect->errorInfo();

            foreach ($week->getDays() as $day) {
                foreach ($day->getTasks() as $task) {
                    $this->createTask($day, $task);
                }
            }

            return true;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function closeConnection()
    {
        $mysqlConnect = null;
    }
}