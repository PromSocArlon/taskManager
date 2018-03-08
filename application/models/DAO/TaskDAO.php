<?php

require_once '../application/models/Entity/week.php';
require_once '../application/models/Entity/task.php';
require_once '../application/models/DAO/DAO.php';
require_once '../application/core/Storage/StorageFactory.php';

class TaskDAO extends DAO
{

    protected function objectToArray($arguments)
    {
        $array['task'] = [];

        if (!empty($arguments) and count($arguments) >= 2) {
            $newTaskArray = (array)$arguments[0];
            $newDayKey = (new Week)->getDayIndex($arguments[1]);

            foreach ($newTaskArray as $key => $value) {
                $array['task'][0]['new'][str_replace('Task', '', $key)] = $value;
            }
            $array['task'][0]['new']['day'] = $newDayKey + 1;

            if (count($arguments) > 2) {
                $oldTaskArray = (array)$arguments[2];
                $oldDayKey = (new Week)->getDayIndex($arguments[3]);
                foreach ($oldTaskArray as $key => $value) {
                    $array['task'][0]['old'][str_replace('Task', '', $key)] = $value;
                }
                $array['task'][0]['old']['day'] = $oldDayKey + 1;
            }
        }

        return $array;
    }

}