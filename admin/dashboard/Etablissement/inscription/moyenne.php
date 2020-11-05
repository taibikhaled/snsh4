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
                <h4 class="card-title  "><a href='../index.php'>Administration</a>  - <a href='index.php'>Inscriptions </a>- <a href='statistique.php'>Statistiques</a> - Moyennes (Adminission | CNEG)</h4>
<hr>
 
 
                 



<?php



$connect_news=$path.'Config/connect_news.php';
include($connect_news);

$sql='Select * from moyenne_etablissement ';

$reqq = $con->query($sql);



echo '<table  class="table table-sm   table-hover table-list text-center">
<thead><th><h6 class="font-weight-bold text-gray-100">Moyenne Admission (Lycée)</h6></th><th><h6  class="font-weight-bold text-gray-100">Moyenne CNEG</h6></th></thead>
<tbody> ';

$acc=0;
while($row = $reqq->fetch()) {


$lien="#";

$moy=$row[0];
$cneg=$row[1];

echo "<tr><td><h1><a href=".$lien." class='text-danger'> ".$row[0]." </a></h1></td><td><h1><a href=".$lien." class='text-danger'>" .$row[1]."</a></h1></td></tr>";

}

echo '</tbody>
</table>';


?> 


</div>

<hr width="95%">

<div class="row p-2">


<div class="col-xl-3 col-lg-3 "></div>
<div class="col-xl-6 col-lg-6 ">
  
<form  method="POST" action="mod.php" >

     
     <div class="form-group">

     <label class="font-weight-bold text-gray-100" for="textarea">Moyenne d'Admission (Lycée)</label>
     <input type="text" class="form-control form-control-sm" name="code" id="code"  placeholder="Moyenne d'Admission" value="<?php if (isset($moy)) print $moy;?>" >

    </div>
    
     <div class="form-group">

     <label class="font-weight-bold text-gray-100" for="textarea">Moyenne CNEG</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Moyenne CNEG" value="<?php if (isset($cneg)) print $cneg;?>"  >
     </div>


     
     

       
     <hr>
      
      <div class="text-right">
<button type="button" class="btn btn-primary btn-lg " data-toggle="modal" data-target="#exampleModal">
	Modifier
	</button>
  </div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">

    <div class="row mt-4">
                  
                  <div class='p-2 col-xl-12 col-lg-12   text-left mb-4 '>
                  <br>
                  <h3 class="text-center text-danger">Vous ête sûr de vouloir modifier votre pré-inscription</h3>    
                    <br><br>
<div class="form-group text-center"> 

                      <input type="submit" name='submit' class="btn btn-primary btn-lg "   value="Oui">

                      <input type="button" name='retour' class="btn btn-primary btn-lg " data-dismiss="modal" aria-label="Close"  value="Non">
                    
		</div>
</from>

           
       

    </div>
                  </div>
                  </div>

                  
                  </div></div>
                  </div>


                  </div>
             
</div><div class="col-xl-3 col-lg-3 "></div>
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

