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
    $day->addTask($defaultTask);
    $week->setDay($day);
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

function setTaskValue($task)
{

    return $task;
}