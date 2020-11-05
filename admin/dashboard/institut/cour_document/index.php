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
  

  
  

<script type="text/javascript">

function fcte(fiche)
            {
            msg=window.open(fiche,'fenetre','width=500,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
            }

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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Cours (Document)</h4>
              <hr>
              
              
                              



              <?php



              $connect_news=$path.'Config/connect_news.php';
              include($connect_news);

              $sql='Select * from cour_document where etablissement="IFG"';

              $req = $con->query($sql);

              $count = $req->rowCount();

              // initialisation des variables 

              if (!isset($_GET['debut']))  {
                $debut=0;
                
                } else
                {
                  $debut=$_GET['debut'];
                }
                

                if (!isset($_GET['id']))  {
                  $id=1;
                  
                  } else
                  {
                    $id=$_GET['id'];
                  }
                  
                

                
                $fin=$debut+5;

              $sqll='Select * from cour_document where etablissement="IFG" order by id desc LIMIT '.$debut.', 5 ;';

              $reqq = $con->query($sqll);



              echo '<div class="table-responsive "><table  class="table table-sm   table-hover table-list">
              <thead><th><h6 class="font-weight-bold text-gray-100">ID</h6></th><th><h6  class="font-weight-bold text-gray-100">Date</h6></th><th><h6  class="font-weight-bold text-gray-100">Libellé</h6></th><th><h6  class="font-weight-bold text-gray-100">Spécialité</h6></th><th><h6  class="font-weight-bold text-gray-100">Matiére</h6></th><th><h6  class="font-weight-bold text-gray-100">Enseignant</h6></th><th><h6  class="font-weight-bold text-success"><center>Modifier</center></h6></th><th><h6  class="font-weight-bold text-danger"><center>Supprimer</center></h6></th></thead>
              <tbody> ';

              $acc=0;
              while($row = $reqq->fetch()) {


              $lien=$path."backup/cours_document/".$row['lien'];

              $acc=$acc+1;
              if (($acc>2)||($fin>5)) {
                echo "<tr><td ><h6><a href=".$lien.">".$row['id']."</a></h6> </td><td><h6><a href=".$lien."> ".$row['dat']." </a></h6></td><td><h6><a href=".$lien.">" .$row['lib_doc']."</a></h6></td><td><h6><a href=".$lien.">" .$row['cldem']."</a></h6></td><td><h6><a href=".$lien.">".$row['codmat']."</a></h6></td><td><h6><a href=".$lien.">".$row['nom_ens']."</a></h6></td><td><center><a href='modification.php?id=".$row["id"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3> </a></center></td><td><center><a href='javascript:del(".$row['id'].")' ><h3 class='text-danger'>  <i class='mdi mdi-delete  menu-icon'></i> </h3> </a></center></td></tr>";
              } else {
                echo "<tr><td ><h6><a href=".$lien.">".$row['id']."</a></h6> </td><td><h6><a href=".$lien."> ".$row['dat']." </a></h6></td><td><h6><a href=".$lien.">" .$row['lib_doc']."</a></h6></td><td><h6><a href=".$lien.">" .$row['cldem']."</a></h6></td><td><h6><a href=".$lien.">".$row['codmat']."</a></h6></td><td><h6><a href=".$lien.">".$row['nom_ens']."</a></h6></td><td><center><a href='modification.php?id=".$row["id"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3> </a></center></td><td><center><a href='javascript:del(".$row['id'].")' ><h3 class='text-danger'>  <i class='mdi mdi-delete  menu-icon'></i> </h3> </a></center></td></tr>";
              }

              }

              echo '</tbody>
              <tfoot>
                        <th colspan="5" >
                        <div class="float-right">

                          <div class="btn-group">';

              $pos2=$debut-5;
              $lien3="index.php?id=".$id."&debut=".$pos2;

              if ($pos2>=0) echo ' <a class="btn btn-dark btn-sm" href="'.$lien3.'">&laquo;</a>';

              $i = 0;$pg=0;
              while ($i < $count) {
                
                $pg=$pg+1;

                $intervall_debut=$debut-5;
                $intervall_fin=$debut+20;
                
                if ($intervall_fin>=$count) 
                
                {
                  $intervall_debut=$count-30;
                  $intervall_fin=$count;

                }

                $lien2="index.php?id=".$id."&debut=".$i;
                
                if (($i>$intervall_debut) && ($i<= $intervall_fin))
                
                if ($i<>$debut) {
                  echo ' <a class="btn btn-outline-dark btn-sm" href="'.$lien2.'">'.$pg.'</a> ';
                } else
                {
                  echo ' <a class="btn btn-outline-dark disabled btn-sm"  href="'.$lien2.'">'.$pg.'</a> ';
                }
                
                $i=$i+5;
              }

              $pos=$debut+5;
              $lien4="index.php?id=".$id."&debut=".$pos;

              if ($pos<$count) echo ' <a class="btn btn-dark btn-sm" href="'.$lien4.'">&raquo;</a>';

              echo '
                          </div> 
                          </div> 
                      </th>
                    </tr>
              </tfoot>
              </table></div>';


              ?> 


              </div>

              <hr width="70%">

<div class="row p-2">


<div class="col-xl-12 col-lg-12 ">
     
<form name='mat' enctype="multipart/form-data" method="POST" action="ins.php" >
<div class="row">
<div class="col-xl-3 col-lg-3 "></div>
<div class="col-xl-6 col-lg-6 ">
   
     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Libellé :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Libellé ..." value="<?php if (isset($_POST['lib_matiere'])) print $_POST['lib_matiere'];?>" >
     </div>

    
    <div class="form-group">
     
     <label class="font-weight-bold text-gray-100" for="textarea">Spécialité :</label>
     
    <select name="spe" id="spe"  class="form-control form-control-sm" onchange="fetch_select_mat(this.value);">


    <option value ="" disabled selected ></option>';

    <?php
  
        $connect=$path.'Config/connect_news.php';
        include($connect);

        $sqll=' SELECT * FROM specialite_institut ';

        $reqq = $con->query($sqll);
        
        

        while($row = $reqq->fetch()) {
            echo "<option value='".$row["CLDEM"]."'>".$row["CLDEM"]."|".$row["SPEC"]."</option>";
          }

    ?>


</select>

</div>


<div class="form-group">
<label class="font-weight-bold text-gray-100" for="textarea">Matière :</label>
     
<select name="matiere" id="matiere"  class="form-control form-control-sm " >


</select>

</div>

<div class="form-group">

<label class="font-weight-bold text-gray-100" for="textarea">Enseignant :</label>


              <div class="input-group">	
								
                <INPUT type="text" id="nom" class="form-control form-control-sm"  name="nom" placeholder="Nom Enseignant ...">
                
                <div class="input-group-append">

                      <?php
                        
                        $pag=$path.'page/search_ens_institut.php';
                        
                        print '<a class="btn btn-dark btn-sm"   href="#" onclick="fcte(`'.$pag.'`)">OK </a>';
                      ?>

              </div>
          </div>  
 </div>
          
    <div class=form-group>    

        
    <input type="hidden" name="MAX_FILE_SIZE" value="7000000" />  

    <label class="font-weight-bold text-gray-100" for="textarea"> Piéce Jointe : </label>

    <input type="hidden" name="fichier1" value="fichier1" />

    <input name="file1" type="file" size="30" id="file1"  />

    </div>										
    <p><h6 class="text-danger">En cas de plusieurs fichiers, on adopte la solution du compression *.rar *.zip </h6></p>


     <hr>
                            
     <div class="form-group float-right"> 
           
              
           <input type="submit" name='submit' class="btn btn-outline-dark btn-sm "  value="Ajouter">
           <input type="reset" name='reset' class="btn btn-outline-dark btn-sm"  value="Initialiser"><br><br> 
           
       

     </div>

    

</form>
</div>
</div>
</div>
</div></div>
                    
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

