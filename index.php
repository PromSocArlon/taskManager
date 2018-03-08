<?php
session_start();

require_once 'application/core/functions.php';
require_once 'application/core/route.php';

$route = new Route();
$route->routeQuery();
