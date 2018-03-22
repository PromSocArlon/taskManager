<?php

class MemberTeam
{
    private $memberId;
    private $teamId;

    public function __construct($memberId, $teamId)
    {
        $this->memberId = $memberId;
        $this->teamId = $teamId;
    }

    public function getMemberId()
    {
        return $this->memberId;
    }

    public function getTeamId()
    {
        return $this->teamId;
    }
}