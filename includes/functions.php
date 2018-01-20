<?php
function out(string $outString){
    echo $outString . PHP_EOL;
}

function in(string $inString, $handle) {
    out($inString);
    return trim(fgets($handle));
}

function addTaskToDayOfWeek($week, $dayName, $task){
    $day = $week->getDayByName($dayName);
    $day->addTask($defaultTask);
    $week->setDay($day);
}

function displayDay($day) {
    echo "On " . $day->getName() . " " . count($day->getTasks()) . " task(s) found:" . PHP_EOL;
}

function displayTask($number, $task) {
    echo "\t" . ($number+1) . ") Name: " . $task->getName() . PHP_EOL;
    echo "\t   Priority: " . $task->getPriority() . PHP_EOL;
}