<?php

function get_team_players($data){
	global $bdd;
	$req = $bdd->prepare('SELECT player.playerLogin, player.playerFirstName,player.playerLastName, player.playerBirthYear FROM  player WHERE  player.playerTeam=:teamId');
	$req->bindParam(':teamId', $data);
	$req->execute();
	$teamPlayers=$req->fetchAll();

	return $teamPlayers;
}


function get_teams(){
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM team');
	$req->execute();
	$teams=$req->fetchAll();

	return $teams;
}


?>