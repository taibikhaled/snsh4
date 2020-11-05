<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	include($connect_news);


	
	$code = !empty($_POST['code']) ? trim($_POST['code']) : NULL;
	
	 
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	
  
	  $sql = "UPDATE moyenne_etablissement SET  moy_adm=:code, moy_cneg=:titre ";
	  $datas = array(':code'=>$code, ':titre'=>$titre);
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	  $records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
	//print $sql;
  
	}	
	 
	 


  
header("Location: moyenne.php"); 

?>