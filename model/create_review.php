<?php 
function create_review($title,$text){


	global $bdd;   

	try {

		$req = $bdd->prepare('INSERT INTO review (title,content,reviewDate) VALUES (:title,:content,adddate(utc_timestamp(),interval 2 hour))');
		$req -> bindParam(':title', $title);
		$req->bindParam(':content', $text);


		$req->execute();

	}
	catch(PDOException $e)
	{
		$error=$e->getMessage();
		return $error;

	}
}