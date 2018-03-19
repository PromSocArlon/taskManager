<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 08-03-18
 * Time: 20:02
 */

    $day = "";
    switch ($data['day']) {
        case 1:
            $day = "Monday";
            break;
        case 2:
            $day = "Tuesday";
            break;
        case 3:
            $day = "Wednesday";
            break;
        case 4:
            $day = "Thursday";
            break;
        case 5:
            $day = "Friday";
            break;
        case 6:
            $day = "Saturday";
            break;
        case 7:
            $day = "Sunday";
            break;
    }
include 'application\views\_shared\header.php';

?>
<h1>Task</h1>
<hr>
<h3>Task <?php echo $data['id']?></h3>
<br>
<p><b>Name:</b> <?php echo $data['name'] ?></p>
<p><b>Priority:</b> <?php echo $data['priority'] ?></p>
<p><b>Description:</b> <?php echo $data['description'] ?></p>
<p><b>Day:</b> <?php echo $day ?></p>

    <br>

    <a href="?controller=task&action=delete&id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>

<?php

include 'application\views\_shared\footer.php';
