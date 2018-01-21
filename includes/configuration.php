<?php
$mysqlHost = "127.0.0.1";
$mysqlDb = "taskManager";
$mysqlUser = "taskManager";
$mysqlPassword = "taskManager";

$mysqlActive = false;

if (in_array('mysql', PDO::getAvailableDrivers()) and $mysqlActive) {
    out("PDO does support MySQL. Switch to MySQL database");
    $storage = new StorageMysql($mysqlHost, $mysqlDb, $mysqlUser, $mysqlPassword);
} else {
    out("PDO does not support MySQL. Switch to local file");
    $storage = new Storage();
}
?>