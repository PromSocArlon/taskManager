<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 30-01-18
 * Time: 23:02
 */

require_once '../controllers/taskEditorController.php';

?>

<!DOCTYPE html>

<html>
	<head>
		<title>TaskManager - TaskEditor</title>
		<link type="text/css" rel="stylesheet" href="CSS/taskEditor.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="border border-secondary rounded w-50 mx-auto mt-5 p-4">
			<div id="task" class="container w-100">
				<div class="row">
					<div id="mainTaskInfo" class="col form-group container card bg-light mb-3">
						<div class="card-header text-center"><h4>Task</h4></div>
						<div class="card-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Task Name: </span>
								</div>
								<input type="text" class="form-control" aria-label="Task Name: " aria-describedby="inputGroup-sizing-default" name="taskName" title="Task Name" placeholder="Enter text here !">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">Priority: </span>
								</div>
								<input type="text" class="form-control" aria-label="Priority: " aria-describedby="inputGroup-sizing-default" name="taskPriority" title="Task Priority" placeholder="Enter text here !">
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Description: </span>
								</div>
								<textarea rows="10" class="form-control" aria-label="Description" name="taskDescription" title="Description" placeholder="Enter text here !"></textarea>
							</div>
							<div class="form-check form-check-inline">
								<input type="checkbox" name="repetitive" title="Repetitive" class="form-check-input">
								<label for="repetitive" class="for-check-label">Repetitive ?</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="checkbox" name="collaborative" title="Collaborative" class="form-check-input">
								<label for="collaborative" class="for-check-label">Collaborative ?</label>
							</div>
						</div>
					</div>
					<div class="col w-100">
						<div id="statusInfo" class="form-group container card bg-light mb-3">
							<div class="card-header text-center">
								Status:
								<input type="button" value="+" name="addStatus" class="btn btn-sm btn-secondary"/>
								<input type="button" value="History" name="statusHystory" class="btn btn-sm btn-secondary"/>
							</div>
							<div class="card-body">
								<select title="statusType" name="statusType" class="form-control mb-3">
									<option name="0">Non defini</option>
									<option name="1">A faire</option>
									<option name="2">Bloque</option>
									<option name="3">Inactif</option>
									<option name="4">Termine</option>
								</select>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Reason: </span>
									</div>
									<textarea rows="3" class="form-control" aria-label="Reason" name="statusReason" title="Description" placeholder="Enter text here !"></textarea>
								</div>
							</div>
						</div>
						<div id="collaboratorsInfo" class="container">
							<h1>Collaborators - TO-DO</h1>
						</div>
					</div>
					<!--Ligne vide-->
					<div class="w-100"></div>
					<div class="row mx-auto">
						<div class="btn-group w-100">
							<input type="button" title="OK" name="OK" value="Ok !" class="btn btn-secondary">
							<input type="button" title="Cancel" name="Cancel" value="Cancel !" class="btn btn-secondary">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
