<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	$sqll='Select * from matiere order by id desc ;';
	$reqq = $con->query($sqll);

	$id = $reqq->fetch();
	$idd=$id[0]+1;




	//récupération PROPRE des variables AVANT de les utiliser
	$ref = !empty($_POST['ref']) ? trim($_POST['ref']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$cat = !empty($_POST['cat']) ? trim($_POST['cat']) : NULL;
	$spe = !empty($_POST['spe']) ? trim($_POST['spe']) : NULL;
	$niveau = !empty($_POST['titre']) ? trim($_POST['niveau']) : NULL;

	
	
	  //preparation de la requete

	 
  
	  	$sql = 'INSERT INTO matiere (code_mat, lib_matiere, cat_formation, id_niveau_filialle	, 	id_specialite)  VALUES (:ref, :titre, :cat, :spe, :niveau) ';
	  	$datas = array(':ref'=>$ref , ':titre'=>$titre,':cat'=>$cat,':spe'=>$spe, ':niveau'=>$niveau);
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>