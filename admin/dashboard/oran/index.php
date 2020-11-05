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
                  <h4 class="card-title  ">Administration</h4>
<hr>
 
 <h2 class='text-center mb-4'><b>Ecole de Formation Professionnelle en Gestion - <br><br> E.F.P.G-ORAN</b></h2>
 <hr class='border-warning mb-4' width='70%'>
 <div class="row p-4">
                 



<div class="col-xl-1 col-lg-1"></div>

<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="News/index.php"><img src="images/News.png" class='mb-3' width='95%' ><h6>News, Publications, <br>Notifications ...Autres </a></h6> 


</div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="specialite/index.php"><img src="images/sp.png" class='mb-3' width="50%" height="55%" ><h6>Spécialité des Formations </a></h6> 


</div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="matiere/index.php"><img src="images/mat.png" class='mb-2' width="65%" height="75%" ><h6>Matières </a></h6> 


</div>



<div class="col-xl-2 col-lg-2"></div>

<div class="row">


<div class="col-xl-1 col-lg-1"></div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="enseignants/index.php"><img src="images/enseignant.png" class='mb-2' width="55%" height="65%" ><h6>Enseignants</a></h6> 


</div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="cour_document/index.php"><img src="images/pdf.png" class='mb-2' width="55%" height="65%" ><h6>Cours (Document)</a></h6> 


</div>

<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="cour_video/index.php"><img src="images/video.png" class='mb-2' width="65%" height="75%" ><h6>Cours (Video)</a></h6> 


</div>

<div class="col-xl-2 col-lg-2"></div>




<div class="row">


<div class="col-xl-1 col-lg-1"></div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="Niveau/index.php"><img src="images/Niveau.png" class='mb-2' width="55%" height="65%" ><h6>Niveau Requis</a></h6> 


</div>


<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

    
  <a href="formation/index.php"><img src="images/formation.png" class='mb-2' width="55%" height="65%" ><h6>Formations</a></h6> 


</div>

<div class="col-xl-3 col-lg-3 m-1 p-2  text-primary border align-items-center text-center ">

  
  <a href="inscription/index.php"><img src="images/inscription.png" class='mb-2' width="55%" height="65%" ><h6>Inscriptions</a></h6> 


</div>

<div class="col-xl-2 col-lg-2"></div>




</div>




  



  


    


</div>
<br><br><br><br><br><br>

                       
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

