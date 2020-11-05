<?php

if(isset($_POST['get_option']))
{

  
    $fp = fopen ("path.php", "r");
    $path = fgets ($fp, 255);
    fclose ($fp);


    $wilaya=$_POST['get_option'];


    $connect=$path.'Config/connect_news.php';
    include($connect);

  
    $sqll=' SELECT * FROM commune WHERE CODE_W='.$wilaya;

    $reqq = $con->query($sqll);
  
  
    echo "<option value=''></option>";

  while($row = $reqq->fetch()) {
      echo "<option value='".$row["CODE_C"]."'>".$row["COMMUNEA"]."</option>";
    }


 exit;
}
?>