<?php
require_once 'includes/functions.php';
require_once 'includes/classes/Storage.php';
require_once 'includes/classes/StorageMysql.php';
require_once 'includes/configuration.php';
require_once 'includes/classes/task.php';
require_once 'includes/classes/week.php';
require_once 'includes/classes/day.php';


$handle = fopen("php://stdin", "r");

$week = new Week();
$week = $storage->load();

echo PHP_EOL;
out("Welcome in your taskManager:");
out("----------------------------");
echo PHP_EOL;


do {

    // Display Week
    foreach ($week->getDays() as $dayValue) {
        if ($dayValue->getTasks() != null) {
            displayDay($dayValue);
            foreach ($dayValue->getTasks() as $taskNumber => $taskValue) {
                displayTask($taskNumber, $taskValue);
            }
            echo PHP_EOL;
        }
    }

    $action = in("\"C\" to create, \"R\" to read, \"U\" to update, \"D\" to delete, \"S\" to save", $handle);

    switch (strtolower($action)) {
        case "c":
            do {
                do {
                    $day = in("Enter the day of the week:", $handle);
                    $validDay = $week->getDayByName($day);
                    if ($validDay == null) out("Incorrect name, please retry.");
                } while ($validDay == null);
                do {
                    $taskName = in("Enter the name of the task:", $handle);
                    $task = new Task($taskName);
                    $taskPriority = in("Enter the priority of the task:", $handle);
                    $task->setPriority($taskPriority);
                    $validDay->addTask($task);
                    $continue = in("Other task (Y/N):", $handle);
                } while (strtolower($continue) == 'y');
                $week->setDay($validDay);
                $continue = in("Other day (Y/N):", $handle);
            } while (strtolower($continue) == 'y');
            break;
        case "r":
            echo "R";
            break;
        case "u":
            do {
                do {
                    $day = in("Enter the day of the week:", $handle);
                    $validDay = $week->getDayByName($day);
                    if ($validDay == null) out("Incorrect name, please retry.");
                } while ($validDay == null);
                do {
                    $taskNumber = in("Enter the number of the task:", $handle);
                    $taskName = in("Enter the new name of the task:", $handle);
                    $taskPriority = in("Enter the new priority of the task:", $handle);
                    $task = new Task($taskName);
                    $task->setPriority($taskPriority);
                    $validDay->updateTask($taskNumber, $task);
                    $continue = in("Update Other task (Y/N):", $handle);
                } while (strtolower($continue) == 'y');
                $week->setDay($validDay);
                $continue = in("Update other day (Y/N):", $handle);
            } while (strtolower($continue) == 'y');
            break;
        case "d":
            echo "D";
            break;
        case "s":
            $storage->save($week);
    }

} while (strtolower($action) != 's');

echo PHP_EOL;
out("Goodbye");


//$dbConnection->createTask('monday', 'test');
//$test = $dbConnection->query("SELECT Id FROM tbl_day WHERE Name='monday'");

//$dbConnection->showTables();


/*
// Save to file
$weekData = serialize($week);
$storageFile = fopen('storage.txt', 'r+');
fwrite($storageFile, $weekDataFile);
fclose($storageFile);

// Load from file
$weekDataFile = file_get_contents('storage.txt');
$week = unserialize($weekDataFile);
*/
