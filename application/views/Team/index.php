<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Teams</h1>
        </div>
        <div class="bs-component">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Leader</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($data as $team) {
                    echo '<tr>';
                    echo '<td>' . $team['id'] . '</td>';
                    echo '<td>' . $team['name'] . '</td>';
                    echo '<td>' . $team['leader'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>