<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 22-02-18
 * Time: 23:17
 */
include 'application\views\_shared\header.php';

?>

<h1>Task</h1>
<hr>
<div class="row">
    <div class="col-sm">
        <h3>Index</h3>
    </div>
    <div class="col-sm-2">
        <a href="?controller=task?action=create" class="btn btn-primary">Create a new task</a>
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
                    //loop
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php

include 'application\views\_shared\footer.php';

