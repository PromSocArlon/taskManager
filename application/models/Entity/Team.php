<?php

namespace app\models\Entity;

//use Doctrine\common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_team")
 */
class Team extends Entity
{
    /** @ORM\Column(type="string") **/
    private $name;

    /** @ORM\OneToOne(targetEntity=Member::class)  **/
    private $leader;
    /**
     * @ORM\ManyToMany(targetEntity=Member::class)
     * @ORM\JoinTable(name="tbl_member_team")
     **/
    private $members;

    /**
     * @ORM\ManyToMany(targetEntity=Task::class)
     * @ORM\JoinTable(name="tbl_task_team")
     **/
    private $tasks;


    //public function __construct($idMember)
    public function __construct()
    {
        $this->members=new ArrayCollection();
        //$this->members[0] = new Member();
    }

    public function setName($new_teamName):void
    {                              //save in database
        $this->name = $new_teamName;
    }

    public function getName():string
    {                                           // from database
        return $this->name;
    }

    public function setLeader($new_teamLeader):void
    {
        $this->leader = $new_teamLeader;
    }

    public function getLeader()
    {
        return $this->leader;
    }

    public function getMembers()
    {
        return $this->members;
    }
    public function  setMembers($members)
    {
        $this->members=$members;
    }

//    public function entityToArray()
//    {
//        return get_object_vars($this);
//    }
}