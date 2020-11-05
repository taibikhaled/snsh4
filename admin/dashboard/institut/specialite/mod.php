<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	include($connect_news);

	
	$idd = $_POST['id'];

	
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$code = !empty($_POST['code']) ? trim($_POST['code']) : NULL;
	
	 
  
	  $sql = "UPDATE specialite_institut SET  CLDEM=:code, SPEC=:titre WHERE id='".$idd."'";
	  $datas = array(':code'=>$code, ':titre'=>$titre );
	
	  //$sql = "UPDATE news SET ref='".$ref."' , titre='".$titre."', content='".$content."', dat='".$dat."', f_img='".$f_img."', f_pj='".$f_pj."' WHERE id='".$idd."'";
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	  $records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
//	print $sql;
  
	}	
	 
	 


  
header("Location: index.php"); 

?>