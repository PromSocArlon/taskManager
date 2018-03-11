<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:03
 */
require_once 'application/models/DAO/DAO.php';

class MemberDAO extends DAO
{

    protected function objectToArray($arguments)
    {
        $array['member'] = [];

        if (!empty($arguments)) {
            $newMemberArray = (array)$arguments[0];

            foreach ($newMemberArray as $key => $value) {
                $array['member'][0]['new'][str_replace('Member', '', $key)] = $value;
            }

            if (func_num_args() > 1) {
                $oldMemberArray = (array)$arguments[1];
                foreach ($oldMemberArray as $key => $value) {
                    $array['member'][0]['old'][str_replace('Member', '', $key)] = $value;
                }
            }
        }

        return $array;
    }

}