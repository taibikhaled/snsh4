<?php

  
    $fp = fopen ("path.php", "r");
    $path = fgets ($fp, 255);
    fclose ($fp);


    $moy_saisie=$_POST['get_option'];


    $connect=$path.'Config/connect_news.php';
    include($connect);

    $sqll='Select * from moyenne_etablissement ;';
		$reqq = $con->query($sqll);
								
		$row_moy = $reqq->fetch();
								
		$cnag=$row_moy[1];
		$moy_adm=$row_moy[0];
  
    if ($moy_saisie>=$cnag)
    echo "true";else echo "false";

 

 exit;
?>