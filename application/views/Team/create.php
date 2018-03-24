<?php
/*//----------------------------------------------------------------------------------------------------
// pour tester le remplissage des combobox à partir de la DB -> à supprimer lorsque DAO implenté
require('DB_connexion.php');
$sth = $connection->query('select Username, ID_User from Users');
$result = $sth->fetchAll();
//echo "Nombre de records : " .$sth->rowCount();
//print_r($result);
//---------------------------------------------------------------------------------------------------
*/ ?>

<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Team Creation Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <div class="form-group">
                        <label for="teamName">Team name : </label>
                        <input type="text" name="teamName" class="form-control" placeholder="Enter team name"/>
                    </div>
                    <label for="TeamLeaderSelection">Please select the teamleader :</label><br>
                    <select name="TeamLeaderSelection" size="1">
                        <?php
                        foreach ($result as $row) {
                            echo '<option value="' . $row[Username] . '">' . $row[Username] . '</option>';
                        }
                        ?>
                    </select>

                    <br> </br>

                    <form role='form' action='?controller=Team&action=create' method='post'>
                        <input type="submit" value="Create Team" name="createNewTeam" class="btn btn-sm btn-secondary"/>
                        <input type="button" name="Cancel Team Creation" value="Cancel Creation"
                               onClick="location.href='index.php'" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

