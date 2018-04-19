<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/application/core/functions.php';


$route = new \app\core\Route();
try {
    $route->routeQuery();
} catch (Error | Exception $ex) {
    \app\core\exceptions\ErrorHandler::handleError($ex);
}
