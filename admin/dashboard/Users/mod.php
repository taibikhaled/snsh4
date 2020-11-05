<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_login.php';
	require_once $connect_news;

	
	
	



	//récupération PROPRE des variables AVANT de les utiliser
	$user = !empty($_POST['login']) ? trim($_POST['login']) : NULL;
	$users = !empty($_POST['users']) ? trim($_POST['users']) : NULL;
	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : NULL;
	

	$nom = !empty($_POST['nom']) ? trim($_POST['nom']) : NULL;

	$typ = !empty($_POST['typ']) ? trim($_POST['typ']) : NULL;

	
	
	  //preparation de la requete

	 
  
	  $sql = "UPDATE users SET user=:user , password=:pass , nom=:nom , typ=:typ WHERE user='".$users."'";
	  $datas = array(':user'=>$user , ':pass'=>$pass, ':nom'=>$nom, ':typ'=>$typ);
	  
	  //$sql = "UPDATE news SET ref='".$ref."' , titre='".$titre."', content='".$content."', dat='".$dat."', f_img='".$f_img."', f_pj='".$f_pj."' WHERE id='".$idd."'";
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	$records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
//	print $sql;
  
	}	
	 
	 


  
header("Location: index.php"); 

?>