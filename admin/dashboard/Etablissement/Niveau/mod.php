<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	include($connect_news);

	
	$idd = $_POST['id'];
	//récupération PROPRE des variables AVANT de les utiliser
	$ref = !empty($_POST['ref']) ? trim($_POST['ref']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$content = !empty($_POST['niveau']) ? trim($_POST['niveau']) : NULL;
	
	  //preparation de la requete

	 
  
	  $sql = "UPDATE equivalent_niveau_etablissement SET id=:ref , designation=:titre, niveau=:content WHERE id='".$idd."'";
	  $datas = array(':ref'=>$ref , ':titre'=>$titre,':content'=>$content);
	  
	  //$sql = "UPDATE news SET ref='".$ref."' , titre='".$titre."', content='".$content."', dat='".$dat."', f_img='".$f_img."', f_pj='".$f_pj."' WHERE id='".$idd."'";
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	  $records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
	//print $sql;
  
	}	
	 
	 


  
header("Location: index.php"); 

?>