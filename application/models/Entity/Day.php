<?php
namespace app\models\Entity;

class Day {

    const MONDAY = 'monday';
    const TUESDAY = 'tuesday';
    const WEDNESDAY = 'wednesday';
    const THURSDAY = 'thursday';
    const FRIDAY = 'friday';
    const SATURDAY = 'saturday';
    const SUNDAY = 'sunday';

    private $name;
    private $tasks;

    public function __construct($name)
    {
        $this->setName($name);
        $this->tasks = [];
    }

    public function addTask(Task $task)
    {
        $this->tasks[] = $task;
    }

    public function updateTask($number, $task)
    {
        $this->tasks[$number-1] = $task;
    }

    public function deleteTask($indice){
        if(count($this->getTasks()) > 1) unset($this->tasks[$indice - 1]);
        else array_splice($this->tasks,0,1);
        $this->tasks = array_values($this->tasks);
    }
    public function setName($name)
    {
        $name = strtolower($name);
        switch ($name) {
            case self::MONDAY:
            case self::TUESDAY:
            case self::WEDNESDAY:
            case self::THURSDAY:
            case self::FRIDAY:
            case self::SATURDAY:
            case self::SUNDAY:
                $this->name = $name;
                break;
            default:
                break;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Return an array of all days name.
     *
     * @return array
     */
    public static function getAllDaysName()
    {
        return [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday'
        ];
    }


}