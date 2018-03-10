<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 22-02-18
 * Time: 23:17
 */
?>
<form method="POST" action="?controller=task&action=createANDupdate">
    <input type="submit" value="Create/Update">
</form>
<form method="POST">
    <input type="radio" name="day" value="Monday"> Monday<br>
    <input type="radio" name="day" value="Tuesday"> Tuesday<br>
    <input type="radio" name="day" value="Wednesday"> Wednesday<br>
    <input type="radio" name="day" value="Thursday"> Thursday<br>
    <input type="radio" name="day" value="Friday"> Friday<br>
    <input type="radio" name="day" value="Saturday"> Saturday<br>
    <input type="radio" name="day" value="Sunday"> Sunday<br>
    <input type="text" name="taskName" placeholder="Task Name" >
    <input type="submit" value="Delete task" formaction="?controller=task&action=delete">
    <input type="submit" value="View task" formaction="?controller=task&action=read">
</form>

