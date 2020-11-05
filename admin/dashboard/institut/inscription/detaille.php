<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);



  //Affichage des erreurs php
  error_reporting(E_ALL);
  ini_set('display-errors','on');
  
  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}

  
  $_SESSION['path']=$path;
  

    $idd=$_GET['id'];
    
    
  $connect=$path.'Config/connect_news.php';
  include($connect);
  
  $sqll=' SELECT * FROM inscription_institut where id='.$idd;
  
  $reqq = $con->query($sqll);
  
  
  $rows = $reqq->fetch();
  
  
  $sqll=' SELECT * FROM equivalent_niveau_institut where id='.$rows['NIVS'];
  
  $reqq = $con->query($sqll);
  
  $ro = $reqq->fetch();
  
  
  $LIEU = $rows['LIEU'];
  
  /////////
  
  if ($rows['WILAYA_N']<>'') {
  $sqll=' SELECT * FROM wilaya where CODE_W='.$rows['WILAYA_N'];
  
  $reqq = $con->query($sqll);
  
  
  $row_wilaya = $reqq->fetch();
  
  $WADR=$row_wilaya['WILAYA'];
  } else $WADR='';
  
  if ($rows['COMMUNE_N']<>'') {
  $sqll=' SELECT * FROM commune where (CODE_C='.$rows['COMMUNE_N'].') and (CODE_W='.$rows['WILAYA_N'].')';
  
  $reqq = $con->query($sqll);
  
  
  $row_commune = $reqq->fetch();
  $CADR=$row_commune['COMMUNE'];
  } else $CADR='';
  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Etablissements de formation</title>
  
  <?php
	 $base_css=$path.'page/base_css.php';
	 include($base_css);
	?> 
  

  
  

<script type="text/javascript">

</script> 

</head>
<body>
          
         
<br>
<div class="form-group ">
                    <center>  <?php  print "<img src='".$path."backup/institut/inscription/photos/".$rows['PHOTO']."' width='100px' height='120px'>";?>    </center>
                          
                    </div>


<div class="row p-4">
                  
<div class='p-2 col-xl-6 col-lg-6 card  text-left mb-4 '>
                  <p class="card-title mb-0"><h4 class="text-center" >Candidat </h4 > </h6 >
                  <hr class="border-warning"><br>
                      
       
             
                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Nom :</label>
                          <?php print $rows['NOME'];?>
                    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Prénom :</label>
                          <?php print $rows['PRENOME'];?>
      
                    </div>

                    <div class="form-group text-right">
                    <?php  print $rows['PRENOMAR'];?>
                    <label class="font-weight-bold text-gray-100 " for="textarea"><h4> : الإسم </h4></label>
                          
                          
                    </div>

                    <div class="form-group text-right">
                    <?php  print $rows['NOMAR'];?>
                    <label class="font-weight-bold text-gray-100" for="textarea"><h4> : اللقب </h4> </label>
                          
                          
                          
                    </div>

                    
                    <div class="form-group">
                      
                      <label class="font-weight-bold text-gray-100" for="textarea">Sexe :</label>
                      <?php  print $rows['SEXE'];?>
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Date de Naissance :</label>
                      <?php  print $rows['DATN'];?>
                    
                   
                    </div>

                   
                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Lieu de Naissance :</label>
                    <?php  print $rows['LIEU'];?>   
                          
                      
                    </div>


                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Adresse:</label>
                      <?php  print $rows['ADR'];?>   
                          
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">E-Mail :</label>
                      <?php  print $rows['MAIL'];?>    
                          
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">N° Téléphone :</label>
                      <?php  print $rows['NPHE'];?>    
                      
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">N° Téléphone du père ou tuteur:</label>
                      <?php  print $rows['NPHT'];?>    
                          
                    </div>

                    <div class="form-group text-left">
                    <label class="font-weight-bold text-gray-100" for="textarea">Niveau Scolaire:</label>
                    
                      <?php

                          $connect=$path.'Config/connect_news.php';
                          include($connect);

                          $sqll=' SELECT * FROM equivalent_niveau_institut where niveau='.$rows['NIVS'];

                          $reqq = $con->query($sqll);
                          
                          $row = $reqq->fetch();             
                          echo $row["designation"];
                            

                      ?>

                    </div>

                    
       
                  </div>

                  

                  <div class='p-2 col-xl-6 col-lg-6 card  text-left mb-4 '>

                  <p class="card-title mb-0"><h4 class="text-center" >L'Agent </h4 > </h6 >
                  <hr class="border-warning"><br>
                  
                      
                    <div class="form-group">
                      
                      <label class="font-weight-bold text-gray-100" for="textarea">Lien de parenté :</label>
                      <?php  print $rows['LIP'];?>    
                      
                    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Nom :</label>
                    <?php  print $rows['NOMA'];?>    
                      
                      
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Prénom :</label>
                      <?php  print $rows['PRENOMA'];?>    
                    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Fonction :</label>
                      <?php  print $rows['FONC'];?>    
                    </div>

                    
                    
                    <div class="form-group">
                      
                      <label class="font-weight-bold text-gray-100" for="textarea">Entreprise :</label>
                      <?php  print $rows['ENTRA'];?>    
                    </div>


                   
                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Adresse:</label>
                        <?php  print $rows['ADRA'];?>    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">N° Téléphone :</label>
                    <?php  print $rows['NPHA'];?>    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Matricule :</label>
                    <?php  print $rows['MATA'];?>    
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-gray-100" for="textarea">Direction :</label>
                    <?php  print $rows['DIRA'];?>    
                    </div>

                  </div>

              </div>




        <div class="form-group text-left p-4">
                            <label class="font-weight-bold text-gray-100 mb-0" for="textarea"><h2> Choix de Formation</h2></label>
                            <hr class="border-warning" >                            
                              <?php

                                  $connect=$path.'Config/connect_news.php';
                                  include($connect);

                                  $sqll=' SELECT * FROM inscription_institut_choix where id_inscription='.$ro['id'];

                                  $reqq = $con->query($sqll);
                                  
                                  print "<table>";$i=0;
                                  while($row = $reqq->fetch()) {            
                                    $i=1;
                                  echo "<tr><td width='50%'><h4>".$row["designation"]."</h4></td>
                                    <td width='40%'>
                                    
                                    <p class='h4 text-danger' >".$row["choix"]."</p></td>
                                    </tr>";
                                    $i++;
                                  }
                                  print "</table>";
                              ?>

                            </div>


   
		</div>
                    


    </div>
    </div>
    </div>

  
  <?php
    $base_js=$path.'page/base_js.php';
    include($base_js);
	
	?>
</body>

</html>

