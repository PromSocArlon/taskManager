<?php
include 'application\views\_shared\header.php';
?>
    <h1>Member</h1>
    <hr>
    <h3>Task <?php echo $data['id']?></h3>
    <br>
    <p><b>Login:</b> <?php echo $data['login'] ?></p>
    <p><b>Mail:</b> <?php echo $data['mail'] ?></p>
    <p><b>Team:</b> <?php echo $data['idTeam'] ?></p>

    <br>

    <a href="?controller=member&action=edit&id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
    <a href="?controller=member&action=delete&id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
<?php
include 'application\views\_shared\footer.php';
?>