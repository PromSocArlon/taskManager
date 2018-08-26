<?php
/**
 * Created by PhpStorm.
 * User: Voahirana
 * Date: 21-08-18
 * Time: 19:14
 */

namespace app\models\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_subtask")
 **/

class SubTask extends Entity
{
    /** @ORM\Column(type="string", length=100) * */
    private $name;
    /** @ORM\Column(type="text") * */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class, inversedBy="subTasks")
     * @ORM\JoinTable(name="task_id")
     **/
   private $task;

    public function __construct()
    {

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
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task): void
    {
        $this->task = $task;
    }
}