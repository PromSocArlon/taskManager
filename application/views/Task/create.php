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
        <label for="number">Number:</label>
        <input type="text" class="form-control" placeholder="Task Number">
    </div>
    <div class="form-group">
        <label for="day">Select the day:</label>
        <br>
        <input type="radio" name="day" value="Monday"> Monday<br>
        <input type="radio" name="day" value="Tuesday"> Tuesday<br>
        <input type="radio" name="day" value="Wednesday"> Wednesday<br>
        <input type="radio" name="day" value="Thursday"> Thursday<br>
        <input type="radio" name="day" value="Friday"> Friday<br>
        <input type="radio" name="day" value="Saturday"> Saturday<br>
        <input type="radio" name="day" value="Sunday"> Sunday<br>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="priority">Priority:</label>
        <input type="text" class="form-control" placeholder="Priority">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" placeholder="description">
    </div>

    <button class="btn btn-primary" type="submit">Create</button>
</form>

<?php

include 'application\views\_shared\footer.php';

