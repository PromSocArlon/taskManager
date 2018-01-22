<?php
require_once 'includes/functions.php';
require_once 'includes/configuration.php';
require_once 'includes/classes/Storage.php';
require_once 'includes/classes/StorageMysql.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';

$handle = fopen("php://stdin", "r");

// Select Storage Type
do {
    $storageType = strtolower(in("Select type of storage, \"M\" for MySQL / \"F\" for file:", $handle));
    if ($storageType == "m") {
        if (checkConnectivity("mysql", $mysqlHost, $mysqlPort, $mysqlDb, $mysqlUser, $mysqlPassword)) {
            out("Storage set to MySQL.");
            $storage = new StorageMysql("mysql", $mysqlHost, $mysqlPort, $mysqlDb, $mysqlUser, $mysqlPassword);
        } else {
            out("Unable to connect to mysql.");
        }
    } else if ($storageType == "f") {
        out("Storage set to File.");
        $storage = new Storage();
    }
} while (!isset($storage));

$week = new Week();
$week = $storage->load();

echo PHP_EOL;
out("Welcome in your taskManager:");
out("----------------------------");
echo PHP_EOL;

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
            foreach ($week->getDays() as $dayValue) {
                if ($dayValue->getTasks() != null) {
                    displayDay($dayValue);
                    foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
                        displayTask($taskNumber, $taskValue);
                    }
                    echo PHP_EOL;
                }
            }
            break;
        case "u":
            do {
                $validDay = getValidDay($handle, $week);
                updateTask($handle, $validDay, $week, $storage);
                $continue = in("Update other day (Y/N):", $handle);
            } while (strtolower($continue) == 'y');
            break;
        case "d":
            echo "D";
            break;
        case "s":
            out("Goodbye");
    }

} while (strtolower($action) != 's');