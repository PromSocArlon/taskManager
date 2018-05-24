<?php
/**
 * Created by PhpStorm.
 * User: Sebastien Munoz
 * Date: 5/24/2018
 * Time: 8:47 PM
 */

namespace app\core;


class ConfigLoader
{
    const CONFIG_PATH = 'config' . DIRECTORY_SEPARATOR;

    public static function getConfig($configName, $confContext = []) {
        $filePath = self::CONFIG_PATH . $configName . '.php';
        if(!file_exists($filePath)) {
            throw new \Exception('unknown config file: ' . $configName);
        }
        $conf = (include $filePath);

        return $conf;
    }
}