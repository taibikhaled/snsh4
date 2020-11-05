<?php

if(isset($_POST['get_option']))
{

  
    $fp = fopen ("path.php", "r");
    $path = fgets ($fp, 255);
    fclose ($fp);


    $spe=$_POST['get_option'];


    $connect=$path.'Config/connect_news.php';
    include($connect);

    

$sqll="SELECT * FROM matiere_etablissement where cldem='".$spe."'";

$reqq = $con->query($sqll);


echo "<option value=''></option>";

while($row = $reqq->fetch()) {
    echo "<option value='".$row["CODMAT"]."'>".$row["CODMAT"]."|".$row["DESIGNATION"]."</option>";
  }

  exit;
}
?>

  
  

