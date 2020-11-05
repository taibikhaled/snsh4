<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_GET['id'])){


	$connect_news=$path.'Config/connect_evenement.php';
	require_once $connect_news;

	
	  $idd = $_GET['id'];

	
	  $sql = "DELETE FROM evenement Where id='".$idd."'";
	  
	  $records = $con->query($sql);
	  
	}	
	 
	 


  
header("Location: index.php"); 

?>