<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 19/03/2018
 * Time: 14:22
 */
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
        <label for="taskName">Name:</label>
        <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="name" required>
    </div>
    <div class="form-group">
        <label for="taskPriority">Priority:</label>
        <input type="text" class="form-control" value="<?php echo $data['priority'] ?>" name="priority" required>
    </div>
    <div class="form-group">
        <label for="taskDescription">Description:</label>
       <input type="text" class="form-control" value="<?php echo $data['description'] ?>" name="description" required>
    </div>
    <div class="form-group">
        <label for="taskStatus">Status:</label>
        <select name="status" id="taskStatus" class=form-control">
            <option value="0" <?php if ($data['status'] == 'Pending') { echo 'selected="selected"'; } ?>>Pending</option>
            <option value="1" <?php if ($data['status'] == 'Planned') { echo 'selected="selected"'; } ?>>Planned</option>
            <option value="2" <?php if ($data['status'] == 'In Progress') { echo 'selected="selected"'; } ?>>In Progress</option>
            <option value="3" <?php if ($data['status'] == 'Completed') { echo 'selected="selected"'; } ?>>Completed</option>
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>