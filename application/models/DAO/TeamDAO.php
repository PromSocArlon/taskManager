<?php

namespace app\models\DAO;

class TeamDAO extends \app\core\DAO
{

    /**
     * @param $arguments
     * @return array
     */
    protected function objectToArray($object)
    {
        $array['team'] = [];

        if (!empty($object)) {

            /*            $teamArray = (array)$arguments[0];

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
                        }*/
            $array['team']['name'] = $object->getName();
            $array['team']['leader'] = $object->getLeader();
            $array['team']['id'] = $object->getID();
        }
        return $array;
    }
}
