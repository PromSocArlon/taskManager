<?php
if(!isset($confContext) || !isset($confContext['viewPath'])) {
    throw new \Exception('Missing viewPath in confContext');
}

$loader = new Twig_Loader_Filesystem($confContext['viewPath']);
$twig = new Twig_Environment($loader, ['debug' => true]);
$twig->addExtension(new Twig_Extension_Debug());

return $twig;