
<?php


function update_profile($id,$login,$firstName,$lastName,$birthYear,$email,$password,$salt)

{


	global $bdd;   

	try {

		$req = $bdd->prepare("update  player  set playerPassword=:password, salt=:salt, playerLogin=:login, playerFirstName=:firstName, playerLastName=:lastName, playerBirthYear=:birthYear, playerEmail=:email where player.playerId=:playerId");
		$req -> bindParam(':firstName', $firstName);
		$req->bindParam(':lastName', $lastName);
		$req->bindParam(':birthYear', $birthYear);
		$req->bindParam(':email', $email);
		$req->bindParam(':playerId', $id);    
		$req->bindParam(':login', $login);    
		$req->bindParam(':password', $password);    
		$req->bindParam(':salt', $salt);    
		$req->execute();

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}

}
function update_profile_not_password($id,$login,$firstName,$lastName,$birthYear,$email)

{


	global $bdd;   

	try {

		$req = $bdd->prepare("update  player  set playerLogin=:login, playerFirstName=:firstName, playerLastName=:lastName, playerBirthYear=:birthYear, playerEmail=:email where player.playerId=:playerId");
		$req -> bindParam(':firstName', $firstName);
		$req->bindParam(':lastName', $lastName);
		$req->bindParam(':birthYear', $birthYear);
		$req->bindParam(':email', $email);
		$req->bindParam(':playerId', $id);    
		$req->bindParam(':playerLogin', $login);    

		$req->execute();

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}

}