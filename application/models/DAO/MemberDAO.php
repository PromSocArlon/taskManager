<?php

require_once 'application/models/Entity/Member.php';
require_once 'application/models/DAO/DAO.php';
require_once 'application/core/Storage/StorageFactory.php';

class MemberDAO extends DAO
{

    protected function objectToArray($object)
    {
        $table = "member";

        $array[$table] = [];

        $MemberArray = (array)$object;

        foreach ($MemberArray as $key => $value) {

            $key = trim(strtolower(str_replace('Member', '', $key)));

            if (!is_array($value)) {
                $value = trim($value);
                $array[$table][$key] = $value;
            } else {
                foreach ($value as $object) {
                    $array[$table][$key][] = (array)$object;
                }
            }

        }

        return $array;

    }

}