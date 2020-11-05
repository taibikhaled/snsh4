<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;

if (isset($_SESSION['id_inscription_institut'])){

  $p=explode("|",$_GET['id']);
  $pp=$p[1];
        
  $id=$pp;
  
  $idd=$id;
  
  if ($_SESSION['id_inscription_institut'] <> $idd){ 
    header("Location: index.php"); 		 
  }
  } else {header("Location: index.php");}
  
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

                  function testForm(s,v){

                  var ss="#"+s;
                  var mm="#c"+s;
                  var vv=v;
                  
                  jQuery(mm).html(vv);

//                  for (var i=1;i<=9;i++) {
 //                   if (ii!=i)
  //                $("#choix"+i+" option[value='"+vv+"']").remove();
    //              }

if (s=='choix1')  { 
  
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

 if (s=='choix2')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

 if (s=='choix3')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

 if (s=='choix4')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

if (s=='choix5')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}
if (s=='choix6')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}


if (s=='choix7')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

if (s=='choix8')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix9 option[value='"+vv+"']").remove();
}

if (s=='choix9')  { 
   $("#choix1 option[value='"+vv+"']").remove();
   $("#choix2 option[value='"+vv+"']").remove();
   $("#choix3 option[value='"+vv+"']").remove();
   $("#choix4 option[value='"+vv+"']").remove();
   $("#choix5 option[value='"+vv+"']").remove();
   $("#choix6 option[value='"+vv+"']").remove();
   $("#choix7 option[value='"+vv+"']").remove();
   $("#choix8 option[value='"+vv+"']").remove();
}


                  console.log(s);
      
                }

                  
                  //if (window.val[1]==vv){alert('Double de choix'+'1'); }
                 //  if (window.val[2]==vv){alert('Double de choix'+'2'); }
                  // if (window.val[3]==vv){alert('Double de choix'+'3'); }
                  // if (window.val[4]==vv){alert('Double de choix'+'4'); }
                  // if (window.val[5]==vv){alert('Double de choix'+'5'); }
                  // if (window.val[6]==vv){alert('Double de choix'+'6'); }
                  // if (window.val[7]==vv){alert('Double de choix'+'7'); }
                  // if (window.val[8]==vv){alert('Double de choix'+'8'); }
                  // if (window.val[9]==vv){alert('Double de choix'+'9'); }
                  
/*

                  compte=compte+1;
                  window.val[ii]=vv;

                  
                  console.log(s);
                  console.log(val[ii]);

                  console.log("----------");
                  console.log(window.val[1]);
                  console.log(window.val[2]);
                  console.log(window.val[3]);
                  console.log(window.val[4]);
                  console.log(window.val[5]);
                  console.log(window.val[6]);
                  console.log(window.val[7]);
                  console.log(window.val[8]);
                  console.log(window.val[9]);


                  for (var i=1;i<=9;i++) {
                   
                   if (val[i]!=null){ 
                    if (i!=s){
                    if(val[i]==vv){
                            
                            break;
                          }
                    }
                    console.log(val[i]);
                  }        
                  }

                  //if(jQuery(ss).val()=="")  alert(jQuery(ss).val());
                  //var t=jQuery(ss).val();
                  
                  //var t=document.getElementById(s).value;
                  
                  //alert(jQuery(ss).text());
                  
                  jQuery(mm).html(vv);
                  //jQuery(mm).val(jQuery(ss).val());

                  //console.log(ss);
                  //console.log(mm);
                  //console.log(vv);
                  
                  //jQuery(mm).html='test';

                  }

                  
                  function valideForm(k){
                  /*
                  var kk=k;
                  var y=1; 

            
                  console.log(compte);
            
                  while (y<=compte){
     
                  for (var i=k;i<=compte;i++) {
            
                      
                    console.log(val[i]);
            

                    if(i!=k) {
                         // var ss="#cchoix"+i;
                          if(val[y]==val[i]){
                            alert('Double de choix'+i);
                            break;
                          }
                        
                      }
                    }
                    y++;
                  }
     
                  return false;

                  }
/*          

      console.log(kk);
     
             
                  var cc="#choix"+y;
                    
                  console.log(cc);
                  var m=jQuery(cc).val();
                  console.log(m);
             
             while (y<=k){
                    var cc="#cchoix"+y;
                      for(i=1;i<=kk;i++){
                        if(i=!k) {
                          var ss="#cchoix"+i;
                          if(jQuery(ss).val()==jQuery(cc).val()){
                            alert('Double de choix'+i);
                            break;
                            return false;
                          }
                          console.log(jQuery(ss).val());
                        }
                    }te
                    y++;
                  console.log(jQuery(cc).val());
                  */
  
                
                                
                  function valideForm(k){
                    var niv=k;

                    if (k==4) {

                    var test='false';
                    var test_c1='false';
                    var test_c2='false';
                    var test_c3='false';
                      
                    for(i=1;i<=9;i++){
                      var ss="#choix"+i;
                          if(jQuery(ss).val()==1){
                            test_c1='true';
                          } 

                          if(jQuery(ss).val()==2){
                            test_c2='true';
                          }

                          if(jQuery(ss).val()==3){
                            test_c3='true';
                          } 
                          
                          //console.log(jQuery(ss).val());
                          //console.log(test);
                    }
                    if ((test_c1=='true')&&(test_c2=='true')&&(test_c3=='true')){test='true';}
                    if (test=='false') {alert('Veuillez mentionner Votre 1 , 2 , 3 choix ?');return false; }else {return true;}

                    //console.log(test);
                  } else {

                    var test='false';
                      
                    for(i=1;i<=9;i++){
                      var ss="#choix"+i;
                          if(jQuery(ss).val()==1){
                            test='true';
                          } 
                          console.log(jQuery(ss).val());
                          console.log(test);
                    }
                    if (test=='false') {alert('Veuillez mentionner Votre 1 choix ?');return false; }else {return true;}

                    console.log(test);
                  }   
                    
         
                  }                  
                  
                  

</script>
</head>
<body>
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <?php
	
	$top_bar=$path.'page/top_bar_insc.php';
	include($top_bar);

	?> 

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->

      <?php
		 $menu=$path.'page/menu.php';
		 include($menu);
		
	?> 
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
         
                    
                <?php
                
                $documents=$path.'page/marque.php';
                include($documents);

                ?> 
                
       



          <div class="row">

          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0"><h2 class="text-center" >Institut de Formation en Gestion – 17 </h2 > <br> <h6 class="text-center" > rue Yahia el Mazouni Val d’Hydra – Alger</h6 ><br>
                  <hr class="border-warning mt-1" width='90%' >


                  <div class="row mt-4">
                  <div class='col-xl-1 col-lg-1'>  </div>
                  
                  <div class='p-4 col-xl-9 col-lg-9 card shadow border text-left mb-4 '>
                  <p class="card-title mb-0"><h4 class="text-center" >Choix de Spécialité </h4 ><h6 class="text-warning text-center">Candidat doit mentionner l'ordre de son choix </h6 >
                  <hr class="border-warning"><br>

                  <form  method="POST" action="ins_choix.php" onsubmit="<?php echo 'return valideForm('.$rows["NIVS"].');' ?>"  >

                    <div class="row">
                     <?php

                      $connect=$path.'Config/connect_news.php';
                      include($connect);



                      $sqll=' SELECT * FROM equivalent_formation_institut where niveau<='.$ro['niveau'];

                      $reqq = $con->query($sqll);

                      $count = $reqq->rowCount();
                      
                      $c=1;
                      while($row = $reqq->fetch()) {
                        $i=1;  
                        echo '<div class="p-2 col-xl-9 col-lg-9 text-left"><h4>'.$row["designation"].'</h4>
                        </div><div class="col-xl-2 col-lg-2">
                        <input type="hidden" name="for'.$row["id"].'" value="'.$row["id"].'" />
                        <input type="hidden" name="des'.$row["id"].'" value="'.$row["designation"].'" />
                        <select id="choix'.$row["id"].'" name="choix'.$row["id"].'"   class="form-control form-control-sm" onblur="testForm(`choix'.$row["id"].'`, this.value)" ><option value=""></option>';
                          while ($i<=$count) {
                            echo '<option  value="'.$i.'">'.$i.'</option>';
                            $i++;
                          }
                          echo '</select> </div>';
                          $c++;
              
                      }
                      echo '<input type="hidden" name="id" value="'.$idd.'" />';
                        
                      ?>

                    
                        
                    </div>   
                    <div class="text-right"><a class="btn btn-primary btn-sm" href="javascript:location.reload();">  Initialiser les choix </a></div>

                    </div>

              </div>
              <div class="row mt-4">
                <div class='col-xl-1 col-lg-1'>  </div>
                  <div class='p-4 col-xl-9 col-lg-9 card shadow border text-left mb-4 '>
                  <hr class="border-warning"><br>

                  
                  <div class="form-group text-center"> 
           

                  
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary"   data-toggle="modal" data-target="#exampleModal">
	Consultation et Validation
	</button>
  <input type="button" name='retour' class="btn btn-primary  " onclick="javascript:history.back()"  value="Retour">
                    
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Validation de l'Inscription</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">

    <div class="form-group ">
      <center>  <?php  print "<img src='".$path."backup/institut/inscription/photos/".$rows['PHOTO']."' width='100px' height='120px'>";?>    </center>
                          
     </div>

    <div class="row mt-4">
                  
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




        <div class="form-group text-left">
                            <label class="font-weight-bold text-gray-100 mb-0" for="textarea"><h2> Choix de Formation</h2></label>
                            <hr class="border-warning" >                            
                              <?php

                                  $connect=$path.'Config/connect_news.php';
                                  include($connect);

                                  $sqll=' SELECT * FROM equivalent_formation_institut where niveau<='.$ro['niveau'];

                                  $reqq = $con->query($sqll);
                                  
                                  print "<table>";$i=0;
                                  while($row = $reqq->fetch()) {            
                                    $i=1;
                                  echo "<tr><td width='50%'><h4>".$row["designation"]."</h4></td>
                                    <td width='40%'>
                                    
                                    <p class='h4 text-danger' id='cchoix".$row["id"]."'></p></td>
                                    </tr>";
                                    $i++;
                                  }
                                  print "</table>";
                              ?>

                            </div>



    <hr>
                      <input type="submit" name='submit' class="btn btn-primary btn-lg "   value="Validation">
                      <input type="button" name='retour' class="btn btn-primary btn-lg " data-dismiss="modal" aria-label="Close"  value="Retour">
                    
		</div>


           
       

                  </div>

                  

                  </form>
                  </div></div>
                  </div>


                  </div>
                  </div>
                  
                
               
                
               




        </div>


        <?php
     	$bas_page=$path.'page/bas_page.php';
     	include($bas_page);

	  ?>
    
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
  <?php
    $base_js=$path.'page/base_js.php';
    include($base_js);
	
	?>
</body>

</html>

