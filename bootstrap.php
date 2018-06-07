<?php
namespace app;

use app\core\DependencyInjectionContainer;

require_once __DIR__ . '/vendor/autoload.php';

$dic = new DependencyInjectionContainer();

$dic->register('twig');
$dic->register('doctrine');