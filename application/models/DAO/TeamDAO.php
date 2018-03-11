<?php

require_once 'DAO.php';

class TeamDAO extends DAO
{

    /**
     * @param $arguments
     * @return array
     */
    protected function objectToArray($arguments)
    {
        $array['team'] = [];

        if (!empty($arguments)) {

            $teamArray = (array)$arguments[0];

            foreach ($teamArray as $key => $value) {
                $prop = trim(strtolower(str_replace('Team', '', $key)));
                if ($prop == 'id') {
                    if (!is_null($value)) {
                        $array['team'][0]['new'][$prop] = $value;
                    }
                } elseif ($prop == 'leader' and !is_null($value)) {
                    $array['team'][0]['new'][$prop] = $value['id'];
                } elseif ($prop == 'name') {
                    $array['team'][0]['new'][$prop] = $value;
                }
            }
        }
        return $array;
    }
}
