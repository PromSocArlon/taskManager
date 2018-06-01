<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(join(DIRECTORY_SEPARATOR, ["application", "models", "Entity"]));

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(
    $paths,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);

// database configuration parameters
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'taskManager',
    'password' => 'taskManager',
    'host'      => 'localhost',
    'port '     => '3306',
    'dbname'   => 'taskmanager',
);

return EntityManager::create($dbParams, $config);

