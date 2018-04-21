<?php
include(__DIR__ . '\..\_shared\header.php');

?>

<h1>TaskManager Member List</h1>


<table class="table table-hover">
    <thead>
        <tr>
            <?php
            $members = $data;
            foreach ($members[0] as $key=>$value){
                echo '<th scope="col">' . $key . '</th>';
            }
            ?>
        </tr>
    </thead>
    <?php
        foreach ($members as $member) {
            $profilePath = '?controller=member&action=read&id='. $member['id'];
            echo '<tr>';
            foreach ($member as $property) {
                echo '<td>' . $property . '</td>';
            }
            echo '<td><a href=' . $profilePath . '>edit</a></td>';
            echo '</tr>';
        }
echo '</table>';

include(__DIR__ . '\..\_shared\footer.php');
?>