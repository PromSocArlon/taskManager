<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 21-03-18
 * Time: 06:46
 */

require("DB_connexion.php");
$teamName = ($_REQUEST["teamNameSelected"] <> "") ? trim($_REQUEST["teamNameSelected"]) : "";
if ($teamName <> "") {
    $query = "select users.ID_User, users.UserName from users, teammembers where users.ID_User=teammembers.ID_User and teammembers.ID_Team = (SELECT ID_Team FROM team WHERE TeamName= '$teamName')";
    try {
        $stmt = $connection->query($query);
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
    if (count($results) > 0) {
        ?>
        <select name="members" name="members" size="5" class="form-control mb-3">
            <?php foreach ($results as $rs) { ?>
                <option value="<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></option>
            <?php } ?>
        </select>
        <?php
    }
}
?>