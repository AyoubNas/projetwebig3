<?php 


include('../model/create_review.php');	

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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if ((isset($_POST['action']))&&($_POST['action']=="review")&&(isset($_POST['title']))&&(isset($_POST['text']))){

		$title=$_POST['title'];
		$text=$_POST['text'];
		create_review($title,$text);
		$sent=1;
	}
}
include_once('../view/reviewform.php');
