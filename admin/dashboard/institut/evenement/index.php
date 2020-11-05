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
  

  
  
 
  <?php
	 $base_ck=$path.'page/base_ck_js.php';
	 include($base_ck);
	 
	?> 

<script>


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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Evenements</h4>
<hr>
 
 
                 



<?php



$connect_news=$path.'Config/connect_evenement.php';
include($connect_news);

$sql='Select * from evenement ';

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

$sqll='Select * from evenement order by id desc LIMIT '.$debut.', 5 ;';

$reqq = $con->query($sqll);



echo '<div class="table-responsive "><table  class="table table-sm   table-hover table-list">
<thead><th><h6 class="font-weight-bold text-gray-100">Date</h6></th><th><h6  class="font-weight-bold text-gray-100">Réf</h6></th><th><h6  class="font-weight-bold text-gray-100">Désignation</h6></th><th><h6  class="font-weight-bold text-success"><center>Modifier</center></h6></th><th><h6  class="font-weight-bold text-danger"><center>Supprimer</center></h6></th></thead>
<tbody> ';

$acc=0;
while($row = $reqq->fetch()) {


$aujourdhui = getdate();
$mois = $aujourdhui['mon'];
$mjour = $aujourdhui['mday'];
$annee = $aujourdhui['year'];

$dat=$mjour.'/'.$mois; 

$ddat = strtotime($row['dat']);
$dat=date('d/m', $ddat);

$lien=$path."app/news/index.php?id=".$row['id']."&debut=0";

$acc=$acc+1;
if (($acc>2)||($fin>5)) {
echo "<tr><td ><h6><a href=".$lien.">".$dat."</a></h6> </td><td><h6><a href=".$lien."> ".$row['ref']." </a></h6></td><td><h6><a href=".$lien.">" .$row['titre']."</a></h6></td><td><center><a href='modification.php?id=".$row["id"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3> </a></center></td><td><center><a href='javascript:del(".$row['id'].")' ><h3 class='text-danger'>  <i class='mdi mdi-delete  menu-icon'></i> </h3> </a></center></td></tr>";
} else {
echo "<tr><td ><h6><a href=".$lien." class='text-danger'>".$dat."</a></h6> </td><td><h6><a href=".$lien." class='text-danger'> ".$row['ref']." </a></h6></td><td><h6><a href=".$lien." class='text-danger'>" .$row['titre']."</a></h6></td><td><center><a href='modification.php?id=".$row["id"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3></a></center></td><td><center><a href='javascript:del(".$row['id'].")' ><h3 class='text-danger'>  <i class='mdi mdi-delete menu-icon'></i> </h3> </a></center></td></tr>";
}

}

echo '</tbody>
<tfoot>
           <th colspan="5" >
           <div class="float-right">

             <div class="btn-group">';

$pos2=$debut-5;
$lien3="index.php?id=".$id."&debut=".$pos2;

if ($pos2>=0) echo ' <a class="btn btn-dark" href="'.$lien3.'">&laquo;</a>';

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
     
<form enctype="multipart/form-data" method="POST" action="ins.php" >

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Référence :</label>
           <input type="text" class="form-control form-control-sm" name="ref" id="ref"  placeholder="Référence.." value="<?php if (isset($_POST['ref'])) print $_POST['ref'];?>" >
     </div>

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Titre :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Titre ..." value="<?php if (isset($_POST['titre'])) print $_POST['titre'];?>" >
     </div>

     <div class="form-group ">
     <label class="font-weight-bold text-gray-100" for="textarea" >Votre Texte :</label>
      <div class="border border-1 border-warning">
      <textarea name="editor1" id="content" class="form-control border border-1 border-warning" rows="6"></textarea>
      <script>
       CKEDITOR.replace( 'editor1' );
     </script>
      </div>

     </div>

     
     

       
     <div class=form-group>    

     
       <input type="hidden" name="MAX_FILE_SIZE" value="7000000" />  
     
       <label class="font-weight-bold text-gray-100" for="textarea"> Image du Centre : </label>

       <input type="hidden" name="fichier2" value="fichier2" />
       
       <input name="file2" type="file" size="30" id="file2"  accept="image/*" >
       


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

