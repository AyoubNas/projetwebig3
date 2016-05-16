<?php 

include('../model/get_sites.php');
include('../model/get_teams.php');
include('../model/create_game.php');
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




if (!(isset($_COOKIE['id']))) header('Location: login.php');



$sites=get_sites();
foreach($sites as $row => $site){



	$sites[$row]['siteName'] = htmlspecialchars($site['siteName']);
	$sites[$row]['siteAdrNumber'] = htmlspecialchars($site['siteAdrNumber']);
	$sites[$row]['siteAdrStreet'] = htmlspecialchars($site['siteAdrStreet']);
	$sites[$row]['siteAdrPostCode'] = htmlspecialchars($site['siteAdrPostCode']);
	$sites[$row]['siteAdrCity'] = htmlspecialchars($site['siteAdrCity']);
	$sites[$row]['surface'] = htmlspecialchars($site['surface']);

}


$teams=get_teams();

foreach($teams as $row => $team)
{

	$teams[$row]['teamId'] = htmlspecialchars($team['teamId']);
	$teams[$row]['teamName'] = htmlspecialchars($team['teamName']);
	$teams[$row]['teamName'] = htmlspecialchars($team['teamName']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if (isset($_POST['home'])){

		$home=$_POST['home'];
	}

	if (isset($_POST['time'])){

		$time=$_POST['time'];
	}

	if (isset($_POST['away'])){
		$away=$_POST['away'];
	}
	if (isset($_POST['site'])){
		$site=$_POST['site'];
	}	
	if (isset($_POST['date'])){
		$date=$_POST['date'];
	}


	

	$error=create_game($home,$away,$site,$date,$time);
	if (!isset($error))
		header("Refresh:0");
	
}

include_once('../view/sitelist.php');
?>
