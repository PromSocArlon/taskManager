<div class="row">
    <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
        <div class="card-header text-center"><h4>Team Update Form</h4></div>
        <form action='?controller=Team&action=update' method='post'>
            <div class="card-body" style="text-align: center;">
                <div class="form-group">
                    <label for="teamName">Team ID : </label>
                    <input type="text" name="id" class="form-control" readonly
                           value="  <?php echo $data['team']->getId() ?>"/>
                </div>
                <div class="form-group">
                    <label for="teamName">Team name : </label>
                    <input type="text" name="name" class="form-control" value="  <?php echo $data['team']->getName() ?>"
                           required/>
                </div>
                <div class="form-group"
                <label for="TeamLeaderSelection">Leader :</label>
                <select name="leader" size="1">
                    <?php
                    foreach ($data['members'] as $row) {
                        $leader = $data['team']->getLeader();
                        $leaderId = (is_null($leader)) ? null : $leader->getID();
                        $result = ($row->getID() == $leaderId) ? ' selected' : '';
                        echo '<option value="'. $row->getID() .'"' . $result . '>' . $row->getLogin() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group container h-50 card bg-light mb-3">
                <div class="card-header text-center">
                    Team Members :
                    <div class=" btn-group">

                        <select name="members[]" multiple size=" <?php echo count($data['members']) ?>'">
                            <?php
                            foreach ($data['members'] as $row) {
                                $result = ($data['team']->getMembers()->contains($row)) ? ' selected' : '';
                                echo '<option value="'. $row->getID() .'"' . $result . '>' . $row->getLogin() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group container h-50 card bg-light mb-3">
                <div class="card-header text-center">
                    Team Tasks :
                    <div class=" btn-group">

                        <select name="tasks[]" multiple size=" <?php echo count($data['tasks']) ?>'">
                            <?php
                            foreach ($data['tasks'] as $row) {
                                $result = ($data['team']->getTasks()->contains($row)) ? ' selected' : '';
                                echo '<option value="'. $row->getID() .'"' . $result . '>' . $row->getName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Team" name="updateTeam" class="btn btn-sm btn-secondary"/>
            <input type="button" name="Cancel Team update" value="Cancel Update"
                   onClick="location.href='index.php'" class="btn btn-sm btn-secondary"/>
        </form>
    </div>
</div>
</div>
