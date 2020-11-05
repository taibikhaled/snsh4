<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_GET['id'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	
	  $idd = $_GET['id'];

	
	  $sql = "DELETE FROM equivalent_niveau_bejaia Where id='".$idd."'";
	  
	  $records = $con->query($sql);
	  
	}	
	 
	 


  
header("Location: index.php"); 

?>