<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// MacOS config (for MAMP: sudo ln -s /Applications/MAMP/tmp/mysql /var/mysql)
if (PHP_OS == "Darwin") $paths = array(__DIR__."/application/models/Entity");
else $paths = array(__DIR__."\application\models\Entity");

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

$entityManager = EntityManager::create($dbParams, $config);
