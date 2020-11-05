<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){

	$login = !empty($_POST['login']) ? trim($_POST['login']) : NULL;

	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : NULL;

	$nom = !empty($_POST['nom']) ? trim($_POST['nom']) : NULL;

	$typ = !empty($_POST['typ']) ? trim($_POST['typ']) : NULL;

	
	$connect_news=$path.'Config/connect_login.php';
	require_once $connect_news;

	
	$reqq = $con->prepare("Select * from users where login='".$login."'");
	$reqq->execute();
	$count = $reqq->rowCount();
	

	if ($count == 0){
	
		
  	
	$sql = "INSERT INTO users (user, password, nom, typ)  VALUES ('".$login."', '".$pass."', '".$nom."', '".$typ."') ";
	//$datas = array(':user'=>$login , ':pass'=>$pass);
	
	//execution de la requete
	$res = $con->query($sql);

	//$records = $con->prepare($sql);
	//$records->execute($datas);

	}



		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>