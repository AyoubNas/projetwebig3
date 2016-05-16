<?php
function get_games()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT game.gameId, game.gameDateTime, t1.teamName as away, t2.teamName as home, game.siteName , site.surface from game, team t1, team t2,site where game.awayTeam=t2.teamId AND game.homeTeam=t1.teamId and site.siteName=game.siteName'); 
	$req->execute();
	$games = $req->fetchAll();
	
	
	return $games;
}

function update_game($game,$site,$date,$time){

	global $bdd;

	try{

		$req= $bdd->prepare('update game set siteName=:site, gameDate=:date, gameTime=:time where gameId=:game');
		$req->bindParam(':game', $game);
		$req->bindParam(':date', $date);
		$req->bindParam(':time', $time);
		$req->bindParam(':site', $site);
		$req->execute();

		$req1 = $bdd->prepare("CALL game_set_gameDateTime(?)");
		$req1->bindParam(1,$game, PDO::PARAM_STR, 4000); 
		$req1->execute();
	}

	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}
}

function delete_game($gameId){

	global $bdd;

	$req= $bdd->prepare('delete from game where gameId=:game');
	$req->bindParam(':game', $gameId);
	$req->execute();




}