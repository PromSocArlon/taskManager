<?php
namespace app\models\DAO;

use app\models\Entity\Member;

class MemberDAO extends \app\core\DAO
{
    public function getTasks($memberId) {
        $tasks = [];



        return $tasks;
    }
    /*-------------------------------
    * Retourne un utilisateur d'id = $id
    -------------------------------*/
    public function getMember($id)
    {
        $myMember = new Member();
        $myMember->id = $id;
        return $this->read($myMember);
    }

    /**
     * @param Member $object
     * @return mixed
     */
    public function  objectToArray($object)
    {

        $array = [];

        if ($object != null) {

            foreach ((array)$object as $key => $value) {

              $key=substr($key,26,5);
                $array[$key] = $value;

            }

        }

        return $array;

    }

    protected function arrayToArrayOfObject($array)
    {
        $result['member'] = [];

        if ($array != null) {

            foreach ($array as $subArray) {

                $member = new Member();
                if ($subArray['id'] != NULL) $member->setID($subArray['id']);
                if ($subArray['name'] != NULL) $member->setName($subArray['login']);
                if ($subArray['password'] != NULL) $member->setPriority($subArray['password']);
                if ($subArray['mail'] != NULL) $member->setDescription($subArray['mail']);
                if ($subArray['teamleader'] != NULL) $member->setDescription($subArray['teamleader']);
                if ($subArray['team'] != NULL) $member->setDescription($subArray['team']);
                $result['member'][] = $member;

            }

        }

        return $result;
    }

}