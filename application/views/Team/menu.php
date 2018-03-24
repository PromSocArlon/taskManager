<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <div id="mainTeamInfo" class="col form-group container card bg-light mb-3">
                <div class="card-header text-center"><h4>Team Management Form</h4></div>
                <div class="card-body" style="text-align: center;">
                    <form role="form" action="?controller=team&action=create" method="post">
                        <input type="submit" value="Create a Team" name="createTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="?controller=team&action=update" method="post">
                        <input type="submit" value="Update a Team" name="updateTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="?controller=team&action=viewTeamMembers" method="post">
                        <input type="submit" value="View Team Members" name="viewTeamMembers"
                               class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                    <form role="form" action="?controller=team&action=delete" method="post">
                        <input type="submit" value="Delete a Team" name="deleteTeam" class="btn btn-sm btn-secondary"/>
                        <br> </br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
