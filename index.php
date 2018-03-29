<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';

use function app\core\handelerror;

//require_once 'application/core/Route.php';

$route = new \app\core\Route();
try {
    $route->routeQuery();
} catch (\Exception $ex) {
    \app\core\handleError($ex);
}

