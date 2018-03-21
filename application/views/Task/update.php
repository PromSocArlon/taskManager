<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01-03-18
 * Time: 11:53
 */
include 'application\views\_shared\header.php';

echo '<b>Task updated!<b>' . PHP_EOL;

header("refresh: 1; url=?controller=task&action=index");
