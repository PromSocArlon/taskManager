<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 04-03-18
 * Time: 21:09
 */

include 'application\views\_shared\header.php';

echo '<b>Task deleted!<b>' . PHP_EOL;

header("refresh: 1; url=?controller=task&action=index");

