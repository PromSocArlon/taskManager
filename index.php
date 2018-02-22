<?php

$file = fopen(realpath('application/models/Storage/Storage.php'), "w");
print_r($file);

require_once 'application/core/functions.php';
require_once 'application/models/Storage/Storage.php';
require_once 'application/models/Storage/StorageMysql.php';
require_once 'application/models/Entity/task.php';
require_once 'application/models/Entity/week.php';
require_once 'application/models/Entity/day.php';

require_once 'application/core/services/controller.php';
require_once 'application/core/services/dispatcher.php';
require_once 'application/core/services/request.php';
require_once 'application/core/services/route.php';
require_once 'application/core/services/view.php';

$route = new route();
$route->routeQuery();
