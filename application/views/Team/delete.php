<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 20-03-18
 * Time: 10:03
 */

require_once '../../controllers/TeamController.php';
require_once '../../core/bootstrapTheme.php'
?>

<?php
//----------------------------------------------------------------------------------------------------
// pour tester le remplissage des combobox à partir de la DB -> à supprimer lorsque DAO implenté
require ('DB_connexion.php');
$sth=$connection->query('select Teamname, ID_Team from Team');
$result = $sth->fetchAll();
//echo "Nombre de records : " .$sth->rowCount();
//print_r($result);
//---------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>

<html>
<head>
    <title>Delete a Team</title>
    <?php echo getBootstrapTag(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Team Deletion Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <label for="TeamToDelete">Select the team to delete :</label><br>
                    <select name="TeamToDelete" size="1">
                     <?php
                        foreach ($result as $row) {
                        echo '<option value="'.$row[Teamname].'">'.$row[Teamname].'</option>';
                        }
                     ?>
                    </select>

                    <br> </br>

                    <form role='form' action='?TeamController&action=delete' method='post'>
                        <input type="submit" value="Delete the selected Team" name="deleteSelectedTeam" class="btn btn-sm btn-secondary"/>
                        <input type="button" name="Cancel Team Creation" value="Cancel Deletion" onClick="location.href='index.php'" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
