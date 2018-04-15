<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/application/core/functions.php';

//use function handleError;
//require_once 'application/core/Route.php';
$route = new \app\core\Route();
try {
    $route->routeQuery();
} catch (\Exception $ex) {
    //\app\core\handleError($ex);
    \app\core\exceptions\ErrorHandler::handleError($ex);
}


/*catch (app\core\exceptions\Noitpecxe $ex) {
    echo $ex->getMessage();
    //echo "cedric";
  }*/