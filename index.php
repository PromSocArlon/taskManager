<?php
require_once 'application/core/functions.php';
require_once 'application/core/configuration.php';
require_once 'application/models/Storage/StorageFile.php';
require_once 'application/models/Storage/StorageMysql.php';
require_once 'application/models/Entity/task.php';
require_once 'application/models/Entity/week.php';
require_once 'application/models/Entity/day.php';

$handle = fopen("php://stdin", "r");

// Select Storage Type
do {
    $storageType = strtolower(in("Select type of storage, \"M\" for MySQL / \"F\" for file:", $handle));
    if ($storageType == "m") {
        if (checkConnectivityDB("mysql", $mysqlHost, $mysqlPort, $mysqlDb, $mysqlUser, $mysqlPassword)) {
            out("Storage set to MySQL.");
            $storage = new StorageMysql("mysql", $mysqlHost, $mysqlPort, $mysqlDb, $mysqlUser, $mysqlPassword);
        } else {
            out("Unable to connect to mysql.");
        }
    } else if ($storageType == "f") {
        out("Storage set to File.");
        $storage = new StorageFile();
    }
} while (!isset($storage));

$week = $storage->load();
if ($storage->getType() == "mysql") syncDbAndFile($week, $storage);

echo PHP_EOL;
out("Welcome in your taskManager:");
out("----------------------------");
echo PHP_EOL;

if (checkEmpty($week)) {
    foreach ($week->getDays() as $dayValue) {
        if ($dayValue->getTasks() != null) {
            displayDay($dayValue);
            foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
                displayTask($taskNumber, $taskValue);
            }
            echo PHP_EOL;
        }
    }
} else {
    out("Empty data, create task before.");
}

do {
    $action = in("\"C\" to create, \"R\" to read, \"U\" to update, \"D\" to delete, \"S\" to stop", $handle);
    switch (strtolower($action)) {
        case "c":
            do {
                $validDay = getValidDay($handle, $week);
                createTask($handle, $validDay, $week, $storage);
                $continue = in("Other day (Y/N):", $handle);
            } while (strtolower($continue) == 'y');
            break;
        case "r":
            if (checkEmpty($week)) {
                $validDay = getValidDay($handle, $week);
                $dayValue = $storage->readTask($validDay);
                displayDay($dayValue);
                foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
                    displayTask($taskNumber, $taskValue);
                }
                echo PHP_EOL;
            } else {
                out("Empty data, create task before.");
            }
            break;
        case "u":
            if (checkEmpty($week)) {
                do {
                    $validDay = getValidDay($handle, $week);
                    updateTask($handle, $validDay, $week, $storage);
                    $continue = in("Update other day (Y/N):", $handle);
                } while (strtolower($continue) == 'y');
            } else {
                out("Empty data, create task before.");
            }
            break;
        case "d":
            if (checkEmpty($week)) {
                do {
                    $validDay = getValidDay($handle, $week);
                    deleteTask($handle, $validDay, $week, $storage);
                    $continue = in("Delete task in other day (Y/N):", $handle);
                } while (strtolower($continue) == 'y');
            } else {
                out("Empty data, create task before.");
            }
            break;
        case "s":
            if ($storage->getType() == "mysql") {
                syncDbAndFile($week, $storage);
                $storage->closeConnection();
            }
            out("Goodbye");
    }

} while (strtolower($action) != 's');