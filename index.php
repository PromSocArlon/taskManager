<?php
namespace app;

session_start();
require_once __DIR__ . '/bootstrap.php';

use app\core\Route;

$route = new Route($dic);
try {
    $route->routeQuery();
} catch (Error | Exception $ex) {
    \app\core\exceptions\ErrorHandler::handleError($ex);
}
