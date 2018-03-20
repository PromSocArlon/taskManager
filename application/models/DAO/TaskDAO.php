<?php

require_once 'application/models/Entity/Week.php';
require_once 'application/models/Entity/Task.php';
require_once 'application/models/DAO/DAO.php';
require_once 'application/core/Storage/StorageFactory.php';

class TaskDAO extends DAO
{

    /**
     * @param Task $object
     * @return mixed
     */
    protected function objectToArray($object)
    {
        $array['task'] = [];
        $array['interSubTask'] = [];

        $TaskArray = $object->entityToArray();

        foreach ($TaskArray as $key => $value) {

            if ($key == 'day' and !empty($value)) {
                $array['task']['day'] = (new Week)->getDayIndex($value) + 1;
            } elseif (is_array($value)) {
                foreach ($value as $subObject) {
                    $array['interSubTask'][] = [
                        'idTask' => $TaskArray['id'],
                        'idSubTask' => $subObject->entityToArray()['id']
                    ];
                }
            } else {
                $array['task'][$key] = $value;
            }

        }

        //var_dump($array);

        return $array;
    }

}