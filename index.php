<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once 'application/core/functions.php';
//require_once 'application/core/Route.php';

$route = new \app\core\Route();

try{
    $route->routeQuery();
} catch (Exception $e) {
    \app\core\handleError($e);
}

