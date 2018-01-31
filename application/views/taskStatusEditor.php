<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 31-01-18
 * Time: 17:03
 */

?>

<!DOCTYPE html>

<html>
	<head>
		<title>TaskManager - Status Editor</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="border border-secondary rounded w-50 mx-auto mt-5 p-4">
			<div id="taskStatusInfo" class="form-group container card bg-light mb-3">
				<div class="card-header text-center">
					Task status
					<div class="float-right">
						<input type="button" value="+" name="addStatus" class="btn btn-sm btn-secondary"/>
						<input type="button" value="-" name="removeStatus" class="btn btn-sm btn-secondary"/>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Status type</th>
								<th scope="col">Reason</th>
								<th scope="col">Time</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">Init</th>
								<td>Initialisation</td>
								<td>30-01-2018</td>
							</tr>
						</tbody>
					</table>
					<input type="button" value="OK !" name="returnToStatus" class="btn btn-sm btn-secondary float-right"/>
				</div>
			</div>
		</div>
	</body>
</html>
