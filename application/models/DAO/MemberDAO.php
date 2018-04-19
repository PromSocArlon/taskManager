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
    protected function objectToArray($object)
    {
        $array['member'] = [];

        if ($object != null) {
            $MemberArray = $object->entityToArray();

            foreach ($MemberArray as $key => $value) {
                $array['member'][$key] = $value;
            }
        }

        return $array;

    }

}