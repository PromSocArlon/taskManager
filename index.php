<?php
session_start();

require_once 'application/core/functions.php';
require_once 'application/core/Route.php';

$route = new Route();
$route->routeQuery();
