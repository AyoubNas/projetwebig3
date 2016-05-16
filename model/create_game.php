<?php 
function create_game($home,$away,$site,$date,$time){


	global $bdd;   

	try {

		$req = $bdd->prepare('INSERT INTO game (homeTeam, awayTeam, siteName, gameTime, gameDate) VALUES (:home,:away,:site,:gtime,:gdate)');
		$req -> bindParam(':home', $home);
		$req->bindParam(':away', $away);
		$req->bindParam(':site', $site);
		$req->bindParam(':gdate', $date);  
		$req->bindParam(':gtime', $time);  

		$req->execute();

		$req1 = $bdd->prepare("CALL game_set_gameDateTime(?)");
		$id=$bdd->lastInsertId();
		$req1->bindParam(1,$id, PDO::PARAM_STR, 4000); 
		$req1->execute();

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}
}