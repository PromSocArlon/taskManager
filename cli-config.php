<?php

require_once __DIR__ . '/bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
try {
    $doctrineConf = \app\core\ConfigLoader::getConfig('doctrine');
} catch (\Exception $e) {
    throw new \Exception($e->getMessage());
}
return ConsoleRunner::createHelperSet($doctrineConf);