
<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_GET['user'])){


	$connect_news=$path.'Config/connect_login.php';
	require_once $connect_news;

	
	  $user = $_GET['user'];

	
	  $sql = "DELETE FROM users Where user=".$user;

	  
	  $records = $con->query($sql);
	  
	}	
	 
	 


  
header("Location: index.php"); 

?>