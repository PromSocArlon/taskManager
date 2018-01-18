<?php
require_once 'includes/classes/task.php';

$task = new Task();
$task->setName('Super task');


echo $task->getName();