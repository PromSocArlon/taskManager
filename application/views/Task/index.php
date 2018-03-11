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
    <input type="text" name="taskId" placeholder="Task Number" >
    <input type="submit" value="Delete task" formaction="?controller=task&action=delete">
    <input type="submit" value="View task" formaction="?controller=task&action=read">
</form>

