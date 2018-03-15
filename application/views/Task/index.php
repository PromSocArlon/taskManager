<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 22-02-18
 * Time: 23:17
 */
?>

<h1>Task</h1>
<br><br>
<hr>
<div class="row">
    <div class="col-sm">
        <form method="POST" action="?controller=task&action=createANDupdate">
            <input type="submit" value="Create/Update" class="btn btn-primary">
        </form>
    </div>

    <div class="col-sm">
        <form method="POST" class="form-inline">
            <input type="text" name="taskId" placeholder="Task Number" class="form-control">
            <input type="submit" value="View task" formaction="?controller=task&action=read" class="btn btn-primary">
            <input type="submit" value="Delete task" formaction="?controller=task&action=delete" class="btn btn-danger">
        </form>
    </div>
</div>
