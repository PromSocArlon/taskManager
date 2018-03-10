<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 08-03-18
 * Time: 20:02
 */
foreach ($data as $key =>$value){
    echo '|| Task ' . ++$key .' || ' . PHP_EOL;
    echo 'Name: ' . $value['name'] . PHP_EOL;
    echo ', Priority: ' . $value['priority'] . PHP_EOL;
    echo ', Description: ' . $value['description'] . PHP_EOL;
}
