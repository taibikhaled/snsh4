<?php
    $fp = fopen ("path.php", "r");
    $path = fgets ($fp, 255);
    fclose ($fp);
    
    if(session_id() == '') {
      session_start();
    }


    
    $p=explode("|",$_COOKIE["id_user"]);
    $pp=$p[1];
           
    $id=$pp;

    
    
    $connect_news=$path.'Config/connect_login.php';
    include($connect_news);
    



    $sqll='Select count(*)as compteur from alerte where (from_id='.$id.')and (vue="false") ;';

    $reqq = $con->query($sqll);

    
    $row = $reqq->fetch();

    if ($row['compteur']>0)
    echo $row['compteur']."+"; else echo "0";

   
 ?>