<?php


function get_sites(){
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM site');
	$req->execute();
	$sites=$req->fetchAll();

	return $sites;
}

?>