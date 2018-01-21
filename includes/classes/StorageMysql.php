<?php

class StorageMysql
{
    private $mysqlConnect;

    public function __construct($host, $database, $user, $password)
    {
        try {
            $this->mysqlConnect = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
            $this->mysqlConnect->errorInfo();
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            die();
        }
    }

    public function createTask($day, $name)
    {
        //INSERT INTO `tbl_task` (`Id`, `Name`, `Priority`, `Day`) VALUES (NULL, 'Dormir', '1', '1');
        try {
            $dayId = $this->mysqlConnect->query("SELECT Id FROM tbl_day WHERE Name=" . strtolower($day));
            print_r($dayId);
            $this->mysqlConnect->errorInfo();
            $this->mysqlConnect->query("INSERT INTO tbl_task(Id, Name, Priority, Day) VALUES('', " . $name . ", '', " . $dayId . ")");
            $this->mysqlConnect->errorInfo();
            return true;
        } catch (PDOException $e) {
            echo "Error !: " . $e->getMessage() . PHP_EOL;
            return false;
        }
    }

    public function readTask()
    {

    }

    public function updateTask()
    {

    }

    public function deleteTask()
    {

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

        $sql = "SELECT tbl_day.Name as day, tbl_task.Name as task, tbl_task.Priority as priority FROM tbl_task INNER JOIN tbl_day on tbl_task.Day = tbl_day.Id";
        $data = $this->mysqlConnect->query($sql);

        foreach ($data as $value) {
            $dataAssoc[$value['day']][] = array($value['task'],$value['priority']);
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

    public function closeConnection()
    {
        $mysqlConnect = null;
    }
}