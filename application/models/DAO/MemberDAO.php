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

}