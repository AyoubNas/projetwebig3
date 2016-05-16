<?php 

include('../model/get_players.php');
include('../model/create_player.php');
if (!(isset($_COOKIE['id']))) header('Location: login.php');



try {
	$bdd = new PDO('mysql:host='.getenv('OPENSHIFT_MYSQL_DB_HOST').';dbname='.getenv('OPENSHIFT_APP_NAME'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    // set the PDO error mode to exception
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}



$players=get_players();
foreach($players as $row => $player)
{

	$players[$row]['playerLogin'] = htmlspecialchars($player['playerLogin']);
	$players[$row]['playerFirstName'] = htmlspecialchars($player['playerFirstName']);
	$players[$row]['playerLastName'] = htmlspecialchars($player['playerLastName']);
	$players[$row]['playerBirthYear'] = htmlspecialchars($player['playerBirthYear']);
	$players[$row]['playerTeam'] = htmlspecialchars($player['playerTeam']);
	$players[$row]['teamName'] = htmlspecialchars($player['teamName']);

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if ($_POST['action']=='createPlayer'){

		if (isset($_POST['login'])){

			$login=$_POST['login'];
		}

		if (isset($_POST['firstName'])){

			$firstName=$_POST['firstName'];
		}

		if (isset($_POST['lastName'])){
			$lastName=$_POST['lastName'];
		}
		if (isset($_POST['email'])){
			$email=$_POST['email'];
		}	
		if (isset($_POST['birthYear'])){
			$birthYear=$_POST['birthYear'];
		}	

		if (isset($_POST['password'])){
			$password=$_POST['password'];
		}

		$salt = openssl_random_pseudo_bytes (10);
		$error=create_player($login,$firstName,$lastName,hash('sha256',$salt.$password),$birthYear,$email,$salt);

		if (!(isset($error)) )	
			header("Refresh:0");
	}

	if ($_POST['action']=='deletePlayer'){

		if (isset($_POST['playerId'])){



			$id=$_POST['playerId'];

		}

		delete_player($id);
		header("Refresh:0");
	}

	if ($_POST['action']=='updatePlayer'){

		foreach ($_POST as $key) {

		}
		
		if (isset($_POST['login'])){

			$login=$_POST['login'];
		}	

		if (isset($_POST['playerId'])){

			$playerId=$_POST['playerId'];
		}

		if (isset($_POST['fname'])){

			$firstName=$_POST['fname'];
		}

		if (isset($_POST['lname'])){
			$lastName=$_POST['lname'];
		}
		if (isset($_POST['email'])){
			$email=$_POST['email'];
		}	
		if (isset($_POST['birthYear'])){
			$birthYear=$_POST['birthYear'];
		}	

		if (isset($_POST['password'])){
			$password=$_POST['password'];
			$salt=openssl_random_pseudo_bytes (10);
			$pass=hash('sha256', $salt.$password);
		}


		$error=edit_profile($playerId,$login,$firstName,$lastName,$pass,$birthYear,$email,$pass,$salt);
		if (!(isset($error)) )
			header("Refresh:0");

	}

}
include_once('../view/playerlist.php');
?>