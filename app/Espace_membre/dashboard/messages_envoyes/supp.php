
<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_GET['sup'])){


	$connect=$path.'Config/connect_login.php';
	require_once $connect;

	
	  $idd = $_GET['sup'];

	  foreach($idd as $id){

	  $sql = "DELETE FROM `message_envoye` Where id_msg=".$id;
	  $records = $con->query($sql);
	  
	}
	  
	
	  
	}	
	 
	 


  
header("Location: index.php?id=".$_GET['id']); 

?>