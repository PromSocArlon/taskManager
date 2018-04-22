<?php
include 'application\views\_shared\header.php';
?>
    <h1>Member</h1>
    <hr>
    <h3>member <?php echo $data[0]?></h3>
    <br>
    <p><b>Login:</b> <?php echo $data['login'] ?></p>
    <p><b>Mail:</b> <?php echo $data['mail'] ?></p>
    <p><b>Team:</b> <?php echo $data['teamL'] ?></p>
    <p><b>Team:</b> <?php echo $data['team'] ?></p>
    <br>

    <a href="?controller=member&action=edit&id=<?php echo $data['0'] ?>" class="btn btn-primary">Edit</a>
    <a href="?controller=member&action=delete&id=<?php echo $data['0'] ?>" class="btn btn-danger">Delete</a>
<?php
include 'application\views\_shared\footer.php';
?>