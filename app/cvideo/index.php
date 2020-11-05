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


                    $sqll='Select * from cour_video where id = '.$idd.' ;';

                    $reqq = $con->query($sqll);
                  
                    $row = $reqq->fetch(); 
                  
                    /*

                    if ($row["url_youtube"]<>'') { 

                      $vd=$row["url_youtube"];
                      $ad=explode("=",$vd);
                      $lien_youtube="https://www.youtube.com/embed/".$ad[1];
                  
                    } $lien_youtube="";

                    */

                                            

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
                              
              

                      print '<video width="480" height="320" controls>
                      <source src="'.$path."backup/cours_video/".$row["lien"].'" type="video/mp4">
                      
                      
                    </video><br><br><a href="'.$row["url_youtube"].'" target="blank">le lien Youtube : </a>';
                    ?> 


                  
                  <hr>
                  <?php
                   
                  print "<p class='p-2 text-dark text-left'>".$dat."</p><h4>".$row["lib_doc"]."</h4><h5>".$lib_matiere."</h5><h6>".$row['cldem']."</h6><h6>L'Enseignant : ".$row['nom_ens']."</h6>";
                  
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
                        $cadre=$path.'page/cadre_video.php';
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

