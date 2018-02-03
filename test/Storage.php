<?php

require_once realpath('application/models/Entity/week.php');
require_once realpath('application/models/Entity/day.php');
require_once realpath('application/models/Entity/task.php');
require_once realpath('application/models/Storage/StorageMysql.php');


// Phil, test sauvegarde generique.
$storage = new StorageMysql();

$task0 = new Task();
$task0->setName('test0');
$task0->setPriority(0);
$task1 = new Task();
$task1->setName('test1');
$task1->setPriority(1);
$day0 = new Day('monday');
$day1 = new Day('sunday');
$day0->addTask($task0);
$day0->addTask($task1);
$day1->addTask($task0);
$day1->addTask($task1);
$week = new Week();
$week->setDay($day0);

// Create test
$validTableCreate = [];
$daysArray = $week->getDays();
foreach ($daysArray as $dayKey => $dayObject) {
    $tasksObject = $dayObject->getTasks();

    foreach ($tasksObject as $taskKey => $taskValue) {
        $taskArray = (array)$taskValue;

        foreach ($taskArray as $key => $value) {
            $validTableCreate['tasks'][$taskKey][str_replace('Task', '', $key)] = $value;
        }
        $validTableCreate['tasks'][$taskKey]['day'] = $dayKey + 1;

    }

}


//print_r($storage->create($validTableCreate));

// Read test
$validTableRead['tasks'][0]['day'] = '1';
//print_r($storage->read($validTableRead));

// Delete test
$validTableDelete['tasks'][0]['day'] = '1';
//print_r($storage->delete($validTableDelete));

// Update test

$validTableUpdate['tasks'][0]['get']['name'] = "Test999";
$validTableUpdate['tasks'][0]['set']['day'] = "2";
//print_r($storage->update($validTableUpdate));


$route = new route();
$route->routeQuery();



if (!empty($_GET['page']) AND is_file(''))


?>
