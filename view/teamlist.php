
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>Soccer !</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>








<div class="row">


	<div class="col-xs-1">
	</div>


	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				</button>
				<a class="navbar-brand active" href="profile.php"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a  href="profile.php"> Profile</a></li>
					<li  ><a href="playerlist.php"> Players</a></li>
					<li><a href="sitelist.php"> Sites </a></li>
					<li><a href="gamelist.php"> Games </a></li>
					<li class="active"><a href="teamlist.php"> Teams </a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="review.php">send a review</a></li>
					<li><a href="disconnect.php">Log out</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>



<body>
	<div class="row">

		<div class="col-xs-3">
		</div>

		<div class="col-xs-6">

			<table class="table table-striped">

				<tr> <th>Name</th> <th>creation date</th> <th></th> </tr>

				<?php foreach($teams as $team){?>

				<tr>

					<td> <?php echo $team['teamName']?></td>
					<td><?php echo $team['teamCreationDate'];?></td>
					<td>
						<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=<?php echo"#".$team['teamId'];?>>Members</button>
						<div id=<?php echo $team['teamId'];?> class="modal" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><?php echo $team['teamName']?> team sheet <small class="text-muted">Created: <?php echo $team['teamCreationDate']?></small> </h4>
									</div>
									<div class="modal-body">

										<!--profile information*********************************************************************-->

										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<div class="panel panel-default">
													<div class="panel-body">
														<div class="row">
															<div class="col-md-12 lead">Members<hr></div>
															<div class="col-md-10 col-md-offset-1">
																<table class="table">

																	<tr> <th>name</th> <th>Birth year</th><th></th> </tr>

																	<?php
																	foreach ($team['teamPlayers'] as $tPlayer) {
																		echo"<tr>";
																		if(isset($tPlayer['playerLogin'])){

																			echo "<td>".$tPlayer['playerLogin'];   

																			echo " (".$tPlayer['playerFirstName']; 
																			echo " ".$tPlayer['playerLastName'].")</td>";
																			echo "<td>".$tPlayer['playerBirthYear']."</td>";
																		}
																		echo"</tr>";
																	}
																	?>

																	
																	
																	
																</table>
															</div>








															
														</div>

													</div>
												</div>
											</div>
										</div>

										<!--profile information****************END******************************************************-->
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>

						<form method="post" action="teamlist.php" class="form-inline" role="form"><input type="hidden" name="action" value="changeTeam" required> <input type="hidden" name="playerId" value=<?php echo "\"".$profile[0]['playerId']."\"";?>> <input type="hidden" name="teamId" value=<?php echo"\"".$team['teamId']."\"";?>> <button type="submit">join</button></form>

					</td>
				</tr>
				


				
				<?php }?>


			</table>


		</div>

	</div>








	







	<div id="profileFromTeamModal" class="modal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->

			<div class="modal-body">





				<!--profile information*********************************************************************-->


				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 lead">"nickname"'s profile<hr></div>
							</div>
							<div class="row">

								<div class="col-md-8">
									<div class="row">
										<div class="col-md-6">

											<span class="text-muted">Name </span> namenamebnaena<br>
											<span class="text-muted">Birth year :</span> 2001<br>
											<span class="text-muted">Teams </span> barça/real/paris<br>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!--profile information****************END******************************************************-->
			</div>


		</div>
	</div>



	<?php include("footer.php"); ?>
</body>
</html>