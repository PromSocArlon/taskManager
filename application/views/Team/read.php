<h1>Team</h1>
<br>

<h3>Team <?= $this->clean($data['team']->getID()) ?></h3>
<br>
<p><b>Name:</b> <?= $this->clean($data['team']->getName()) ?></p>
<br>
<p><b>Leader:</b> <?= ( is_null($data['team']->getLeader())) ? '': $this->clean($data['team']->getLeader()->getLogin()) ?></p>
<br>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($data['team']->getMembers()->count()==0) {
        echo '<tr>';
        echo '<th><p><i>No members in this team.</i></p></th>';
        echo '</tr>';
    }else {
        foreach ($data['team']->getMembers() as $member) {
            echo '<tr>';
            echo '<th>' .  $this->clean($member->getId()) . '</th>';
            echo '<th>' .  $this->clean($member->getLogin()) . '</th>';
            echo '<th>' . (is_null($member->getMail())) ? " " : $this->clean($member->getMail())  . '</th>';
            echo '</tr>';
        }
    }

    ?>
    </tbody>
</table>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Priority</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Sub Task</th>
        <th scope="col">Day</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($data['team']->getTasks()->count()==0) {
        echo '<tr>';
        echo '<th><p><i>No tasks in this team.</i></p></th>';
        echo '</tr>';
    }else {
        foreach ($data['team']->getTasks() as $task) {
            echo '<tr>';
            echo '<th>' . $task->getId() . '</th>';
            echo '<th>' . $task->getName() . '</th>';
            echo '<th>' . $task->getPriority() . '</th>';
            echo '<th>' . $task->getDescription() . '</th>';
            echo '<th>  </th>';
            echo '<th>  </th>';
            echo '<th>  </th>';
            echo '</tr>';
        }
    }

    ?>
    </tbody>
</table>

<a href="?controller=team&action=edit&id=<?php echo $this->clean($data['team']->getID()) ?>"
   class="btn btn-primary ">Edit</a>
<a href="?controller=team&action=delete&id=<?php echo $this->clean($data['team']->getID()) ?>"
   class="btn btn-danger ">Delete</a>
