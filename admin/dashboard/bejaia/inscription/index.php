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
            msg=window.open(fiche,'fenetre','width=800,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Inscriptions - <a href='statistique.php'>Statistiques</a></h4>
              <hr>
              
              
                              



              <?php



              $connect_news=$path.'Config/connect_news.php';
              include($connect_news);

              $con->exec("SET CHARACTER SET UTF8");

              $sql="SELECT a.id, a.dat, a.NOME, a.PRENOME, a.DATN, (c.designation) as NIVEAU, b.designation, b.choix FROM `inscription_bejaia` a, `inscription_bejaia_choix` b, `equivalent_niveau_bejaia` c where (a.id=b.id_inscription) and (a.nivs=c.id) and (b.choix='1') order by a.id";

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

              $sqll="SELECT a.id, a.dat ,a.NOME, a.PRENOME, a.DATN, (c.designation) as NIVEAU, b.designation, b.choix FROM `inscription_bejaia` a, `inscription_bejaia_choix` b, `equivalent_niveau_bejaia` c where (a.id=b.id_inscription) and (a.nivs=c.id) and (b.choix='1') order by a.id LIMIT ".$debut.", 5 ;";

              $reqq = $con->query($sqll);




              echo '<div class="table-responsive ">
              <table width="100%" class="table  table-hover table-list">

              <thead>
                <th width="5%"><h6 class="font-weight-bold text-gray-100">ID</h6></th>
                <th width="15%"><h6  class="font-weight-bold text-gray-100">Date</h6></th>
                <th width="10%"><h6  class="font-weight-bold text-gray-100">Nom</h6></th>
                <th width="10%"><h6  class="font-weight-bold text-gray-100">Prénom</h6></th>
                <th width="10%"><h6  class="font-weight-bold text-gray-100">Date Nais</h6></th>
                <th width="25%"><h6  class="font-weight-bold text-gray-100">Niveau</h6></th>
                <th width="25%"><h6  class="font-weight-bold text-success">Choix</h6></th>
                </thead>
              <tbody> ';

              $acc=0;
              while($row = $reqq->fetch()) {
              
              $dat_ins = date('d/m/Y',strtotime($row['dat']));

              $dat_nais = date('d/m/Y',strtotime($row['DATN']));

              $lien="detaille.php?id=".$row['id'];

              $acc=$acc+1;
              if (($acc>2)||($fin>5)) {
                echo "<tr>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['id']."</a></h6> </td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$dat_ins." </a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>" .$row['NOME']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>" .$row['PRENOME']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$dat_nais."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['NIVEAU']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['designation']."</a></h6></td>
                        </tr>";
              } else {
                echo "<tr>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['id']."</a></h6> </td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$dat_ins." </a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['NOME']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['PRENOME']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$dat_nais."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['NIVEAU']."</a></h6></td>
                <td><h6><a href='#' onclick='fcte(`".$lien."`)'>".$row['designation']."</a></h6></td>
                </tr>";
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

              <hr>

<div class="row p-2">


<div class="col-xl-6 col-lg-6 text-right">
<a href="down_inscription.php" class="btn btn-primary"> <i class="mdi mdi-download menu-icon">Télécharger la liste des inscris</i></a>
</div>
<div class="col-xl-6 col-lg-6 text-left">
<a href="down_inscription_choix.php" class="btn btn-primary"><i class="mdi mdi-download menu-icon">Télécharger la liste des inscris avec les Choix</i></a>
</div>

<br><br><br><br><br><br>
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

