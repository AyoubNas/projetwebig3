<?php

include('../model/create_player.php');



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
		$pass=$password;
	}
	$salt = openssl_random_pseudo_bytes (10);

	$res=create_player($login,$firstName,$lastName,hash('sha256',$salt.$pass),$birthYear,$email,$salt);
	if (isset($res['error'])){ $error=$res['error'];}
	else {setcookie('id', $res['id'],0,null, null, false, true);}

}

header('Location: profile.php');