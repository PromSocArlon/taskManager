<?php
require_once 'application/models/Entity/Member.php';
require_once 'application/models/DAO/DAO.php';
require_once 'application/core/Storage/StorageFactory.php';

class MemberDAO extends DAO
{

    protected function objectToArray($object)
    {
        $array['member'] = [];

        $MemberArray = (array)$object;

        foreach ($MemberArray as $key => $value) {

            $key = trim(strtolower(str_replace('Member', '', $key)));
            $value = trim($value);

            $array['member'][$key] = $value;

        }

        return $array;

    }

}