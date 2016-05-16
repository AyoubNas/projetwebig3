<?php 

include('../model/get_teams.php');
include('../model/create_player.php');
include('../model/get_profile.php');
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

$profile=get_profile($_COOKIE['id']);





$teams=get_teams();

foreach($teams as $row => $team)
{
	$teamPlayers=get_team_players($teams[$row]['teamId']);
	foreach ($teamPlayers as $line => $teamPlayer) {

		$teamPlayers['playerLogin']=htmlspecialchars($teamPlayer['playerLogin']);
		$teamPlayers['playerFirstName']=htmlspecialchars($teamPlayer['playerFirstName']);
		$teamPlayers['playerLastName']=htmlspecialchars($teamPlayer['playerLastName']);
		$teamPlayers['playerBirthYear']=htmlspecialchars($teamPlayer['playerBirthYear']);

		
	}
	$teams[$row]['teamPlayers']=$teamPlayers;

	$teams[$row]['teamId'] = htmlspecialchars($team['teamId']);
	$teams[$row]['teamName'] = htmlspecialchars($team['teamName']);
	$teams[$row]['teamCreationDate'] = htmlspecialchars($team['teamCreationDate']);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {



	if ($_POST['action']=='changeTeam'){

		if (isset($_POST['playerId'])){

			$pid=$_POST['playerId'];
		}

		if (isset($_POST['teamId'])){

			$tid=$_POST['teamId'];
		}

		$error=player_join_team($pid,$tid);
		if (!(isset($error)))	
			header("Refresh:0");


	}
}


include_once('../view/teamlist.php');
?>