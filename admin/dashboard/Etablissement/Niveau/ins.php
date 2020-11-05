<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	//récupération PROPRE des variables AVANT de les utiliser
	$ref = !empty($_POST['ref']) ? trim($_POST['ref']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$content = !empty($_POST['niveau']) ? trim($_POST['niveau']) : NULL;
	  //preparation de la requete

	 
  
	  	$sql = 'INSERT INTO equivalent_niveau_etablissement (id, designation, niveau)  VALUES (:ref, :titre, :content) ';
	  	$datas = array(':ref'=>$ref , ':titre'=>$titre,':content'=>$content);
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>