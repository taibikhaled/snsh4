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

<?php
	 $base_ck=$path.'page/base_ck_js.php';
	 include($base_ck);
	 
	?> 

<script language="JavaScript">
            

            function fcte(fiche)
            {
            msg=window.open(fiche,'fenetre','width=750,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
            }

            function clicked() {
              
              
              var from_nom_test='false';

              var from_nom = document.getElementById('from_nom').value;   
                    if(from_nom == '') {
                      alert('Voulez Vous Choisir le compte distinataire');
                      from_nom_test='true';
                      return false;
                    }

             var titre_test='false';

              var titre = document.getElementById('titre').value;   
                    if(titre == '') {
                      alert('Veulliez Remplir le champs Objet');
                      titre_test='true';
                      return false;
                      }

              if (from_nom == 'false') 
                if (from_nom_test=='false') {
                      return true;
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
                <div class="card-body ">
                  <h4 class="card-title  ">Identification</h4>
<hr>
 
 
<div class="card-body">
          

          <div class="row">


          
              <?php
               
               $ident=$path.'page/ident.php';
               include($ident);
               
             ?> 
                    
                 <div class="col-xl-12 col-lg-12 font-weight-bold text-primary  ">

                     
                 <div class="py-3 d-flex flex-row align-items-center justify-content-between">
           
                   <h5 class="m-0 font-weight-bold text-primary">Messages <i class="fas fa-envelope fa-fw"></i></h5>
                   
                 </div>    
               <div class="row">


                       <?php



                       $connect=$path.'Config/connect_login.php';
                       include($connect);

                       $sql='Select * from message ';

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

                       $sqll='Select * from message order by id_msg desc LIMIT '.$debut.', 5 ;';

                       $reqq = $con->query($sqll);



                       ?> 




<div class="col-xl-12 col-lg-12">
               
               <form enctype="multipart/form-data" name="mat" method="POST" action="ins.php" >


                     <div class="input-group">	

                         
                         
                         <input type="text" id="from_nom" class="form-control form-control-sm"  name="from_nom" placeholder="Compte" readonly>
                         <input type="hidden" name="id" value="<?php print $id ;?>" >
                         <input type="hidden" name="from_id" id="from_id"  >
                         
                         <div class="input-group-append">

                         <?php

                             $pag=$path.'page/search_membre.php';
                             
                             print '<a class="btn btn-primary btn-sm"   href="#" onclick="fcte(`'.$pag.'`)">OK </a>';

                           ?>
                     
                     </div>
                     
             
             
               
                     </div><br>
                 

                    <div class="form-group">
                    <label class="font-weight-bold text-primary" for="textarea">Objet :</label>
                          <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Objet ..." value="<?php if (isset($_POST['titre'])) print $_POST['titre'];?>" >
                    </div>

                    <div class="form-group">
                    <label class="font-weight-bold text-primary" for="textarea" ></label>
                     <textarea name="editor1" id="content" class="form-control form-control-sm" rows="6"></textarea>

                     <script>
                      CKEDITOR.replace( 'editor1' );
                    </script>

                    </div>

                    
                    

                      
                    <div class=form-group>    

                    
                      <input type="hidden" name="MAX_FILE_SIZE" value="7000000" />  
                    
                     

                      <label class="font-weight-bold text-primary" for="textarea"> Piéce Jointe : </label> <i class='fa fa-paperclip text-primary'></i>

                      <input type="hidden" name="fichier1" value="fichier1" />
                      
                      <input name="file1" type="file" size="30" id="file1"  />

                    </div>										
                    <p><h6 class="text-danger">En cas de plusieurs fichiers, on adopte la solution du compression *.rar *.zip </h6></p>

                    <hr>
                                           
                    <div class="form-group float-right"> 
                          
                             
                    <input type="submit" name='submit' class="btn btn-primary " onclick="return clicked();" value="Envoyer"><br><br> 
                          
                      

                    </div>

                   

               </form>

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

