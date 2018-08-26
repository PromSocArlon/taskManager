<?php

namespace app\models\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_task")
 **/
class Task extends Entity
{
    /** @ORM\Column(type="string", length=100) * */
    private $name;
    /** @ORM\Column(type="smallint") * */
    private $priority;
    /** @ORM\Column(type="text") * */
    private $description;
    /** @ORM\Column(type="string", length=20) * */
    private $status;
    /**
     * @ORM\ManyToMany(targetEntity=Member::class)
     * @ORM\JoinTable(name="tbl_member_task")
     **/
    private $members;
    /**
     * @ORM\ManyToMany(targetEntity=Team::class)
     **/

    private $team;
    /**
     * @ORM\OneToMany(targetEntity=subTask::class, mappedBy="task", cascade={"remove"})
     *
     **/
     private $subTasks;
    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->team = new ArrayCollection();
        $this->subTasks = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     * @throws \Exception
     */
    public function setStatus($status): void
    {
        switch($status) {
            case TaskStatus::PENDING:
            case TaskStatus::IN_PROGRESS:
            case TaskStatus::PLANNED:
            case TaskStatus::COMPLETED:
                $this->status = $status;
                break;
            default:
                throw new \Exception("Invalid status :" . $status);
        }
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param mixed $members
     */
    public function setMembers($members): void
    {
        $this->members = $members;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team): void
    {
        $this->team = $team;
    }

    /**
     * @return mixed
     */
    public function getSubTasks()
    {
        return $this->$subTasks;
    }

    /**
     * @param mixed $subTasks
     */
   public function setSubTask(array $subTasks)
    {
        $this->subTasks = $subTasks;
    }

    public function addSubTask(SubTask $subTask): bool
    {
        return $this->subTasks->add($subTask);
    }

    public function removeTask(SubTask $subTask): bool
    {
        return $this->subTask->removeElement($subTask);
    }

}