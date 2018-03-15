<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10-03-18
 * Time: 18:24
 */
?>

<h1>Create or update a task</h1>
<br>
<form method="POST" class="form-control" >
    <p > Task number </p>
    <p ><input type="text" name="taskId"> </p>
    <input type="radio" name="day" value="Monday"> Monday<br>
    <input type="radio" name="day" value="Tuesday"> Tuesday<br>
    <input type="radio" name="day" value="Wednesday"> Wednesday<br>
    <input type="radio" name="day" value="Thursday"> Thursday<br>
    <input type="radio" name="day" value="Friday"> Friday<br>
    <input type="radio" name="day" value="Saturday"> Saturday<br>
    <input type="radio" name="day" value="Sunday"> Sunday<br>
    <input type="submit" value="Update day" formaction="?controller=task&action=update&updateAction=day">
    <p > Name </p>
    <input type="text" name="taskName">
    <input type="submit" value="Update name" formaction="?controller=task&action=update&updateAction=name">
    <p > Priority </p>
    <input type="text" name="taskPriority">
    <input type="submit" value="Update priority" formaction="?controller=task&action=update&updateAction=priority">
    <p > Description </p>
    <input type="text" name="taskDescription">
    <input type="submit" value="Update description" formaction="?controller=task&action=update&updateAction=description">
    <p ></p>
    <input type="submit" value="Save your new task" formaction="?controller=task&action=save" class="btn btn-primary">
</form>