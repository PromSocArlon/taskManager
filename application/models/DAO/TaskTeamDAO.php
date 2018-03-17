<?php
/**
 * Created by PhpStorm.
 * User: utiN0
 * Date: 16/03/2018
 * Time: 22:31
 */

class TaskTeamDAO extends DAO
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
}