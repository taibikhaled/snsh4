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




    
    //preparation de la requete

  $sqll='Select * from specialite_ecole where id = '.$idd.' ;';

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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Spécialités - Modification</h4>
<hr>
 
 
                 

</div>

<div class="row p-2">

<div class="col-xl-3 col-lg-3 "></div>
<div class="col-xl-6 col-lg-6 ">
     
<form enctype="multipart/form-data" method="POST" action="mod.php" >


     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Code :</label>
     <input type="text" class="form-control form-control-sm" name="code" id="code"  placeholder="Code ..." value="<?php echo $rows['CLDEM'];?>" >

    </div>
    
     <div class="form-group">
   
     <label class="font-weight-bold text-gray-100" for="textarea">Spécialité :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Titre ..." value="<?php echo $rows['SPEC'];?>" >
           <input type="hidden" name="id" value="<?php echo $rows['id'];?>"  />

     </div>

     
     
     <hr>
                            
     <div class="form-group float-right"> 
           
              
           <input type="submit" name='submit' class="btn btn-outline-dark btn-sm "  value="Modification">
           <input type="reset" name='reset' class="btn btn-outline-dark btn-sm"  value="Initialiser"><br><br> 
           
       

     </div>

    

</form>
<div class="col-xl-3 col-lg-3 "></div>
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

