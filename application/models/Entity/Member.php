<?php

namespace app\models\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_member")
 **/
class Member extends Entity
{
    /** @ORM\Column(type="string", unique=true, nullable=false) * */
    private $login;
    /** @ORM\Column(type="string") * */
    private $password;
    /** @ORM\Column(type="string") * */
    private $mail;
    /**
     * @ORM\ManyToMany(targetEntity=Team::class,mappedBy="members")
     */
    protected $teams;
    /**
     * @ORM\ManyToMany(targetEntity=Task::class, inversedBy="members", cascade={"persist"})
     * @ORM\JoinTable(name="tbl_member_task")
     **/
    protected $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param mixed $tasks
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }
	
	public function setTeams($new_teams)
    {
        $this->teams = $new_teams;
    }

    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

}