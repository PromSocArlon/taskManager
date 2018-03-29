<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 27-03-18
 * Time: 06:02
 */

include 'application\views\_shared\header.php';


require('DB_connexion.php');
$sth1 = $connection->query('select idMember, login, mail from tbl_member where team='.$data['id']);
$result1 = $sth1->fetchAll();


?>
    <h1>Team</h1>
    <hr>
    <h3>Team <?php echo $data['id']?></h3>
    <br>
    <p><b>Name:</b> <?php echo $data['name'] ?></p>
    <br>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (empty($result1)) {
            echo '<tr>';
            echo '<th><p><i>No members in this team.</i></p></th>';
            echo '</tr>';
        }
        foreach ($result1 as $member) {
            echo '<tr>';
            echo '<th>' . $member['idMember'] . '</th>';
            echo '<th>' . $member['login'] . '</th>';
            echo '<th>' . $member['mail'] . '</th>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <a href="?controller=team&action=edit&id=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
    <a href="?controller=team&action=delete&id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
<?php

include 'application\views\_shared\footer.php';