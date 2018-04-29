<?php

require_once __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$entitiesPath  = array(__DIR__ . "\application\models\Entity");

// database configuration parameters
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'taskmanager',
    'password' => 'taskmanager',
    'host' => '127.0.0.1',
    'port ' => '3306',
    'dbname' => 'taskmanager',
);
$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;