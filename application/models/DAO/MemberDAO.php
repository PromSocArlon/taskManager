<?php
namespace app\models\DAO;

use app\models\Entity\Member;

class MemberDAO extends \app\core\DAO
{
    /*-------------------------------
    * Retourne un utilisateur d'id = $id
    -------------------------------*/
    public function getMember($id)
    {
        //Sami:
        //$this->connection->update1($member);
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
        }

        return $array;

    }

    protected function arrayToArrayOfObject($array)
    {
        $result['member'] = [];

        if ($array != null) {

            foreach ($array as $subArray) {

                //TODO: change for member object needed
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