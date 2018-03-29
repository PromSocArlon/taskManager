<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 19/03/2018
 * Time: 14:22
 */

include 'application\views\_shared\header.php';
?>
    <h1>Task</h1>
    <hr>
    <h3>Create</h3>

<br>

<form method="POST" action="?controller=task&action=save">
    <input type="text" hidden name="id" value="0">
    <div class="form-group">
        <label for="taskName">Name:</label>
        <input type="text" class="form-control" placeholder="Name" name="name" required>
    </div>
    <div class="form-group">
        <label for="taskPriority">Priority:</label>
        <input type="text" class="form-control" placeholder="Priority" name="priority" required>
    </div>
    <div class="form-group">
        <label for="taskDescription">Description:</label>
        <input type="text" class="form-control" placeholder="description" name="description" required>
    </div>

    <button class="btn btn-primary" type="submit">Create</button>
</form>

<?php

include 'application\views\_shared\footer.php';

