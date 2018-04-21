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
}