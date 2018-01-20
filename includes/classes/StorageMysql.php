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

    public function query($sql) {
        $result = $this->mysqlConnect->query($sql);
        $this->mysqlConnect->errorInfo();
        return $result;
    }

    public function closeConnection()
    {
        $mysqlConnect = null;
    }
}