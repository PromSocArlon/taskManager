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
            $teamArray = $object->entityToArray();

            $array['team']['id'] = $teamArray['id'];
            $array['team']['name'] = $teamArray['name'];
            $array['team']['leader'] = $teamArray['leader'];

        }
        return $array;
    }
}
