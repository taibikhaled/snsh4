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
	$cat = !empty($_POST['cat']) ? trim($_POST['cat']) : NULL;
	$spe = !empty($_POST['spe']) ? trim($_POST['spe']) : NULL;
	$niveau = !empty($_POST['titre']) ? trim($_POST['niveau']) : NULL;

	
	  //preparation de la requete

	 
  
	  $sql = "UPDATE matiere SET ref=:ref , titre=:titre, cat_formation=:cat, id_niveau_filialle=:niveau, id_specialite=:spe WHERE id='".$idd."'";
	  $datas = array(':ref'=>$ref , ':titre'=>$titre,':cat'=>$cat,':niveau'=>$niveau, ':spe'=>$spe);
	  
	  //$sql = "UPDATE news SET ref='".$ref."' , titre='".$titre."', content='".$content."', dat='".$dat."', f_img='".$f_img."', f_pj='".$f_pj."' WHERE id='".$idd."'";
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	  $records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
	//print $sql;
  
	}	
	 
	 


  
header("Location: index.php"); 

?>