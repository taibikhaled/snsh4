
<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_GET['id_msg'])){


	$connect_news=$path.'Config/connect_login.php';
	require_once $connect_news;

	
	  $id = $_GET['id_msg'];

	
	  $sql = "DELETE FROM `message_envoye` Where id_msg=".$id;

	  
	  $records = $con->query($sql);
	  
	}	
	 
	 


  
header("Location: ../index.php?id=".$_GET['id']); 

?>