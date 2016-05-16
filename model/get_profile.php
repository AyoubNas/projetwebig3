<?php
function get_profile($data)
{
	global $bdd;
	
	$req = $bdd->prepare('SELECT * from player where player.playerId=:playerId');
	$req->bindParam(':playerId', $data); 
	$req->execute();
	$profile = $req->fetchAll();
	
	
	return $profile;
}
