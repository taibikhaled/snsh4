<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


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
    <script>
          $('.carousel').carousel({
        interval: 2000
        })
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

          <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0 "><h3 class="text-center"><b>Ecole de Formation Professionnelle en Gestion -ORAN</h3><h5 class="text-center">   Avenue Larbi Ben Mhidi - Oran </b></h5></p>
                  <hr class="border-warning mt-1" >

                  <div class="row">
                                                  
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="images/01.jpg"
                                alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="images/02.jpg"
                                alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="images/03.jpg"
                                alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>

              
             
              
               </div>
                  
                
               
                  </div>
                </div>
                </div>

     
       
      
    
      
                <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
                <div class="card-body">
                  
                  

                  <div class="row">
                  
                    <table class="table ">
                      
                        <tr>
                         
                          <td> 
                          <?php

                              $pre=$path."app/fpinscr/oran/";

                              echo'
                              <a href="'.$pre.'"><h5><b>	Pre-Inscription en ligne</b></h5></a>'
                                  
                              ?>
                            	
                          </td>
                                                    
                        </tr>
                        <tr>
                         
                          <td>
                            <a href="Fiche_renseignement.pdf"><h5><b>Télécharger la fiche de renseignement </b></h5></a>
                          </td>
                         
                          
                        </tr>
                        <tr>
                         
                          <td>
                            <a href="#dossier"><h5><b>Dossier à fournir </b></h5></a>
                          </td>
                         
                          
                        </tr>
                        <tr>
                          
                          <td>
                            <a href="#formation"><h5><b>	Liste des Spécialités </b></h5></a>
                          </td>
                          
                        </tr>
                        <tr>
                            <td>
                              <a href="#programme" data-toggle="modal" data-target="#exampleModal"><h5><b>	Programme de Formation</b></h5></a>
                            </td>
                            
                          </tr>
                                                
                      
                      
                    </table>
                 
             
              
               </div>
        </div>                  
                
               
                 
               
                </div>
                </div>
                </div>
                <div class="row">

          <div class="col-md-11 grid-margin stretch-card">
              <div id='dossier' class="card">
                <div class="card-body">
                  <p class="card-title mb-0"><h3 ><b>Dossier à fournir</b></h3></p>
                  <hr class="border-warning mt-1" >

                    <div  class="row">
                        <img src="images/formation.png" width='70%'>
                   </div>

                </div>

                   <br><br>

                   
                   <div class="card-body">

                   <p id="formation" class="card-title mb-0"><h3 ><b>Liste des Spécialités</b></h3></p>
                  <hr class="border-warning mt-1" >

                    <div  class="row">
                        <img src="images/dossier.png" width='70%'>
                        </div>
                    </div>
            
                    </div>
 
                    </div>
 
                                    
         
              
       
        

     
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                	<div class="modal-dialog modal-lg" role="document">
	                	<div class="modal-content">
                    <div class="modal-header bg bg-warning">
                             <h4 class="modal-title text-white">Ecole de Formation Professionnelle en Gestion  -  Oran </h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          	</button>
		                    </div>
		
              <div class="modal-body">


              <h2 class="text-center">Programme de Formation</h2>

                <div class="row m-4">
                  
                 
                <table width='100%' class="table p-3 table-sm text-primary border border-0 ">
                      
                      <tr>
                      
                       
                       
                      <td width='90%'> 
                      <a href="Fiche_CMP.pdf" target='_blank'>
                         <h5 class="text-primary"><b>Certificat de Maîtrise Professionnel en Comptabilité </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="Fiche_CMP.pdf" target='_blank'>
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>
                      
                    
                      <tr>
                      
                       
                       
                      <td width='90%'> 
                      <a href="Fiche_CMTC.pdf" target='_blank'>
                         <h5 class="text-primary"><b>Certificat de Maîtrise des Techniques Comptables </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="Fiche_CMTC.pdf" target='_blank'>
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>
                      
                      <tr>
                      
                       
                       
                      <td width='90%'> 
                      <a href="Fiche_bts_Informatique_BD.pdf" target='_blank'>
                         <h5 class="text-primary"><b>Technicien Supérieur en Informatique </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="Fiche_bts_Informatique_BD.pdf" target='_blank'>
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>
                      
                      <tr>
                      
                       
                      <td width='90%'> 
                      <a href="Fiche_bts_commmerce_inter.pdf" target='_blank'>
                        <h5 class="text-primary"><b>Technicien Supérieur en Commerce International </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="Fiche_bts_commmerce_inter.pdf" target='_blank'>
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>
                      
                      <tr>
                      
                      <td width='90%'> 
                      <a href="#" >
                         <h5 class="text-primary"><b>Technicien Supérieur en Gestion des Ressources Humaines </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="#">
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>

                      <tr>
                      
                      <td width='90%'> 
                      <a href="#" >
                         <h5 class="text-primary"><b>Technicien Supérieur en Secrétariat </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="#" >
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>                      
                    
                    
                      <tr>
                      
                      <td width='90%'> 
                      <a href="Fiche_bts_Educatrice.pdf" target='_blank'>
                         <h5 class="text-primary"><b>Technicien Supérieur en Educations des Jeunes Enfants </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="Fiche_bts_Educatrice.pdf" target='_blank'>
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>                      



                      <tr>
                      
                      <td width='90%'> 
                      <a href="#" >
                         <h5 class="text-primary"><b>Master Professionnel en Management </b></h5>    
                         </a>                          
    
                        </td>
    
                        <td width='10%'> 
                          <a href="#" >
                           <h2 class="text-primary"> <i class="mdi mdi-download menu-icon"></i> </h2>
        
                          </a>
                        </td>
                      
                      </tr>          
                  </table>
               
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

