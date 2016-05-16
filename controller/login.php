<?php

include('../model/check_login.php');

if (isset ($_COOKIE['id'])){setcookie('id',null,time()-1,null, null, false, true);
header('Location: login.php');}


try {
	$bdd = new PDO('mysql:host='.getenv('OPENSHIFT_MYSQL_DB_HOST').';dbname='.getenv('OPENSHIFT_APP_NAME'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    // set the PDO error mode to exception
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if ($_POST['action']=='login'){
		
		if (isset($_POST['login'])){

			$login=$_POST['login'];
		}

		if (isset($_POST['pass'])){

			$pass=$_POST['pass'];
		}

		$res= check($login,$pass);

		if ($res['msg']=="access granted"){

			setcookie('id', $res['id'],0,null, null, false, true);
			$res['msg']='';
			header('Location: profile.php');
		}
		else include('../view/homepage.php');
	}
	else include('../view/homepage.php');
}
else include('../view/homepage.php');