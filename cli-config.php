<?php

require_once __DIR__ . '/bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet(\app\core\ConfigLoader::getConfig('doctrine'));