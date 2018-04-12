<?php

namespace app\models\DAO;

use app\models\Entity;

class TeamDAO extends \app\core\DAO
{
    /**
     * @param int $teamId
     * @return int
     */
    public function getCountOfMembersFromTeam(int $teamId): int
    {
        $sql = "SELECT COUNT(fk_member_id)as nbMembers 
                FROM tbl_member_team 
                WHERE tbl_member_team.fk_team_id=" . $teamId . ";";
        $request = $this->connection->query($sql);
        $result = $request->fetch(\PDO::FETCH_ASSOC);
        return intval($result['nbMembers']);
    }

    /**
     * @param Entity\Team $team
     * @return array
     */
    public function getAllMembersFromTeam(Entity\Team $team): array
    {
        $sql = "SELECT tbl_member.* 
                FROM tbl_member_team 
                INNER JOIN tbl_member ON tbl_member_team.fk_member_id= tbl_member.id 
                WHERE fk_team_id= " . $team->getID() . ";";
        $result = $this->connection->Query($sql);
        $members = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $members[$row['id']]['id'] = $row['id'];
            $members[$row['id']]['login'] = $row['login'];
            $members[$row['id']]['mail'] = $row['mail'];
        }
        return $members;
    }

    /**
     * @param Entity\Team $team
     * @param int $memberId
     * @return bool
     * @throws \Exception
     */
    public function addMemberToTeam(Entity\Team $team, int $memberId): bool
    {
        $sql = "INSERT INTO tbl_member_team (fk_member_id, fk_team_id) 
                VALUES (" . $memberId . "," . $team->getID() . ");";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param Entity\Team $team
     * @param int $memberId
     * @return bool
     * @throws \Exception
     */
    public function removeMemberFromTeam(Entity\Team $team, int $memberId): bool
    {
        $sql = "DELETE FROM tbl_member_team 
                WHERE fk_team_id = " . $team->getID() . " 
                AND fk_member_id =" . $memberId . ";";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param Entity\Team $team
     * @return bool
     * @throws \Exception
     */
    public function removeAllMembersFromTeam(Entity\Team $team): bool
    {
        $sql = "DELETE FROM tbl_member_team 
                WHERE fk_team_id = " . $team->getID() . ";";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param int $teamId
     * @return int
     */
    public function getCountOfTasksFromTeam(int $teamId): int
    {
        $sql = "SELECT COUNT(fk_task_id) as nbTasks 
                FROM tbl_task_team 
                WHERE tbl_task_team.fk_team_id=" . $teamId . ";";
        $request = $this->connection->query($sql);
        $result = $request->fetch(\PDO::FETCH_ASSOC);
        return intval($result['nbTasks']);
    }

    /**
     * @param Entity\Team $team
     * @return array
     */
    public function getAllTasksFromTeam(Entity\Team $team): array
    {
        $sql = "SELECT tbl_task.id,tbl_task.name,tbl_task.priority,tbl_task.description,tbl_task.status,tbl_task.subtasks,tbl_day.name as day 
                FROM tbl_task_team 
                INNER JOIN tbl_task ON tbl_task_team.fk_task_id = tbl_task.id 
                JOIN tbl_day ON tbl_task.day = tbl_day.id 
                WHERE tbl_task_team.fk_team_id= " . $team->getID() . ";";
        $result = $this->connection->query($sql);

        $tasks = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[$row['id']]['id'] = $row['id'];
            $tasks[$row['id']]['name'] = $row['name'];
            $tasks[$row['id']]['priority'] = $row['priority'];
            $tasks[$row['id']]['description'] = $row['description'];
            $tasks[$row['id']]['status'] = $row['status'];
            $tasks[$row['id']]['subtasks'] = $row['subtasks'];
            $tasks[$row['id']]['day'] = $row['day'];
        }
        return $tasks;
    }

    /**
     * @param Entity\Team $team
     * @param int $taskId
     * @return bool
     * @throws \Exception
     */
    public function addTaskToTeam(Entity\Team $team, int $taskId): bool
    {
        $sql = "INSERT INTO tbl_task_team (fk_task_id, fk_team_id) 
                VALUES (" . $taskId . "," . $team->getID() . ");";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param Entity\Team $team
     * @param int $taskId
     * @return bool
     * @throws \Exception
     */
    public function removeTaskFromTeam(Entity\Team $team, int $taskId): bool
    {
        $sql = "DELETE FROM tbl_task_team 
                WHERE fk_team_id = " . $team->getID() . " 
                AND fk_task_id =" . $taskId . ";";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param Entity\Team $team
     * @return bool
     * @throws \Exception
     */
    public function removeAllTasksFromTeam(Entity\Team $team): bool
    {
        $sql = "DELETE FROM tbl_task_team 
                WHERE fk_team_id = " . $team->getID() . ";";
        $request = $this->connection->query($sql);
        if ($request->errorInfo()[0] != "00000") {
            throw new \Exception($request->errorInfo());
        }
        return true;
    }

    /**
     * @param $arguments
     * @return array
     */
    protected function objectToArray($object): array
    {
        $array['team'] = [];
        if (!empty($object)) {
            $teamArray = $object->entityToArray();

            $array['team']['id'] = $teamArray['id'];
            $array['team']['name'] = $teamArray['name'];
            $array['team']['leader'] = $teamArray['leader'];
        }
        return $array;
    }

}
