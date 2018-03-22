<?php
/**
 * Created by PhpStorm.
 * User: philippedaniel
 * Date: 16/02/2018
 * Time: 22:03
 */

class MemberDAO extends app\core\DAO
{
    /*-------------------------------
    * Retourne un utilisateur d'id = $id
    -------------------------------*/
    public function getMember($member){

    $this->connection->update1($member);
    }

    protected function objectToArray($arguments)
    {
        $array['member'] = [];

        if (!empty($arguments)) {
            $newMemberArray = (array)$arguments[0];

            foreach ($newMemberArray as $key => $value) {
                $array['member'][0]['new'][str_replace('member', '', $key)] = $value;
            }

            if (func_num_args() > 1) {
                $oldMemberArray = (array)$arguments[1];
                foreach ($oldMemberArray as $key => $value) {
                    $array['member'][0]['old'][str_replace('member', '', $key)] = $value;
                }
            }
        }

        return $array;
    }

}