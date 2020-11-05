<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);

if (!isset($_COOKIE["id_user"])) {
  header('location:'.$path.'index.php');
  exit();
  };
  


session_start();

$_SESSION['path']=$path;

//$id=$_GET['id'];


$p=explode("|",$_COOKIE["id_user"]);
$pp=$p[1];
      
$id=$pp;


$id_msg=$_GET['id_msg'];


$connect=$path.'Config/connect_login.php';
include($connect);

$sql='Select * from users_membre where id='.$id;

$req = $con->query($sql);

$row = $req->fetch(); 
                
$nom=$row["nom"];
$matricule=$row["matricule"];

$dat=$row["dat_nais"];

$fonc=$row["institut"];
$struc=$row["formation"];


 $img=$row["img"];
    
//$image=$_SESSION['path']."images/".$img;
$image=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
$image2=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
//$image2=$_SESSION['path'].'images/'.$matricule.'.jpg';
//print $image;

$active='false';
$vue='true';

$sql = "UPDATE `alerte` SET active=:active , vue=:vue WHERE id_msg=".$id_msg;
$datas = array(':active'=>$active , ':vue'=>$vue);

//print $sql;
// execution de la requete
$records = $con->prepare($sql);
$records->execute($datas);



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
            

            function del(ss,ms) {
  
  if ( confirm( "Voulez Vous Supprimer " ) ) {
// Code à éxécuter si le l'utilisateur clique sur "OK"
  window.location = "supp.php?id="+ss+"&id_msg="+ms;

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
          

          <div class="row">


          
                 
                 <?php
                   
                   $ident=$path.'page/ident.php';
                   include($ident);
                   
                 ?> 
                    
                 

                     
                 <div class="col-xl-12 col-lg-12  pt-2">
           
                   
                 <h4 class='m-0 font-weight-bold text-primary'>alerte <i class='fas fa-envelope fa-fw'></i></h4>
                   <?php print '<h6 class="text-primary text-right">
                   
                   <a title="Ecrire" class="btn btn-primary ml-1" href="../../ecrire/index.php?id='.sha1($id).'"><i class="mdi mdi-pencil menu-icon"></i></a>
                   <a title="Supprimer" class="btn btn-primary ml-1" href="javascript:del('.$id.','.$_GET["id_msg"].')"><i class="mdi mdi-delete menu-icon"></i></a></h6>' ;?>
                   
                  
                   
                 </div>    
                 
                 <div class="col-xl-12 col-lg-12   ">
                 

               <div class="row">

               
                       <?php



                       $connect=$path.'Config/connect_login.php';
                       include($connect);

                      
                       $sqll='Select * from alerte where id_msg='.$id_msg;

                       $reqq = $con->query($sqll);

                       $row = $reqq->fetch();

                       print "
                       
                       <div class='col-xl-12 col-lg-12 table-responsive card shadow border border-left-primary p-4'><br>
                       

                       <h5 class='text-gray-900'>Objet : ".$row["objet"]."</h5>";

                       print "<br><h5 class='text-primary'>De : <img class='rounded-circle' width='3%' src='..\images\man.png' alt=''>".$row["nom"]."</h5>";

                       setlocale(LC_TIME, "fr_FR", "French");
                       $date1 = $row['dat'];
                       
                       $date = strftime("%A %d %B %X", strtotime($date1));
                
                       echo "<h6 class='text-primary text-right'>".utf8_encode($date)."</h6>";

                      

                       print "<br><h5 class='text-gray-900 ml-4'>".$row["body"]."</h5>  ";

                       

                       if ($row['f_pj']!='') echo "<h5 class='text-gray-900 ml-1'> .Pièce Jointe : <a href=".$path."backup/Espace_membre/alertes/Pieces/".$row['f_pj'].">".$row['f_pj']."</a> <i class='fa fa-paperclip text-primary'></i></h5></div>";  
                        

                       
                     ?>

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

