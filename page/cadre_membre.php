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
$sqll='Select * from cour_document where cldem="'.$struc.'" and active=true order by id desc LIMIT '.$debut.', 4 ;';

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



                  </div>

                  <div class="row mt-4">
			                <div class="col-lg-12 text-right">
			            
                          <div class="h6   mb-1">
                              
                              <?php
                                  $lien=$path."app/fp/cdocuments/index.php";
                                  echo "<a href='".$lien."'>Autres Cours (Documents) ...</a>";
                              ?>

               
                          </div>
			                </div>
		            </div>







              </div>
            </div>
            </div>
