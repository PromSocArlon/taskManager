<?php

namespace app\models\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_task")
 **/
class Task extends Entity
{

    const PENDING = 0;
    const PLANNED = 1;
    const IN_PROGRESS = 2;
    const COMPLETED = 3;

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
     * @ORM\JoinTable(name="tbl_member_team")
     **/
    private $members;
    /**
     * @ORM\ManyToMany(targetEntity=Team::class)
     * @ORM\JoinTable(name="tbl_task_team")
     **/
    private $team;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->team = new ArrayCollection();
    }

    /**
     * @param String $name
     */
    public function setName(String $name)
    {
        $this->name = ucfirst(strtolower($name));
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $priority
     */
    public function setPriority(String $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return String
     */
    public function getPriority(): String
    {
        return $this->priority;
    }

    /**
     * @param String $description
     */
    public function setDescription(String $description)
    {
        $this->description = $description;
    }

    /**
     * @return String
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @param int $statusName
     * @param string $description
     */
    public function addStatus(int $statusName, string $description): void
    {
        if ($description != "") {
            $status[] = new Status($statusName, $description);
        }
    }

    /**
     * @param int $index
     */
    public function removeStatus(int $index): void
    {
        if ($index >= 0 && $index < count($this->status)) {
            array_splice($this->status, $index, 1);
        }
    }

    /**
     * @param int $index
     * @return Status
     */
    public function getStatus(int $index): Status
    {
        if ($index >= 0 && $index < count($this->status)) {
            return $this->status[$index];
        } else {
            return null;
        }
    }

    public function setStatus(int $st): void
    {


        $tabStatus = ["Pending", "Planned", "In Progress", "Completed"];

        switch ($st) {
            case Task::PENDING:
            case Task::PLANNED:
            case Task::IN_PROGRESS:
            case Task::COMPLETED:
                $this->status = $tabStatus[$st];
                break;
            default:
                $this->status = "Pending";
                break;
        }
    }

    public function setMembers(array $member): void
    {
        $this->members = $member;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function addMember(Member $members): bool
    {
        return $this->members->add($members);
    }
    public function removeMember(Member $members): bool
    {
        return $this->members->removeElement($members);
    }

    public function setTeam(array $team): void
    {
        $this->members = $team;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function addTeam(Team $team): bool
    {
        return $this->team->add($team);
    }
    public function removeTeam(Team $team): bool
    {
        return $this->team->removeElement($team);
    }

    public function entityToArray()
    {
        return get_object_vars($this);
    }

}