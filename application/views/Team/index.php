<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Teams</h1>
        </div>
        <div class="bs-component">
            <table class="table table-hover">
                <caption>List of teams</caption>
                <thead class="thead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Leader</th>
                        <th scope="col">Members</th>
                        <th scope="col">Tasks</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['teams'] as $team) {
                    echo "<tr>";
                    $link = "?controller=Team&action=read&id=" . $team->getId();
                    echo "<td><a href='$link'>" . $team->getId() . "</a></td>";
                    echo '<td>' . $team->getName() . '</td>';
                    echo '<td>' .(is_null($team->getLeader()) ? '' : $team->getLeader()->getLogin() )  . '</td>';
                    echo "<td><span class='badge badge-primary badge-pill'>" .$team->getMembers()->count(). " </span></td>";
                    echo "<td><span class='badge badge-primary badge-pill'>".$team->getTasks()->count()."   </span></td>";
                    $link = "?controller=Team&action=delete&id=" . $team->getId();
                    echo "<td><a class='btn btn-outline-danger btn-sm' role='button' href='$link'>Delete</a></td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>