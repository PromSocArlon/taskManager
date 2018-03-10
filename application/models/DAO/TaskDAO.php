<?php

require_once 'application/models/Entity/Week.php';
require_once 'application/models/Entity/Task.php';
require_once 'application/models/DAO/DAO.php';
require_once 'application/core/Storage/StorageFactory.php';

class TaskDAO extends DAO
{

    protected function objectToArray($object)
    {
        $array['task'] = [];

        $TaskArray = (array)$object;

        foreach ($TaskArray as $key => $value) {

            $key = trim(strtolower(str_replace('Task', '', $key)));
            $value = trim($value);

            if ($key == 'day' and !empty($value)) {
                $array['task']['day'] = (new Week)->getDayIndex($value) + 1;
            } else {
                $array['task'][$key] = $value;
            }

        }

        return $array;
    }

}