
    <h1>Team</h1>
    <br>

    <h3>Team <?= $this->clean($data['team']->getID()) ?></h3>
    <br>
    <p><b>Name:</b> <?= $this->clean($data['team']->getName()) ?></p>
    <br>
    <p><b>Leader:</b> <?= $this->clean($data['team']->getLeader()) ?></p>
    <br>

    <!--    **********************************-->
    <!--    ATTENTION : THE COMMENTS BELOW NEEED TO BE KEPT-->
    <!--    *********************************************-->

    <!--    <table class="table table-hover">-->
    <!--        <thead>-->
    <!--        <tr>-->
    <!--            <th scope="col">ID</th>-->
    <!--            <th scope="col">Username</th>-->
    <!--            <th scope="col">Email</th>-->
    <!--        </tr>-->
    <!--        </thead>-->
    <!--        <tbody>-->
    <!--  ?php
//        if (empty($result1)) {
//            echo '<tr>';
//            echo '<th><p><i>No members in this team.</i></p></th>';
//            echo '</tr>';
//        }
//        foreach ($result1 as $member) {
//            echo '<tr>';
//            echo '<th>' . $member['idMember'] . '</th>';
//            echo '<th>' . $member['login'] . '</th>';
//            echo '<th>' . $member['mail'] . '</th>';
//            echo '</tr>';
//        }
//        ?>
<!--        </tbody>-->
    <!--    </table>-->

    <a href="?controller=team&action=edit&id=<?php echo $this->clean($data['team']->getID()) ?>"
       class="btn btn-primary ">Edit</a>
    <a href="?controller=team&action=delete&id=<?php echo $this->clean($data['team']->getID()) ?>"
       class="btn btn-danger ">Delete</a>
