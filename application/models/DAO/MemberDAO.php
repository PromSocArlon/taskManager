<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:03
 */

class UserDOA extends DAO
{

    protected function objectToArray($arguments)
    {
        $array['user'] = [];

        if (!empty($arguments)) {
            $newTaskArray = (array)$arguments[0];
            $newDayKey = (new Week)->getDayIndex($arguments[1]);

            foreach ($newTaskArray as $key => $value) {
                $array['task'][0]['new'][str_replace('Task', '', $key)] = $value;
            }
            $array['task'][0]['new']['day'] = $newDayKey + 1;

            if (func_num_args() > 2) {
                $oldTaskArray = (array)$arguments[3];
                $oldDayKey = (new Week)->getDayIndex($arguments[4]);
                foreach ($oldTaskArray as $key => $value) {
                    $array['task'][0]['old'][str_replace('Task', '', $key)] = $value;
                }
                $array['task'][0]['get']['old'] = $oldDayKey + 1;
            }
        }

        return $array;
    }

}