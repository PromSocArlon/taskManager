<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/application/models/Entity"), $isDevMode);

// MacOS config (sudo ln -s /Applications/MAMP/tmp/mysql /var/mysql)
if (PHP_OS == "Darwin") $paths = array(__DIR__."/application/models/Entity");
else $paths = array(__DIR__."\application\models\Entity");

// database configuration parameters
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'taskManager',
    'password' => 'taskManager',
    'host'      => 'localhost',
    'port '     => '3306',
    'dbname'   => 'taskmanager',
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);