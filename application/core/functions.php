<?php
function out($outString)
{
    echo $outString . PHP_EOL;
}

function in($inString, $handle)
{
    out($inString);
    return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $task)
{
    $day = $week->getDayByName($dayName);
    $day->addTask($task);
    $week->setDay($day);
}

function checkConnectivityDB()
{
    try {
        $storageFactory = new StorageFactory();
        $conn = $storageFactory->getStorage('mysql');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->errorInfo();
        $conn = null;
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function displayDay($day)
{
    out("On " . $day->getName() . " " . count($day->getTasks()) . " task(s) found:");
}

function displayTask($number, $task)
{
    out("\t" . ($number + 1) . ") Name: " . $task->getName());
    out("\t   Priority: " . $task->getPriority());
}

function getValidDay($handle, $week)
{
    do {
        $day = in("Enter the day of the week:", $handle);
        $validDay = $week->getDayByName($day);
        if ($validDay == null) out("Incorrect name, please retry.");
    } while ($validDay == null);
    return $validDay;
}

function createTask($handle, $validDay, $week, $storage)
{
    do {
        $taskName = in("Enter the name of the task:", $handle);
        $taskPriority = in("Enter the priority of the task:", $handle);
        $task = new Task($taskName);
        $task->setPriority($taskPriority);
        $validDay->addTask($task);
        if ($storage->getType() == 'mysql') {
            $storage->createTask($validDay, $task);
        } else {
            $storage->save($week);
        }
        $continue = in("Other task (Y/N):", $handle);
    } while (strtolower($continue) == 'y');
    $week->setDay($validDay);
}

function updateTask($handle, $validDay, $week, $storage)
{
    do {
        $taskNumber = in("Enter the number of the task:", $handle);
        $oldTask = $validDay->getTasks()[$taskNumber - 1];
        $taskNewName = in("Enter the new name of the task:", $handle);
        $taskNewPriority = in("Enter the new priority of the task:", $handle);
        $newTask = new Task($taskNewName);
        $newTask->setPriority($taskNewPriority);
        $validDay->updateTask($taskNumber, $newTask);
        if ($storage->getType() == 'mysql') {
            $storage->updateTask($validDay, $newTask, $oldTask);
        } else {
            $storage->save($week);
        }
        $continue = in("Update Other task (Y/N):", $handle);
    } while (strtolower($continue) == 'y');
    $week->setDay($validDay);
}

function deleteTask($handle, $validDay, $week, $storage)
{
    do {
        $taskNumber = in("Delete task number :", $handle);
        $task = $validDay->getTasks()[$taskNumber - 1];
        $validDay->deleteTask($taskNumber);
        if ($storage->getType() == 'mysql') {
            $storage->deleteTask($validDay, $task);
        } else {
            $storage->save($week);
        }
        if (count($validDay->getTasks()) > 0) $continue = in("Delete Other task (Y/N):", $handle);
        else $continue = 'n';
    } while (strtolower($continue) == 'y');
    $week->setDay($validDay);
}

function checkEmpty($week)
{
    foreach ($week->getDays() as $dayValue) {
        if ($dayValue->getTasks() != null) {
            return true;
        }
    }
    return false;
}

function syncDbAndFile($dbWeek, $dbStorage)
{
    $storageFactory = new StorageFactory();
    $fileStorage = $storageFactory->getStorage('file');
    $fileWeek = $fileStorage->load();
    $mergedWeek = array_merge((array)$fileWeek, (array)$dbWeek);

    $week = new Week();
    foreach ($mergedWeek as $arrayValue) {
        //Initial Array
        foreach ($arrayValue as $day) {
            $week->setDay($day);
        }
    }
    $fileStorage->save($week);
    $dbStorage->save($week);
}