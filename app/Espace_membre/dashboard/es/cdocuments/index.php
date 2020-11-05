<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }


$_SESSION['path']=$path;

if (!isset($_COOKIE["id_user"])) {
  header('location:'.$path.'index.php');
  exit();
  };
  
  setlocale(LC_TIME, "fr_FR", "French");
  
  
  $_SESSION['path']=$path;
  
  $p=explode("|",$_COOKIE["id_user"]);
  $pp=$p[1];
        
  $id=$pp;
  
  
  $connect_news=$path.'Config/connect_login.php';
  include($connect_news);
  
  $sql='Select * from users_membre where id='.$id;
  
  $req = $con->query($sql);
  
  $row = $req->fetch(); 
                  
  $nom=$row["nom"];
  $matricule=$row["matricule"];
  
  
  
  $fonc=$row["institut"];
  $struc=$row["formation"];
  

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

function fetch_select_mat(val)
                    {
                    $.ajax({
                    type: 'post',
                    url: 'fetch_data_mat.php',
                    data: {
                    get_option:val
                    },
                    success: function (response) {
                      document.getElementById("matiere").innerHTML=response; 
                    }
                    });
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
		 $menu=$path.'page/menu_membre.php';
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
                  <p class="card-title mb-0"> Recherche un Cours Document</p>
                  <hr class="border-warning mt-1" >


                                        
                    <div class="row p-2">


                    <div class="col-xl-12 col-lg-12 ">
                        
                    <form enctype="multipart/form-data" method="GET" action="index.php" >
                    <div class="row">
                    <div class="col-xl-3 col-lg-3 "></div>
                    <div class="col-xl-6 col-lg-6 ">
                      
                     
                

                      <div class="form-group">
                      <label class="font-weight-bold text-gray-100" for="textarea">Matière :</label>
                          
                      <select name="matiere" id="matiere"  class="form-control form-control-sm " >

                        <?php




                        $connect=$path.'Config/connect_news.php';
                        include($connect);

                            

                        $sqll="SELECT * FROM matiere_etablissement where cldem='".$struc."'";

                        $reqq = $con->query($sqll);


                        echo "<option value=''></option>";

                        while($row = $reqq->fetch()) {
                            echo "<option value='".$row["CODMAT"]."'>".$row["CODMAT"]."|".$row["DESIGNATION"]."</option>";
                          }
                        ?>


                        </select>


                      </div>
                        <div class="form-group float-right"> 
                              
                                  
                              <input type="submit" name='submit' class="btn btn-outline-dark btn-sm "  value="Rechercher">
                              
                          

                        </div>

                        

                    </form>
                    </div>
                    </div>

                  </div>
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

        <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Cours (Document)</p>
                  <hr class="border-warning mt-1" >

                  <div class="row">
                
                  <?php

                       $connect_news=$path.'Config/connect_news.php';
                      include($connect_news);
                 
                      $debut=0;

                      $spe= $struc.'%';  
                      if (isset($_GET['matiere'])) $matiere=$_GET['matiere'].'%'; else $matiere='%';
         
                  
                      //print "<br>".$cat."-".$spe."-".$niveau."-".$matiere;
                 
                      $sqll="Select * from cour_document  
                      where (active=true)and (etablissement ='EES') and (cldem LIKE '".$spe."') and (codmat LIKE '".$matiere."') 
                      order by id desc ";
      
                   


                 $reqq = $con->query($sqll);
                 
                 while($row = $reqq->fetch()) {
                 
                 
                   
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


                
                
                //echo "<tr><td ><h6><a href=".$lien.">".$row['id']."</a></h6> </td><td><h6><a href=".$lien."> ".$row['dat']." </a></h6></td><td><h6><a href=".$lien.">" .$row['lib_doc']."</a></h6></td><td><h6><a href=".$lien.">" .$leb_cat."</a></h6></td><td><h6><a href=".$lien.">" .$lib_niv."</a></h6></td><td><h6><a href=".$lien.">" .$lib_spe."</a></h6></td><td><h6><a href=".$lien.">" .$ro_mat['lib_matiere']."</a></h6></td><td><center><a href='modification.php?id=".$row["id"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3> </a></center></td><td><center><a href='javascript:del(".$row['id'].")' ><h3 class='text-danger'>  <i class='mdi mdi-delete  menu-icon'></i> </h3> </a></center></td></tr>";
                
                print "<div class='col-xl-3 col-lg-3 shadow  text-left  '><a href=".$lien." ><img src='".$path."images/pdf.png' class='m-2' width='35%' height='35%' ></a><p class='p-2 text-dark'>".$dat."<br>".$row["lib_doc"]."<br>".$lib_matiere."<br>".$row["cldem"]."<h6 class='text-warning text-right'>".$row["etablissement"]."</h6></p></div>";
                                    
                 }
                 
                 
                 
                 ?>
                      
                
          </div> </div> </div>        
                    
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

