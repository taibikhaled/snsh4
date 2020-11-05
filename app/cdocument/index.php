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
                  <p class="card-title mb-0">Cours Video</p>
                  <hr class="border-warning mt-1" >

                  <div class="text-center">

                    <?php
                    
                    
                   $connect_news=$path.'Config/connect_news.php';
                   include($connect_news);
                    
 
                    $idd=$_GET['id'];


                    $sqll='Select * from cour_document where id = '.$idd.' ;';

                    $reqq = $con->query($sqll);
                  
                    $row = $reqq->fetch(); 
                  
                                            

                    $lib_matiere="";  
  
                    if ($row["etablissement"]=="IFG"){
                  
                  
                    $sql_mat="Select * from matiere_institut  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                  
                    $req_mat = $con->query($sql_mat);
                  
                    $ro_mat = $req_mat->fetch();
                    $lib_matiere=$ro_mat["DESIGNATION"];
                    }
                    
                    if ($row["etablissement"]=="EES"){
                  
                  
                      $sql_mat="Select * from matiere_etablissement  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                    
                      $req_mat = $con->query($sql_mat);
                    
                      $ro_mat = $req_mat->fetch();
                      $lib_matiere=$ro_mat["DESIGNATION"];
                      }
                    
                      if ($row["etablissement"]=="EFPG"){
                  
                  
                        $sql_mat="Select * from matiere_ecole  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                      
                        $req_mat = $con->query($sql_mat);
                      
                        $ro_mat = $req_mat->fetch();
                        $lib_matiere=$ro_mat["DESIGNATION"];
                        }
                        

                        if ($row["etablissement"]=="EFPG-BEJAIA"){


                          $sql_mat="Select * from matiere_bejaia  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                        
                          $req_mat = $con->query($sql_mat);
                        
                          $ro_mat = $req_mat->fetch();
                          $lib_matiere=$ro_mat["DESIGNATION"];
                          }
                  
                      if ($row["etablissement"]=="EFPG-ORAN"){
                  
                  
                            $sql_mat="Select * from matiere_oran  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                          
                            $req_mat = $con->query($sql_mat);
                          
                            $ro_mat = $req_mat->fetch();
                            $lib_matiere=$ro_mat["DESIGNATION"];
                            }
                                          
                      $dat = strftime(" %d %B ", strtotime($row['dat']));
                              
              
$lien=$path."backup/cours_document/".$row['lien'];
                      
		print "<div class='row'><div class='col-xl-3 col-lg-3'></div><div class='col-xl-6 col-lg-6 shadow  text-left  '><a href=".$lien." ><img src='".$path."images/pdf.png' class='m-2' 	width='35%' height='35%' ></a><p class='p-2 text-dark'>".$dat."<br>".$row["lib_doc"]."<br>".$lib_matiere."<br>".$row["cldem"]."<h6 class='text-warning text-right'>".$row["etablissement"]."</h6></p></div></div>";

 print "<h6 class='mt-4'>L'Enseignant : ".$row['nom_ens']."</h6>";
                  
                  
  ?> 


                  
                  <hr>
                  <?php

print'<div class="text-center"><a href="'.$lien.'" target="_blak" class="btn btn-primary lg col-lg-5"><h6>   <i class="mdi mdi-download menu-icon mr-2"></i> Télécharger - تحميل </h6></a></div>';

                                   ?>

                  </div>
                  
                  </div>
                </div>
                </div>


                    <?php
                        $news=$path.'page/news.php';
                        include($news);
        
                    ?>           
       
      
          </div>


        <div class="row">

                <?php
                        $cadre=$path.'page/cadre.php';
                        include($cadre);
                
                    ?>  
                    
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

