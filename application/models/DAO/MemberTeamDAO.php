<?php
namespace app\models\DAO;

class MemberTeamDAO extends \app\core\DAO
{
    protected function objectToArray($arguments)
    {
        $array['member_team'] = [];

        if (!empty($arguments)) {

            $memberTeamArray = (array)$arguments[0];

            foreach ($memberTeamArray as $key => $value) {
                $prop = trim(strtolower($key));
                switch ($prop) {
                    case "memberid":
                        $array['member_team'][0]['new']['fk_member_id'] = $value;
                        break;
                    case "teamid":
                        $array['member_team'][0]['new']['fk_team_id'] = $value;
                        break;
                    default:
                        throw new \Exception("Unhandled property");
                }
            }
        }
        return $array;
    }

    protected function arrayToArrayOfObject($array)
    {
        $result['member_team'] = [];

        if ($array != null) {

            foreach ($array as $subArray) {

                //TODO: change for member & team object needed
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