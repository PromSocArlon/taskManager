<?php
namespace app\models\DAO;

class TaskDAO extends \app\core\DAO
{

    /**
     * @param Task $object
     * @return mixed
     */
    protected function objectToArray($object)
    {
        $array['task'] = [];

        if ($object != null) {
            $TaskArray = $object->entityToArray();

            foreach ($TaskArray as $key => $value) {

                if ($key == 'day' and !empty($value)) {
                    $array['task']['day'] =  1;
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

}