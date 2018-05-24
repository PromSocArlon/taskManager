<div class="row">
    <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
        <div class="card-header text-center"><h4>Team Creation Form</h4></div>
        <form action='?controller=Team&action=save' method='post'>
            <div class="card-body" style="text-align: center;">
                <div class="form-group">
                    <label for="teamName">Team name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter team name"/>
                </div>
                <div class="form-group">
                    <label for="TeamLeaderSelection">Please select the teamleader :</label><br>
                    <select name="leader" size="1">
                        <?php
                        foreach ($data['members'] as $row) {
                            echo '<option value="'. $row->getID() .'">' . $row->getLogin() . '</option>';
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
                                    echo '<option value="'. $row->getID() .'">' . $row->getLogin() . '</option>';
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
                                    echo '<option value="'. $row->getID() .'">' . $row->getName() . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Create Team" name="createNewTeam" class="btn btn-sm btn-secondary"/>
            </div>
        </form>
        <a href="index.php" class="btn btn-sm btn-secondary" name="Cancel Team Creation" role="button">Cancel
            Creation</a>
    </div>
</div>

