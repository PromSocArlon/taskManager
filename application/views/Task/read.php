<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 08-03-18
 * Time: 20:02
 */
?>
<h1>Task</h1>
<hr>
<h3>Task <?php echo $data['id']?></h3>
<br>
<p><b>Name:</b> <?php echo $data['name'] ?></p>
<p><b>Priority:</b> <?php echo $data['priority'] ?></p>
<p><b>Description:</b> <?php echo $data['description'] ?></p>

<br>

<a href="?controller=task&action=edit&id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
<a href="?controller=task&action=delete&id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>

