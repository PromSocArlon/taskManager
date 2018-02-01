<?php

require_once realpath('application/models/Storage/StorageMysql.php');

$storage = new StorageMysql();

var_dump($storage);

?>