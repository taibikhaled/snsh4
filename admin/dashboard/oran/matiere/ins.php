<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	$sqll='Select * from matiere_oran order by id desc ;';
	$reqq = $con->query($sqll);

	$id = $reqq->fetch();
	$idd=$id[0]+1;




	//récupération PROPRE des variables AVANT de les utiliser
	$ref = !empty($_POST['ref']) ? trim($_POST['ref']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$spe = !empty($_POST['spe']) ? trim($_POST['spe']) : NULL;
	
	
	
	  //preparation de la requete

	 
  
	  	$sql = 'INSERT INTO matiere_oran (CODMAT, DESIGNATION, CLDEM)  VALUES (:ref, :titre, :spe) ';
	  	$datas = array(':ref'=>$ref , ':titre'=>$titre,':spe'=>$spe);
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>