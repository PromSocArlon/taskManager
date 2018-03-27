<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 22-02-18
 * Time: 23:17
 */
?>

<h1>Task</h1>
<hr>
<div class="row">
    <div class="col-sm">
        <h3>Index</h3>
    </div>
    <div class="col-sm-2">
        <a href="?controller=task&action=create" class="btn btn-success">Create a new task</a>
    </div>
</div>

<br><br>

<div class="row">
    <div class="col-sm">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (empty($data)) {
                        echo '<tr>';
                            echo '<th><p><i>No tasks created yet.</i></p></th>';
                        echo '</tr>';
                    }
                    foreach ($data as $task) {
                        echo '<tr>';
                            echo '<th>' . $task['id'] . '</th>';
                            echo '<th>' . $task['name'] . '</th>';
                            echo '<th>' . $task['priority'] . '</th>';
                            echo '<th>' . $task['description'] . '</th>';
                            echo '<th>' . '<a href="?controller=task&action=edit&id=' . $task['id'] . ' " class="btn btn-primary">Edit</a>' . '</th>';
                            echo '<th>' . '<a href="?controller=task&action=read&id=' . $task['id'] . ' " class="btn btn-secondary">View</a>' . '</th>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

