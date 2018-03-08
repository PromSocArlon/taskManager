
<?php
require_once (__DIR__.'\..\..\controllers\userController.php');
$data = userController::$data;
foreach ($data as $value) {
    ?>
    <table>
        <tr>
            <td>
                <?php echo $value['name']; ?>
            </td>
            <td>
                <?php echo $value['priority']; ?>
            </td>
        </tr>
    </table>

<?php }
?>

