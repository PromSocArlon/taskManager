<?php
require_once 'includes/classes/Task.php';

$task = new Task();
$task->setName('Super task');


echo $task->getName();