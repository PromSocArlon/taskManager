<?php
session_start();

require_once __DIR__ . '/bootstrap.php';

//use function app\core\handleError;

$route = new \app\core\Route();
//try {
$route->routeQuery($entityManager);
//} catch (\Exception $ex) {
//    \app\core\handleError($ex);
//}