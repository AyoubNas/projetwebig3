<?php
function check($login,$pass){
	global $bdd;

	try{

		$req = $bdd->prepare('select playerId, count(*) as count from player where player.playerLogin=:login');
		$req -> bindParam(':login', $login);
		$req->execute();
		$res=$req->fetchAll();

		if ($res[0]['count']==1){

			$id=$res[0]['playerId'];
			$req = $bdd->prepare('select * from player where player.playerId=:id');
			$req -> bindParam(':id', $id);
			$req->execute();
			$res=$req->fetchAll();
			$salt=$res[0]['salt'];
			$password=$res[0]['playerPassword'];

			if (hash('sha256',($salt.$pass))==$password){

				return  array (
					"msg"  => "access granted",
					"id" => $res[0]['playerId']
					);

			}
			else return array(
				"msg" => "access denied");
		}
	else return array(
		"msg" => "access denied");

}

catch(PDOException $e)
{ 

	$error= $e->getMessage();


}


}