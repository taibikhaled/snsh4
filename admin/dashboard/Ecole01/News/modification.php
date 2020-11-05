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

  $sqll='Select * from news where id = '.$idd.' ;';

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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - News - Modification</h4>
<hr>
 
 
                 

</div>

<div class="row p-2">


<div class="col-xl-12 col-lg-12 ">
     
<form enctype="multipart/form-data" method="POST" action="mod.php" >

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Référence :</label>
           <input type="text" class="form-control form-control-sm" name="ref" id="ref"  placeholder="Référence.." value="<?php echo $rows['ref'];?>" >
           <input type="hidden" name="id" value="<?php echo $rows['id'];?>"  />

     </div>

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Titre :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Titre ..." value="<?php echo $rows['titre'];?>" >
     </div>

     <div class="form-group ">
     <label class="font-weight-bold text-gray-100" for="textarea" >Votre Texte :</label>
      <div class="border border-1 border-warning">
      <textarea name="editor1" id="content" class="form-control border border-1 border-warning" rows="6"><?php echo $rows['content'];?></textarea>
      <script>
       CKEDITOR.replace( 'editor1' );
     </script>
      </div>

     </div>

     
     

       
     <div class=form-group>    

     
       <input type="hidden" name="MAX_FILE_SIZE" value="7000000" />  
     
       <label class="font-weight-bold text-gray-100" for="textarea"> Image du Centre : </label>

       <input type="hidden" name="fichier2" value="fichier2" />
       
       <input name="file2" type="file" size="30" id="file2"  accept="image/*" >
       


       <label class="font-weight-bold text-gray-100" for="textarea"> Piéce Jointe : </label>

       <input type="hidden" name="fichier1" value="fichier1" />
       
       <input name="file1" type="file" size="30" id="file1"  />

     </div>										
     <p><h6 class="text-danger">En cas de plusieurs fichiers, on adopte la solution du compression *.rar *.zip </h6></p>

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

