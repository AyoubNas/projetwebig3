<?php 
function create_player($login,$firstName,$lastName,$password,$birthYear,$email,$salt){


	global $bdd;   

	try {


		$req = $bdd->prepare('INSERT INTO player (playerLogin, playerFirstName, playerLastName, playerBirthYear, playerEmail,playerPassword,salt) VALUES (:login,:fname,:lname,:byear,:email,:pass,:salt)');
		$req -> bindParam(':login', $login);
		$req->bindParam(':fname', $firstName);
		$req->bindParam(':lname', $lastName);
		$req->bindParam(':byear', $birthYear);  
		$req->bindParam(':email', $email);  
		$req->bindParam(':pass', $password);
		$req->bindParam(':salt', $salt); 

		$req->execute();
		return array('id'=>$bdd->lastInsertId()); 

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		array('error'=>$error);


	}
}



function delete_player($playerId){

	global $bdd;

	$req= $bdd->prepare('delete from player where playerId=:id');
	$req->bindParam(':id', $playerId);
	$req->execute();




}


function edit_profile($id,$login,$firstName,$lastName,$pass,$birthYear,$email,$password,$salt)

{

	global $bdd;   

	try {

		$req = $bdd->prepare("update  player  set playerLogin=:login, playerFirstName=:firstName, playerLastName=:lastName, playerBirthYear=:birthYear, playerEmail=:email, playerPassword=:password,salt=:salt where player.playerId=:id");

		$req -> bindParam(':login',$login);	
		$req -> bindParam(':firstName', $firstName);
		$req->bindParam(':lastName', $lastName);
		$req->bindParam(':birthYear', $birthYear);
		$req->bindParam(':email', $email);    
		$req -> bindParam(':id',$id);
		$req -> bindParam(':password',$password);
		$req -> bindParam(':salt',$salt);

		$req->execute();

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}

}

function player_join_team($pid,$tid){

	global $bdd;

	try {

		$req = $bdd->prepare("update  player  set playerTeam=:tid where player.playerId=:pid");
		$req->bindParam(':pid', $pid);    
		$req -> bindParam(':tid',$tid);

		$req->execute();

	}
	catch(PDOException $e)
	{
		$error=substr($e->getMessage(), 71, -18);
		return $error;

	}	


}


