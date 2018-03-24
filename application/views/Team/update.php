<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 20-03-18
 * Time: 14:26
 */
require_once '../../controllers/TeamController.php';
require_once '../../core/bootstrapTheme.php'
?>

<?php
//----------------------------------------------------------------------------------------------------
// pour tester le remplissage des combobox à partir de la DB -> à supprimer lorsque DAO implenté
//$connection= new PDO('mysql:host=127.0.0.1;dbname=TaskManagerTEAM4','root','');
//$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
require('DB_connexion.php');
$sth1 = $connection->query('select TeamName, ID_Team, ID_Team_Leader from Team');
$result1 = $sth1->fetchAll();

$sth2 = $connection->query('select UserName, ID_User from Users');
$result2 = $sth2->fetchAll();

//$teamNameValue = "Team 1";
//$query = "select users.ID_User, users.UserName from users, teammembers where users.ID_User=teammembers.ID_User and teammembers.ID_Team = (SELECT ID_Team FROM team WHERE TeamName= '$teamNameValue')";
//$sth3=$connection->query($query);
//$result3=$sth3->fetchAll();

//echo "Nombre de records : " .$sth->rowCount();
//print_r($result);
//---------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>

<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        function showMember(sel) {
            var teamNameSelected = sel.options[sel.selectedIndex].value;
            $("#output1").html("");
            if (teamNameSelected.length > 0) {
                $.ajax({
                    type: "POST",
                    url: "memberSelectionScript.php",
                    data: "teamNameSelected=" + teamNameSelected,
                    cache: false,
                    success: function (html) {
                        $("#output1").html(html);
                    }
                });
            }
        }
    </script>


    <title>Update Team</title>
    <?php echo getBootstrapTag(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Team Update Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <label for="TeamSelection">Please select the team that you want to update :</label><br>
                    <select name="TeamSelection" size="1" id='cb1' onChange="showMember(this)">
                        <?php
                        foreach ($result1 as $row1) {
                            echo '<option value="' . $row1[TeamName] . '">' . $row1[TeamName] . '</option>';
                        }
                        ?>
                    </select>

                    <br> </br>

                    <label for="TeamLeaderSelection">Please select the new team leader :</label><br>
                    <select name="TeamLeaderSelection" size="2">
                        <?php
                        foreach ($result2 as $row2) {
                            echo '<option value="' . $row2[UserName] . '">' . $row2[UserName] . '</option>';
                        }
                        ?>
                    </select>

                    <br> </br>

                    <div id="teamMembers" class="form-group container h-50 card bg-light mb-3">
                        <div class="card-header text-center">
                            Team Members :
                            <div class="float-right btn-group">
                                <?php
                                echo getButton("+", "addMembers");
                                echo getButton("-", "removeMembers");
                                ?>
                            </div>
                        </div>

                        <tr>
                            <td align="center" height="50">
                                <div id="output1"></div>
                            </td>
                        </tr>
                    </div>

                    <form role='form' action='?TeamController&action=update' method='post' name="updateTeam">
                        <input type="submit" value="Update Team" name="updateTeam" class="btn btn-sm btn-secondary"/>
                        <input type="button" name="Cancel Team update" value="Cancel Update"
                               onClick="location.href='index.php'" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>