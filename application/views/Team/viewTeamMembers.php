<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 21-03-18
 * Time: 18:18
 */

require_once '../../controllers/TeamController.php';
require_once '../../core/bootstrapTheme.php'
?>

<?php
//----------------------------------------------------------------------------------------------------
// pour tester le remplissage des combobox à partir de la DB -> à supprimer lorsque DAO implenté
//$connection= new PDO('mysql:host=127.0.0.1;dbname=TaskManagerTEAM4','root','');
//$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
require ('DB_connexion.php');
$sth1=$connection->query('select TeamName, ID_Team, ID_Team_Leader from Team');
$result1 = $sth1->fetchAll();
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
                    success: function(html) {
                        $("#output1").html(html);
                    }
                });
            }
        }
    </script>


    <title>Show Team Members</title>
    <?php echo getBootstrapTag(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Show Team Members Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <label for="TeamSelection">Please select the team that you want to display :</label><br>
                    <select name="TeamSelection" size="1" id='cb1' onChange="showMember(this)">
                        <?php
                        foreach ($result1 as $row1) {
                            echo '<option value="'.$row1[TeamName].'">'.$row1[TeamName].'</option>';
                        }
                        ?>
                    </select>

                    <br> </br>



                    <div id="teamMembers" class="form-group container h-50 card bg-light mb-3">
                        <tr>
                            <td align="center" height="50"><div id="output1"></div> </td>
                        </tr>
                    </div>

                    <form role="form" action="index.php" method="post">
                        <input type="submit" value="Return to team index" name="TeamManagement" class="btn btn-sm btn-secondary"/>
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