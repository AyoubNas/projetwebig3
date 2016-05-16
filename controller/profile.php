<?php

include('../model/get_profile.php');
include('../model/update_profile.php');
include_once('../model/check_login.php');
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


try {

	$profile=get_profile($_COOKIE['id']);
	foreach($profile as $row => $prof)
	{


		$profile[0]['playerLogin'] = htmlspecialchars($prof['playerLogin']);
		$profile[0]['playerFirstName'] = htmlspecialchars($prof['playerFirstName']);
		$profile[0]['playerLastName'] = htmlspecialchars($prof['playerLastName']);
		$profile[0]['playerBirthYear'] = htmlspecialchars($prof['playerBirthYear']);
		$profile[0]['playerEmail'] = htmlspecialchars($prof['playerEmail']);
	}
}

catch(PDOException $e)
{
	echo substr($e->getMessage(), 71, -18);

}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

	if ((isset($_POST['action']))&&($_POST['action']=="editProfile")){


		if (isset($_POST['password'])){


			if (isset($_POST['id'])){

				$res=check($profile[0]['playerLogin'],$_POST['password']);


				if (($res['msg']=="access granted")&&($res['id']==$_POST['id'])){

					$id=$_POST['id'];

					if ((isset($_POST['login'])) && !($_POST['login']=='')){
						$login=$_POST['login'];
					}
					else $login=$profile[0]['playerLogin'];					

					if ((isset($_POST['firstName'])) && !($_POST['firstName']=='')){
						$firstName=$_POST['firstName'];
					}
					else $firstName=$profile[0]['playerFirstName'];

					if ((isset($_POST['lastName'])) && !($_POST['lastName']=='')){
						$lastName=$_POST['lastName'];
					}
					else $lastName=$profile[0]['playerLastName'];	

					if ((isset($_POST['birthYear'])) && !($_POST['birthYear']=='')){
						$birthYear=$_POST['birthYear'];
					}
					else $birthYear=$profile[0]['playerBirthYear'];

					if ((isset($_POST['email'])) && !($_POST['email']=='')){
						$email=$_POST['email'];
					}
					else $email=$profile[0]['playerEmail'];		

					if ((isset($_POST['newpass'])) && !($_POST['email']=='')){

						$pass=$_POST['newpass'];
						$salt=openssl_random_pseudo_bytes (10);
						$error = update_profile($id,$login,$firstName,$lastName,$birthYear,$email,hash('sha256',$salt.$pass),$salt);


						if (!isset($error))

							header("Refresh:0");
					}
					else{

						$salt=openssl_random_pseudo_bytes (10);
						$error = update_profile_not_password($id,$login,$firstName,$lastName,$birthYear,$email);
						if (!isset($error))
							header("Refresh:0");
					}										
				}
			}
		}
	}
}


try {

	$profile=get_profile($_COOKIE['id']);
	foreach($profile as $row => $prof)
	{


		$profile[0]['playerLogin'] = htmlspecialchars($prof['playerLogin']);
		$profile[0]['playerFirstName'] = htmlspecialchars($prof['playerFirstName']);
		$profile[0]['playerLastName'] = htmlspecialchars($prof['playerLastName']);
		$profile[0]['playerBirthYear'] = htmlspecialchars($prof['playerBirthYear']);
		$profile[0]['playerEmail'] = htmlspecialchars($prof['playerEmail']);

	}
}

catch(PDOException $e)
{
	echo substr($e->getMessage(), 71, -18);

}








include_once('../view/profile.php');
?>

<script>
	var password = document.getElementById("password")
	, passwordConfirm = document.getElementById("passwordConfirm");


	function validatePassword(){
		if(password.value != passwordConfirm.value) {
			passwordConfirm.setCustomValidity("Passwords Don't Match");
		} else {
			passwordconfirm.setCustomValidity('');
		}
	}


}



password.onchange = validatePassword;
passwordConfirm.onkeyup = validatePassword;

</script>