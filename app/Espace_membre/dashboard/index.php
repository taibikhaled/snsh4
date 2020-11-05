<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);

if (!isset($_COOKIE["id_user"])) {
header('location:'.$path.'index.php');
exit();
};

setlocale(LC_TIME, "fr_FR", "French");


session_start();

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


 
$img=$row["img"];
    
//$image=$_SESSION['path']."images/".$img;
$image=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
$image2=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
//$image2=$_SESSION['path'].'images/'.$matricule.'.jpg';
//print $image;

$ddat = strtotime($row['dat_nais']);
$dat=date('d/m/Y', $ddat);


$fonc=$row["institut"];
$struc=$row["formation"];


$sq='Select count(*)as nbr from `message` where from_id='.$id;

$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg=$r["nbr"];

// les msg non lus

$sq='Select count(*)as nbr from `message` where vue="false" and from_id='.$id;

$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg_nlus=$r["nbr"];




//// alertes


$sq='Select count(*)as nbr from `alerte` where from_id='.$id;

$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg_alerte=$r["nbr"];

// les msg non lus

$sq='Select count(*)as nbr from `alerte` where vue="false" and from_id='.$id;

$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg_nlus_alerte=$r["nbr"];


?>
<!DOCTYPE html>
<html lang="fr">

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

          <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body ">
                  <h4 class="card-title  ">Espace Membre</h4>
<hr>
 
 
 <div class="row ">
                 
 <div class="card-body">
          

          <div class="row">


          
                                 
                               <?php
                 
                 $ident=$path.'page/ident.php';
                 include($ident);
                 
               ?> 
                    
                 

                 <div class="row col-xl-12 col-lg-12 font-weight-bold text-primary mt-4 ">

                     <div class="col-xl-12 col-lg-12   ">

                     


                       <?php



                       $connect_news=$path.'Config/connect_news.php';
                       include($connect_news);

                       $sql='Select * from message where id='.$id;

                       $req = $con->query($sql);

                       $count = $req->rowCount();

                       // initialisation des variables 

                       if (!isset($_GET['debut']))  {
                         $debut=0;
                         
                         } else
                         {
                           $debut=$_GET['debut'];
                         }
                         

                         
                         $fin=$debut+5;

                         $sqll='Select * from message where from_id='.$id.' order by id_msg desc LIMIT '.$debut.', 2 ;';

                       $reqq = $con->query($sqll);



                       echo '<section class="table-responsive card shadow  ">
                       
                     <table class="table table-sm table-hover table-hover table-list ">
                       <tr class="bg bg-primary">
                       <th><h5 class="text-white p-1" > Messages </h5></th><th></th><th></th><th class="text-right"><span title="Non Lus / Lus" class="badge badge-pill badge-primary badge-counter"> '.$nbr_msg_nlus.' / '.$nbr_msg.'</span></th>
                       </tr>
                       <tbody> ';

                      
                       while($row = $reqq->fetch()) {

  
                       $date1 = $row['dat'];

                       $dat = strftime(" %d %B %H:%M", strtotime($date1));
                  
                       $sql='Select * from users_membre where id='.$row['id'];

                       $req = $con->query($sql);

                       $ro = $req->fetch();
                       
                       $image3=$_SESSION['path'].'backup/Espace_membre/Photos/'.$ro["img"];



                       $lien=$path."app/Espace_membre/dashboard/messages/detaille_message/index.php?id=".$row['from_id']."&id_msg=".$row['id_msg'];

                       
                       if ($row["vue"]=="true") {
                       echo "<tr><td width='10%'><img class='rounded-circle' width='45%' src='".$image3."' alt=''></td><td width='20%'><h6><a href=".$lien."> ".$row['nom']." </a></h6></td><td width='55%'><h6><a href=".$lien.">" .$row['objet']."</a></h6></td><td ><h6><a href=".$lien.">".$dat."</a></h6> </td></tr>";
                       } else {
                       echo "<tr class='bg bg-gray-100'><td width='10%'><img class='rounded-circle' width='45%' src='".$image3."' alt=''></td><td width='20%'><h6 class='font-weight-bold'><a href=".$lien." > ".$row['nom']." </a></h6></td><td width='55%'><h6 class='font-weight-bold'><a href=".$lien." >" .$row['objet']."</a></h6></td><td ><h6 class='font-weight-bold'><a href=".$lien." >".$dat."</a></h6> </td></tr>";
                       }

                       }

                       echo '</tbody>
                       <tfoot>
                                 <th colspan="5" >
                                 <div class="float-right">

                                  <h6><a href="messages/index.php?id='.sha1($id).'">Voir les Autres Messages</a></h6>
                                   </div> 
                               </th>
                             </tr>
                       </tfoot>
                       </table></section>';


                       ?> 


                      </div>

                   </div>

                     











                 <div class="row col-xl-12 col-lg-12 font-weight-bold text-primary mt-4 ">

                   <div class="col-xl-12 col-lg-12   ">




                     <?php



                     $connect_news=$path.'Config/connect_news.php';
                     include($connect_news);

                     $sql='Select * from alerte where id='.$id;

                     $req = $con->query($sql);

                     $count = $req->rowCount();

                     // initialisation des variables 

                     if (!isset($_GET['debut']))  {
                       $debut=0;
                       
                       } else
                       {
                         $debut=$_GET['debut'];
                       }
                       

                       
                       $fin=$debut+5;

                       $sqll='Select * from alerte where from_id='.$id.' order by id_msg desc LIMIT '.$debut.', 2 ;';

                     $reqq = $con->query($sqll);



                     echo '<section class="table-responsive card shadow  ">
                     
                   <table class="table table-sm table-hover table-hover table-list ">
                     <tr class="bg bg-primary">
                     <th><h5 class="text-white p-1" > Alertes  </h5></th><th></th><th></th><th class="text-right"><span title="Non Lus / Lus" class="badge badge-pill badge-primary badge-counter"> '.$nbr_msg_nlus_alerte.' / '.$nbr_msg_alerte.'</span></th>
                     </tr>
                     <tbody> ';

                     $acc=0;
                     while($row = $reqq->fetch()) {


                    
                       $date1 = $row['dat'];

                     $dat = strftime(" %d %B %H:%M", strtotime($date1));
                
                    
                     $sql='Select * from users_membre where id='.$row['id'];

                     $req = $con->query($sql);

                     $ro = $req->fetch();
                     
                     $image3=$_SESSION['path'].'backup/Espace_membre/Photos/'.$ro["img"];



                     $lien=$path."app/Espace_membre/dashboard/alertes/detaille_alerte/index.php?id=".$row['id']."&id_msg=".$row['id_msg'];

                     $acc=$acc+1;
                     if ($row["vue"]=="true") {
                     echo "<tr><td width='10%'><img class='rounded-circle' width='45%' src='".$image3."' alt=''></td><td width='20%'><h6><a href=".$lien."> ".$row['nom']." </a></h6></td><td width='55%'><h6><a href=".$lien.">" .$row['objet']."</a></h6></td><td ><h6><a href=".$lien.">".$dat."</a></h6> </td></tr>";
                     } else {
                     echo "<tr class='bg bg-gray-100'><td width='10%'><img class='rounded-circle' width='45%' src='".$image3."' alt=''></td><td width='20%'><h6><a href=".$lien." > ".$row['nom']." </a></h6></td><td width='55%'><h6><a href=".$lien." >" .$row['objet']."</a></h6></td><td ><h6><a href=".$lien." >".$dat."</a></h6> </td></tr>";
                     }

                     }

                     echo '</tbody>
                     <tfoot>
                               <th colspan="5" >
                               <div class="float-right">

                               <h6><a href="alertes/index.php?id='.sha1($id).'">Voir les Autres alertes</a></h6>
                                 </div> 
                             </th>
                           </tr>
                     </tfoot>
                     </table></section>';


                     ?> 


                   </div>

                   </div>





               

         </div>
 

            <br><br>  


          <div class="row">

              <?php
                  include($path."page/cadre_video_membre.php");
                  ?>  
                  
              </div>
      
      <br><br>

          <div class="row">

              <?php
                  include($path."page/cadre_membre.php");
                  ?>  
                  
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

