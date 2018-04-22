<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/bootstrap.php';

//use function app\core\handelerror;
//\Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
//require_once 'application/core/Route.php';

$route = new \app\core\Route();
//try {
    $route->routeQuery($entityManager);
//} catch (\Exception $ex) {
//    \app\core\handleError($ex);
//}

