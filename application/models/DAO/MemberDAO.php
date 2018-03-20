<?php

require_once 'application/models/Entity/Member.php';
require_once 'application/models/DAO/DAO.php';
require_once 'application/core/Storage/StorageFactory.php';

class MemberDAO extends DAO
{

    /**
     * @param Member $object
     * @return mixed
     */
    protected function objectToArray($object)
    {
        $array['member'] = [];

        $MemberArray = $object->entityToArray();

        foreach ($MemberArray as $key => $value) {

            if (is_array($value)) {
                foreach ($value as $task) {
                    $array['member']['interTaskMember'][] = [
                        'idMember' => $MemberArray['id'],
                        'idTask' => $task->entityToArray()['id']
                    ];
                }
            } else {
                $array['member'][$key] = $value;
            }

        }

        return $array;

    }

}