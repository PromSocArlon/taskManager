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

function checkConnectivity($type, $host, $port, $db, $user, $password)
{
    try {
        $conn = new PDO($type . ":host=" . $host . ";port=" . $port . ";dbname=" . $db, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn = null;
        return true;
    } catch (Exception $e) {
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
        $taskOldName = $validDay->getTasks()[$taskNumber-1]->getName();
        $taskNewName = in("Enter the new name of the task:", $handle);
        $taskNewPriority = in("Enter the new priority of the task:", $handle);
        $newTask = new Task($taskNewName);
        $newTask->setPriority($taskNewPriority);
        $validDay->updateTask($taskNumber, $newTask);
        if ($storage->getType() == 'mysql') {
            $storage->updateTask($validDay, $newTask, $taskOldName);
        } else {
            $storage->save($week);
        }
        $continue = in("Update Other task (Y/N):", $handle);
    } while (strtolower($continue) == 'y');
    $week->setDay($validDay);
}