<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 30-01-18
 * Time: 23:02
 */
require_once '../controllers/TaskEditorController.php';
require_once '../models/Entity/Status.php';
require_once '../core/bootstrapTheme.php'
?>

<!DOCTYPE html>

<html>
	<head>
		<title>TaskManager - TaskEditor</title>
		<?php echo getBootstrapTag(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
			<div id="task" class="container w-100">
				<div class="row">
					<div id="mainTaskInfo" class="col form-group container card bg-light mb-3">
						<div class="card-header text-center"><h4>Task</h4></div>
						<div class="card-body">
							<?php
								echo getTextField("Task Name", "taskName");
								echo getTextField("Priority", "taskPriority");
								echo getTextarea("Description", "taskDescription", 10);
								echo getCheckBox("Repetitive","repetitive");
								echo getCheckBox("Collaborative", "collaborative");
							?>
						</div>
					</div>
					<div class="col w-100 h-100">
						<div id="statusInfo" class="form-group container h-50 card bg-light mb-3">
							<div class="card-header text-center">
								Status:
								<div class="float-right btn-group">
									<?php
										echo getButton("+","addStatus");
										echo getButton("History","statusHistory");
									?>
								</div>
							</div>
							<div class="card-body">
								<select title="statusType" name="statusType" class="form-control mb-3">
									<?php
										for ($i=0;$i<6;++$i) {
											echo "<option name='".$i."'>".Status::getStatusMeaningByIndex($i)."</option>";
										}
									?>
								</select>
								<?php echo getTextarea("Reason", "statusReason", 3);?>
							</div>
						</div>
						<div id="collaboratorsInfo" class="form-group container h-50 card bg-light mb-3">
							<div class="card-header text-center">
								Collaborators:
								<div class="float-right btn-group">
									<?php
										echo getButton("+","addCollaborators");
										echo getButton("-","removeCollaborators");
									?>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-sm table-hover">
									<thead class="thead-dark">
										<tr>
											<th scope="col">#</th>
											<th scope="col">Name</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Ronny Damme</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!--Ligne vide-->
					<div class="w-100"></div>
					<div class="row mx-auto">
						<div class="btn-group w-100">
							<?php
								echo getButton("OK !","Ok");
								echo getButton("Cancel !","Cancel");
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>