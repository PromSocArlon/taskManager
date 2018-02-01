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


$tableau['task']['sunday'][0]['name'] = 'test';
$tableau['task']['sunday'][0]['priority'] = 5;


$validTableToSave = [];
$daysArray = $week->getDays();
foreach ($daysArray as $dayKey => $dayObject) {
    $tasksObject = $dayObject->getTasks();

    foreach ($tasksObject as $taskKey => $taskValue) {
        $taskArray = (array)$taskValue;

        foreach ($taskArray as $key => $value) {
            $validTableToSave['tasks'][$taskKey][str_replace('Task', '', $key)] = $value;
        }
        $validTableToSave['tasks'][$taskKey]['day'] = $dayKey + 1;

    }

}

print_r($storage->create($validTableToSave));

//print_r($validTableToSave);

/*Result of object week to array

    Array
    (
        [Weekdays] => Array
        (
            [0] => Day Object
(
    [name:Day:private] => monday
[tasks:Day:private] => Array
(
    [0] => Task Object
(
    [name:Task:private] => Test0
[priority:Task:private] => 0
                    [description:Task:private] =>
                    [status:Task:private] =>
                    [subtasks:Task:private] =>
                    [storage:Task:private] =>
                )

                [1] => Task Object
(
    [name:Task:private] => Test1
[priority:Task:private] => 1
                    [description:Task:private] =>
                    [status:Task:private] =>
                    [subtasks:Task:private] =>
                    [storage:Task:private] =>
                )

            )

        )

        [1] => Day Object
(
    [name:Day:private] => tuesday
[tasks:Day:private] => Array
(
)

        )

        [2] => Day Object
(
    [name:Day:private] => wednesday
[tasks:Day:private] => Array
(
)

        )

        [3] => Day Object
(
    [name:Day:private] => thursday
[tasks:Day:private] => Array
(
)

        )

        [4] => Day Object
(
    [name:Day:private] => friday
[tasks:Day:private] => Array
(
)

        )

        [5] => Day Object
(
    [name:Day:private] => saturday
[tasks:Day:private] => Array
(
)

        )

        [6] => Day Object
(
    [name:Day:private] => sunday
[tasks:Day:private] => Array
(
)

        )

    )

)*/

?>
