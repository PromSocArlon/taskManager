<?php
if(!isset($confContext) && isset($confContext['viewPath'])) {
    throw new \Exception('Missing viewPath in confContext');
}

$loader = new Twig_Loader_Filesystem($confContext['viewPath']);
return new Twig_Environment($loader);