<?php
namespace app\models\DAO;

class MemberDAO extends \app\core\DAO
{
    /*-------------------------------
    * Retourne un utilisateur d'id = $id
    -------------------------------*/
    public function getMember($member){
        $this->connection->update1($member);
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

}