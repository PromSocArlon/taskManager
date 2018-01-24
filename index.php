<?php
require_once 'application/core/functions.php';
require_once 'application/models/task.php';
require_once 'application/models/week.php';
require_once 'application/models/day.php';


$handle = fopen("php://stdin","r");

$week = new Week();
$defaultTask = new Task('faire le menage');


$sunday = $week->getDayByName(Day::SUNDAY);
$oldTasks = $sunday->addTask($defaultTask);
$week->setDay($sunday);


$end = 0;
do{	
	$dayName = in("\nWeekday:", $handle);
	if($dayName == '0'){
		echo "\nGood bye" . PHP_EOL;
		$end = 1;
		continue;
	}
	$day = $week->getDayByName($dayName);
	if(empty($day)){
		echo "\nWrong Weekday!!!!!!!!!!!!!" . PHP_EOL;
		continue;
	}
	$newTask = new Task(in("Task: ", $handle));
	$day->addTask($newTask);
	$week->setDay($day);
	
}while(!$end);
print_r($week->getDays());
