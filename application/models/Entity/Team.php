<?php

namespace app\models\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_team")
 */
class Team extends Entity
{
    /**
     * @ORM\Column(type="string",unique=TRUE)
     */
    private $name;
    /**
     * @ORM\ManyToOne(targetEntity=Member::class)
     */
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

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getLeader()
    {
        return $this->leader;
    }

    public function setLeader($leader): void
    {
        $this->leader = $leader;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function setMembers(array $members)
    {
        $this->members = $members;
    }

    public function addMember(Member $member): bool
    {
        return $this->members->add($member);
    }

    public function removeMember(Member $member): bool
    {
        $this->members->removeElement($member);
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function setTasks(array $tasks)
    {
        $this->tasks = $tasks;
    }

    public function addTask(Task $task): bool
    {
        return $this->tasks->add($task);
    }

    public function removeTask(Task $task): bool
    {
        return $this->tasks->removeElement($task);
    }
}