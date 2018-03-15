<?php
/**
 * Created by PhpStorm.
 * User: Max Sch
 * Date: 15-03-18
 * Time: 16:11
 */

/**<form method="POST" action="index.php?controller=team&action=save">
    <p > Name </p>
    <input type="text" name="taskName">
    <p > Priority </p>
    <input type="text" name="taskPriority">
    <p > Description </p>
    <input type="text" name="taskDescription">
    <p ></p>
    <input type="submit" name="button" value="Save">
 */
?>
    <div id="main">
        <div id="content">
            <h2> Update Team </h2>
            <form method="POST" action="index.php?controller=team&action=update">
                <label for="name">Team Name:</label>
                <input type="text" name="name" id="name" autofocus></br>
                <label for="leader">Leader Name:</label>
                <input type="text" name="leader" id="leader"></br>

                <label for="update_team"> </label>
                <input type="submit" name="button" value="Update">
            </form>
        </div>
    </div>
</form>
