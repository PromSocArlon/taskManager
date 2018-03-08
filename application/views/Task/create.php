<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01-03-18
 * Time: 11:30
 */
?>
<form method="POST" action="index.php?controller=task&action=save">
    <input type="radio" name="day" value="Monday"> Monday<br>
    <input type="radio" name="day" value="Tuesday"> Tuesday<br>
    <input type="radio" name="day" value="Wednesday"> Wednesday<br>
    <input type="radio" name="day" value="Thursday"> Thursday<br>
    <input type="radio" name="day" value="Friday"> Friday<br>
    <input type="radio" name="day" value="Saturday"> Saturday<br>
    <input type="radio" name="day" value="Sunday"> Sunday<br>
    <p > Name </p>
    <input type="text" name="taskName">
    <p > Priority </p>
    <input type="text" name="taskPriority">
    <p > Description </p>
    <input type="text" name="taskDescription">
    <p ></p>
    <input type="submit" name="button" value="Save">
</form>