<?php

require_once __DIR__ . '/bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

try {
    $dic->register('doctrine');
    $doctrineConf = $dic->getDependency('doctrine');
} catch (\Exception $e) {
    throw new \Exception($e->getMessage());
}
return ConsoleRunner::createHelperSet($doctrineConf);