<?php
function out(string $outString){
	echo $outString . PHP_EOL . PHP_EOL;
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