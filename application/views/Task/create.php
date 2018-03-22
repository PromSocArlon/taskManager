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

    <div class="form-group">
        <label for="taskId">Number:</label>
        <input type="text" class="form-control" placeholder="Task Number" name="id" required>
    </div>
    <div class="form-group">
        <label for="day">Select the day:</label>
        <br>
        <input type="radio" name="day" value="Monday" checked> Monday<br>
        <input type="radio" name="day" value="Tuesday"> Tuesday<br>
        <input type="radio" name="day" value="Wednesday"> Wednesday<br>
        <input type="radio" name="day" value="Thursday"> Thursday<br>
        <input type="radio" name="day" value="Friday"> Friday<br>
        <input type="radio" name="day" value="Saturday"> Saturday<br>
        <input type="radio" name="day" value="Sunday"> Sunday<br>
    </div>
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

