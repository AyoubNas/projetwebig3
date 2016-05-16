<?php
function get_players()
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT  playerId, playerLogin, playerFirstName, playerLastName,playerBirthYear, playerTeam, teamName FROM player LEFT OUTER JOIN team ON player.playerTeam=team.teamId;'); 

	
	$req->execute();
	$players = $req->fetchAll();
	
	
	return $players;
}

