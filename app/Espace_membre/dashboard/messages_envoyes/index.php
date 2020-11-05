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


$sq='Select count(*)as nbr from `message_envoye` where id='.$id;


$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg=$r["nbr"];

// les msg non lus

$sq='Select count(*)as nbr from `message_envoye` where vue="false" and id='.$id;

$re = $con->query($sq);

$r = $re->fetch();

$nbr_msg_nlus=$r["nbr"];



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

<script language="JavaScript">
            

            function fcte(fiche)
            {
            msg=window.open(fiche,'fenetre','width=550,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
            }


function cocherTout()
{
   var cases = document.getElementsByTagName('input');  
   
    // on recupere tous les INPUT
   for(var i=0; i<cases.length; i++)     // on les parcourt
      if(cases[i].type == 'checkbox')     // si on a une checkbox...
         if (cases[i].checked == true) 
              cases[i].checked = false ; else
              cases[i].checked = true;     // ... on la coche
}

function clicked() {
    return confirm('Voulez Vous Supprimer');
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

          <div class="col-md-12 stretch-card">
              <div class="card">
               
 
<div class="card-body">
          
<h4 class="card-title  ">Messages Envoyés</h4>
<hr>
          <div class="row">


          
                 
                 <?php

                   $ident=$path.'page/ident.php';
                   include($ident);
                   
                 ?> 
                    
                 <div class="col-xl-12 col-lg-12 font-weight-bold text-primary  ">

                     
                 <div class="py-3 d-flex flex-row align-items-center justify-content-between">
           
                 <?php print  '<h5 class="m-0 font-weight-bold text-primary"><a>Messages Envoyés <i class="mdi mdi-email menu-icon"></i>&nbsp<span title="Non Lus / Lus" class="badge badge-pill badge-primary badge-counter"> '.$nbr_msg_nlus.' / '.$nbr_msg.'</span></a></h5>'; ?>
                   
                   <?php print '<h5 class="text-primary font-weight-bold text-right"><a title="Ecrire" class="btn btn-primary ml-4" href="../ecrire/index.php"><i class="mdi mdi-pencil menu-icon" > </i></a></h5>' ;?>
                   
                 </div>    
               <div class="row">


                       <?php



                       $connect=$path.'Config/connect_login.php';
                       include($connect);

                       $sql='select * from message_envoye where id='.$id;

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

                         $sqll='Select * from message_envoye where id='.$id.' order by id_msg desc LIMIT '.$debut.', 5 ;';

                       $reqq = $con->query($sqll);



                       echo '<section class="table-responsive card shadow border border-left-primary ml-3"><form method="GET" action="supp.php"> <input type="hidden" name="id" value="'.$id.'" > <table class="table  table-hover table-list">
                       <thead><th width="5%">Compte </th><th width="15%"><h6 class="font-weight-bold text-primary"></h6></th><th width="60%"><h6  class="font-weight-bold text-primary">Objet</h6></th><th><h6  class="font-weight-bold text-primary">Date</h6></th><th>
                       <center><button title="Selectionner" class="font-weight-bold text-primary" type="button" onclick="cocherTout()"><i class="mdi mdi-select-all menu-icon"></i></button><button title="Supprimer" class="font-weight-bold text-primary  ml-1" type="submit" onclick="return clicked();"><i class="mdi mdi-delete menu-icon"></i></button></center></th></thead>
                       <tbody> ';

                       
                       while($row = $reqq->fetch()) {



                       
                       $date1 = $row['dat'];

                       $dat = strftime(" %d %B %H:%M", strtotime($date1));
                
                       $sql='Select * from users_membre where id='.$row['id'];

                       $req = $con->query($sql);

                       $ro = $req->fetch();
                       
                       $image3=$_SESSION['path'].'backup/Espace_membre/Photos/'.$ro["img"];



                       $lien=$path."app/Espace_membre/dashboard/messages/detaille_message/index.php?msg='".sha1($row['from_id'])."'&id=".$row['from_id']."&id_msg=".$row['id_msg'];

                       
                       $lien=$path."app/Espace_membre/dashboard/messages_envoyes/detaille_message/index.php?msg='".sha1($row['id'])."'&id=".$row['id']."&id_msg=".$row['id_msg'];

                              
                       if ($row["vue"]=="true") {
                       echo "<tr><td ><img class='rounded-circle' width='60%' src='".$image3."' alt=''></td><td><h6><a href=".$lien."> ".$row['from_nom']." </a></h6></td><td><h6><a href=".$lien.">" .$row['objet']."</a></h6></td><td ><h6><a href=".$lien.">".$dat."</a></h6> </td><td><center><input type='checkbox' class='form-control-sm' name='sup[]' value='".$row['id_msg']."' ></center></td></tr>";
                       } else {
                       echo "<tr class='bg bg-gray-100'><td ><img class='rounded-circle' width='60%' src='".$image3."' alt=''></td><td><h6 class='font-weight-bold'><a href=".$lien."> ".$row['from_nom']." </a></h6></td><td><h6 class='font-weight-bold'><a href=".$lien." >" .$row['objet']."</a></h6></td><td ><h6 class='font-weight-bold'><a href=".$lien." >".$dat."</a></h6> </td><td><center><input type='checkbox' class='form-control-sm' name='sup[]' value='".$row['id_msg']."' ></center></td></tr>";
                       }

                       }

                       if ($count>5) {

                       echo '</tbody>
                       <tfoot>
                       <tr>
                       <th colspan="6" >
                       <div class="float-right">

                       
                         <div class="btn-group mt-2">';

                         $pos2=$debut-5;
                         $lien3="index.php?id=".sha1($id)."&debut=".$pos2;
                       
                         if ($pos2>=0) echo ' <a class="btn btn-primary" href="'.$lien3.'">&laquo;</a>';
                       
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
         
                             $lien2="index.php?id=".sha1($id)."&debut=".$i;
                             
                             if (($i>$intervall_debut) && ($i<= $intervall_fin))
         
                               if ($i<>$debut) {
                             
                                 echo ' <a class="btn btn-primary" href="'.$lien2.'">'.$pg.'</a> ';
         
                               } else
         
                               {
                                 echo ' <a class="btn btn-outline-primary disabled"  href="'.$lien2.'">'.$pg.'</a> ';
                               }
                             
                             $i=$i+5;
                       }
                         
                         $pos=$debut+5;
                         $lien4="index.php?id=".sha1($id)."&debut=".$pos;
         
                         if ($pos<$count) echo ' <a class="btn btn-primary" href="'.$lien4.'">&raquo;</a>';
                       
                     }
                         echo '
                                       </div> 
                                     </div> 
                                   </th>
                               
                                     </tfoot>
                                     </table></form></section>';


                       ?> 


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

