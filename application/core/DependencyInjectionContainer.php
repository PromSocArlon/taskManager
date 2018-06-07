<?php
/**
 * Created by PhpStorm.
 * User: Sebastien Munoz
 * Date: 6/7/2018
 * Time: 7:35 PM
 */

namespace app\core;


class DependencyInjectionContainer
{
    const CONFIG_PATH = 'config' . DIRECTORY_SEPARATOR;

    private $dependencies = [];

    public function register($dependencyName)
    {
        $filePath = self::CONFIG_PATH . $dependencyName . '.php';
        if (!file_exists($filePath)) {
            throw new \Exception('Missing dependency config file: ' . $dependencyName);
        }

        $this->dependencies[$dependencyName] = $filePath;
    }

    public function getDependency($dependencyName)
    {
        if (!isset($this->dependencies[$dependencyName])) {
            throw new \Exception('Trying to access unregistered dependency: ' . $dependencyName);
        }

        return include($this->dependencies[$dependencyName]);
    }
}