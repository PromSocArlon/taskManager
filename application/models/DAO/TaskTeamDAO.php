<?php
namespace app\models\DAO;

class TaskTeamDAO extends \app\core\DAO
{
    protected function objectToArray($arguments)
    {
        $array['task_team'] = [];

        if (!empty($arguments)) {

            $taskTeamArray = (array)$arguments[0];

            foreach ($taskTeamArray as $key => $value) {
                $prop = trim(strtolower($key));
                switch ($prop) {
                    case "taskid":
                        $array['member_team'][0]['new']['fk_task_id'] = $value;
                        break;
                    case "teamid":
                        $array['member_team'][0]['new']['fk_team_id'] = $value;
                        break;
                    default:
                        throw new  Exception("Unhandled property");
                }
            }
        }
        return $array;
    }

    protected function arrayToArrayOfObject($array)
    {
        $result['task_team'] = [];

        if ($array != null) {

            foreach ($array as $subArray) {

                //TODO: change for task & team object needed
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