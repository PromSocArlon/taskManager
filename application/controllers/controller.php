<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 29-01-18
 * Time: 20:37
 */


class Controller
{
    public function model($model)
    {
        if ($model == 'StorageFactory') require_once '../application/models/Storage/' . $model . '.php';
        else require_once './application/models/Entity/' . $model . '.php';
        return new $model();
    }

}