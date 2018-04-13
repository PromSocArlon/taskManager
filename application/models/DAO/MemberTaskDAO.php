<?php

namespace app\models\DAO;


class MemberTaskDAO
{
    /**
     * @param array $object
     * @return mixed
     */
    protected function objectToArray($object)
    {
        $array['task'] = [];

        if ($object != null) {
            $TaskArray = $object->entityToArray();

            foreach ($TaskArray as $key => $value) {

                if ($key == 'day' and !empty($value)) {
                    $array['task']['day'] = 1;
                } elseif (is_array($value)) {
                    foreach ($value as $subObject) {
                        $array['task']['interSubTask'][] = [
                            'idTask' => $TaskArray['id'],
                            'idSubTask' => $subObject->entityToArray()['id']
                        ];
                    }
                } else {
                    $array['task'][$key] = $value;
                }

            }
        }

        return $array;
    }

    /**
     * @param array $array
     * @return array Task $result
     */
    protected function arrayToArrayOfObject($array)
    {
        $result['task_team'] = [];

        if ($array != null) {

            foreach ($array as $subArray) {

                //TODO: change for task & team object needed
                //$task = new Task();
                //if ($subArray['id'] != NULL) $task->setID($subArray['id']);
                //if ($subArray['name'] != NULL) $task->setName($subArray['name']);
                //if ($subArray['priority'] != NULL) $task->setPriority($subArray['priority']);
                //if ($subArray['description'] != NULL) $task->setDescription($subArray['description']);
                //$result['task'][] = $task;

            }

        }

        return $result;
    }
}