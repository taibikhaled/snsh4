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
  
 
//connexion à la bdd

$connect_news=$path.'Config/connect_news.php';
require_once $connect_news;

//récupération PROPRE des variables AVANT de les utiliser

$idd=$_GET['id'];




 
  
  $dat=date("Y-m-d H:i:s");   
  
 
    
    //preparation de la requete

  $sqll='Select * from matiere where id = '.$idd.' ;';

  $reqq = $con->query($sqll);

  $rows = $reqq->fetch(); 

    




  
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
  

  
  
 
  <?php
	 $base_ck=$path.'page/base_ck_js.php';
	 include($base_ck);
	 
	?> 

<script>


		function del(ss) {
      
      if ( confirm( "Voulez Vous Supprimer " ) ) {
    // Code à éxécuter si le l'utilisateur clique sur "OK"
      window.location = "supp.php?id="+ss;

      } 
      		
			
			}

</script> 

</head>
<body>
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <?php
	
	$top_bar=$path.'page/top_bar.php';
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

          <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body ">
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Matiére - Modification</h4>
<hr>
 
 
                 

</div>

<div class="row p-2">


<div class="col-xl-12 col-lg-12 ">
     
<form enctype="multipart/form-data" method="POST" action="mod.php" >

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Référence :</label>
           <input type="text" class="form-control form-control-sm" name="ref" id="ref"  placeholder="Code.." value="<?php echo $rows['code_mat'];?>" >
           <input type="hidden" name="id" value="<?php echo $rows['id'];?>"  />

     </div>

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Titre :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Libellé ..." value="<?php echo $rows['lib_matiere'];?>" >
     </div>


     <div class="form-group">
     
     <label class="font-weight-bold text-gray-100" for="textarea">Catégorie :</label>
     
    <select name="cat" id="cat"  class="form-control form-control-sm border border-warning" >


    <option value="<?php echo $rows['cat_formation'];?>"  selected ><?php echo $rows['cat_formation'];?> </option>';

    <option value='ES'>Enseignement Secondaire</option>";
    <option value='FP'>Formation Professionelle</option>";

    </select>

    </div>

    <div class="form-group">
     
     <label class="font-weight-bold text-gray-100" for="textarea">Spécialité :</label>
     
    <select name="spe" id="spe"  class="form-control form-control-sm border border-warning" >


    <option value ="" disabled selected ></option>';

    <?php
  
        $connect=$path.'Config/connect_news.php';
        include($connect);

        $sqll=' SELECT * FROM specialite ';

        $reqq = $con->query($sqll);
        
        

        while($row = $reqq->fetch()) {
            echo "<option value='".$row["id"]."'>".$row["specialite"]."</option>";
          }

    ?>


</select>

</div>

<div class="form-group">
<label class="font-weight-bold text-gray-100" for="textarea">Niveau Filliale :</label>
     
<select name="niveau" id="niveau"  class="form-control form-control-sm border border-warning" >


<option value ="" disabled selected ></option>';

<?php

    $connect=$path.'Config/connect_news.php';
    include($connect);

    $sqll=' SELECT * FROM niveau_filialle ';

    $reqq = $con->query($sqll);
    
    

    while($row = $reqq->fetch()) {
        echo "<option value='".$row["id"]."'>".$row["niveau_filialle"]."</option>";
      }

?>


</select>

</div>
     
     

     <hr>
                            
     <div class="form-group float-right"> 
           
              
           <input type="submit" name='submit' class="btn btn-outline-dark btn-sm "  value="Modification">
           <input type="reset" name='reset' class="btn btn-outline-dark btn-sm"  value="Initialiser"><br><br> 
           
       

     </div>

    

</form>

</div>

</div>
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

