<?php

namespace app\models\Entity;

class Team extends Entity
{

    private $name;
    /**
     * @var Member
     */
    private $leader;


    //public function __construct($idMember)
    public function __construct()
    {
        //$this->members[0] = new Member();
    }

    public function setName($new_teamName)
    {                              //save in database
        $this->name = $new_teamName;
    }

    public function getName()
    {                                           // from database
        return $this->name;
    }

    public function setLeader($new_teamLeader)
    {
        $this->leader = $new_teamLeader;
    }

    public function getLeader()
    {
        return $this->leader;
    }

    public function entityToArray()
    {
        return get_object_vars($this);
    }

}