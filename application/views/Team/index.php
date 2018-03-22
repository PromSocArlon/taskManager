<?php
/**
 * Created by Jeremy Laurensis.
 * Date: 20-03-18
 * Time: 08:01
 */
require_once '../../core/bootstrapTheme.php'
?>

<!DOCTYPE html>

<html>
<head>
    <title>Team Management - Action Selection</title>
    <?php echo getBootstrapTag(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Team Management Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <form role="form" action="create.php" method="post">
                        <input type="submit" value="Create a Team" name="createTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="update.php" method="post">
                        <input type="submit" value="Update a Team" name="updateTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="viewTeamMembers.php" method="post">
                        <input type="submit" value="View Team Members" name="viewTeamMembers" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="delete.php" method="post">
                        <input type="submit" value="Delete a Team" name="deleteTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
