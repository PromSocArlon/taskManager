<?php

namespace app\models\DAO;

use app\models\Entity;

class TeamDAO extends \app\core\DAO
{

    /**
     * @param $arguments
     * @return array
     */
    protected function objectToArray($object)
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

    public function  getCountOfMembersFromTeam(int $teamId){
        $sql="SELECT COUNT(fk_member_id)as nbMembers FROM tbl_member_team WHERE tbl_member_team.fk_team_id=". $teamId . ";" ;
        $request=$this->connection->query($sql);
        return $request->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllMembersFromTeam(Entity\Team $team)
    {
        $sql ="SELECT tbl_member.* FROM tbl_member_team INNER JOIN tbl_member on tbl_member_team.fk_member_id= tbl_member.id where fk_team_id= " .$team->getID() . ";";
        $result=$this->connection->Query($sql);
        $members =[];
        while($row =$result->fetch(\PDO::FETCH_ASSOC)){
            //echo $row;
            $members[$row['id']]['id']=$row['id'];
            $members[$row['id']]['login']=$row['login'];
            $members[$row['id']]['mail']=$row['mail'];
        }
        return $members;
    }
    public function addMemberToTeam( Entity\Team $team, int $memberId)   {
        //TODO TO IMPLEMENT
    }
    public function RemoveMemberFromTeam(Entity\Team $team,int $memberId)  {
        //TODO TO IMPLEMENT
    }

    public function  getCountOfTasksFromTeam(int $teamId){
        $sql="SELECT COUNT(fk_task_id) as nbTasks FROM tbl_task_team WHERE tbl_task_team.fk_team_id=". $teamId . ";" ;
        $request=$this->connection->query($sql);
        return $request->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllTasksFromTeam(Entity\Team $team)
    {
        $sql="SELECT tbl_task.id,tbl_task.name,tbl_task.priority,tbl_task.description,tbl_task.status,tbl_task.subtasks,tbl_day.name as day FROM tbl_task_team INNER JOIN tbl_task on tbl_task_team.fk_task_id = tbl_task.id JOIN tbl_day on tbl_task.day = tbl_day.id where tbl_task_team.fk_team_id= " .$team->getID() . ";";
        $result=$this->connection->query($sql);
        $tasks=[];
        while ($row=$result->fetch(\PDO::FETCH_ASSOC)){
            $tasks[$row['id']]['id']=$row['id'];
            $tasks[$row['id']]['name']=$row['name'];
            $tasks[$row['id']]['priority']=$row['priority'];
            $tasks[$row['id']]['description']=$row['description'];
            $tasks[$row['id']]['status']=$row['status'];
            $tasks[$row['id']]['subtasks']=$row['subtasks'];
            $tasks[$row['id']]['day']=$row['day'];
        }
        return $tasks;
    }

    public function addTaskToTeam (Entity\Team $team ,int $taskId)  {
        //TODO TO IMPLEMENT
    }
    public function removeTaskFromTeam(Entity\Team $team,int $taskId)  {
        //TODO TO IMPLEMENT
    }

}
