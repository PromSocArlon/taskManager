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
<h3>Edit</h3>

<br>

<form method="POST" action="?controller=task&action=update">

    <div class="form-group">
        <label for="taskId">Number:</label>
        <input type="text" class="form-control" value="<?php echo $data['id'] ?>" name="id" readonly>
    </div>
    <div class="form-group">
        <label for="day">Select the day:</label>
        <br>
        <input type="radio" name="day" value="Monday" <?php if ($data['day'] == 1) echo 'checked' ?>> Monday<br>
        <input type="radio" name="day" value="Tuesday" <?php if ($data['day'] == 2) echo 'checked' ?>> Tuesday<br>
        <input type="radio" name="day" value="Wednesday" <?php if ($data['day'] == 3) echo 'checked' ?>> Wednesday<br>
        <input type="radio" name="day" value="Thursday" <?php if ($data['day'] == 4) echo 'checked' ?>> Thursday<br>
        <input type="radio" name="day" value="Friday" <?php if ($data['day'] == 5) echo 'checked' ?>> Friday<br>
        <input type="radio" name="day" value="Saturday" <?php if ($data['day'] == 6) echo 'checked' ?>> Saturday<br>
        <input type="radio" name="day" value="Sunday" <?php if ($data['day'] == 7) echo 'checked' ?>> Sunday<br>
    </div>
    <div class="form-group">
        <label for="taskName">Name:</label>
        <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="name">
    </div>
    <div class="form-group">
        <label for="taskPriority">Priority:</label>
        <input type="text" class="form-control" value="<?php echo $data['priority'] ?>" name="priority">
    </div>
    <div class="form-group">
        <label for="taskDescription">Description:</label>
       <input type="text" class="form-control" value="<?php echo $data['description'] ?>" name="description">
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>

<?php

include 'application\views\_shared\footer.php';