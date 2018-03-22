<?php

class TaskTeam
{
    private $taskId;
    private $teamId;

    public function __construct($taskId, $teamId)
    {
        $this->taskId = $taskId;
        $this->teamId = $teamId;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getTeamId()
    {
        return $this->teamId;
    }
}
