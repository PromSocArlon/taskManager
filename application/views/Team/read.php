
    <h1>Team</h1>
    <br>

    <h3>Team <?= $this->clean($data['team']->getID()) ?></h3>
    <br>
    <p><b>Name:</b> <?= $this->clean($data['team']->getName()) ?></p>
    <br>
    <p><b>Leader:</b> <?= $this->clean($data['team']->getLeader()) ?></p>
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
        if (empty($data['members'])) {
           echo '<tr>';
           echo '<th><p><i>No members in this team.</i></p></th>';
           echo '</tr>';
        }
       foreach ( $data['members']as $row) {
           echo '<tr>';
            echo '<th>' . $row['id'] . '</th>';
            echo '<th>' . $row['login'] . '</th>';
           echo '<th>' . $row['mail'] . '</th>';
           echo '</tr>';
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
        if (empty($data['tasks'])) {
            echo '<tr>';
            echo '<th><p><i>No tasks in this team.</i></p></th>';
            echo '</tr>';
        }
        foreach ( $data['tasks']as $row) {
            echo '<tr>';
            echo '<th>' . $row['id'] . '</th>';
            echo '<th>' . $row['name'] . '</th>';
            echo '<th>' . $row['priority'] . '</th>';
            echo '<th>' . $row['description'] . '</th>';
            echo '<th>' . $row['status'] . '</th>';
            echo '<th>' . $row['subtasks'] . '</th>';
            echo '<th>' . $row['day'] . '</th>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <a href="?controller=team&action=edit&id=<?php echo $this->clean($data['team']->getID()) ?>"
       class="btn btn-primary ">Edit</a>
    <a href="?controller=team&action=delete&id=<?php echo $this->clean($data['team']->getID()) ?>"
       class="btn btn-danger ">Delete</a>
