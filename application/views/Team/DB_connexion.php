<?php
/**
 * Created by PhpStorm.
 * User: Jeremy Laurensis
 * Date: 21-03-18
 * Time: 12:07
 */


try {
    $connection = new PDO('mysql:host=127.0.0.1;dbname=TaskManager', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>