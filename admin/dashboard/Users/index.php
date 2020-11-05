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
  

  
  
 
  <?php
	 $base_ck=$path.'page/base_ck_js.php';
	 include($base_ck);
	 
	?> 

<script>


		function del(ss) {
      
      if ( confirm( "Voulez Vous Supprimer " ) ) {
    // Code à éxécuter si le l'utilisateur clique sur "OK"
      window.location = "supp.php?user='"+ss+"'";

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
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  - Users</h4>
<hr>
 
 
                 


<?php
                
                

                $connect_news=$path.'Config/connect_login.php';
                include($connect_news);

                $sql='Select * from users ';

	              $req = $con->query($sql);

  
                echo '<section class="table-responsive text-primary"><table class="table  table-hover table-list">
                <thead><th><h6 class="font-weight-bold text-primary">N° </h6></th><th><h6  class="font-weight-bold text-primary">Nom Utilisateur</h6></th><th><h6  class="font-weight-bold text-primary">Mot de Passe</h6></th><th><h6  class="font-weight-bold text-primary">Nom et Prénom</h6></th><th><h6  class="font-weight-bold text-primary">Etablissement</h6></th><th><h6  class="font-weight-bold text-success"><center>Modifier</center></h6></th><th><h6  class="font-weight-bold text-danger"><center>Supprimer</center></h6></th></thead><tbody>';
                $i=1;
                while($row = $req->fetch()) {
                
                $r=$row["user"];
             
                echo "<tr><td ><h6>".$i."</h6> </td><td ><h6>".$row['user']."</h6> </td><td><h6>".$row['password']." </h6></td><td><h6>".$row['nom']." </h6></td><td><h6>".$row['typ']." </h6></td><td><center><a href='modification.php?user=".$row["user"]."'> <h3 class='text-success'>  <i class='mdi mdi-table-edit menu-icon'></i> </h3></a></center></td><td><center><a href=javascript:del('".$r."') ><h3 class='text-danger'>  <i class='mdi mdi-delete menu-icon'></i> </h3> </a></center></td></tr>";
                $i=$i+1;
                
                }
                
                echo '</tbody>
                </table></section>';

              
               ?> 
                

             </div>
                
             <hr width="70%">

             <div class="row">

            
             <div class="col-xl-4 col-lg-4   p-2">

             <img src="images/log.png"  class="m-2">
            </div>


               <div class="col-xl-4 col-lg-4   p-2">

                 <form  method="POST" action="ins.php" >

          
                                    <div class="form-group">
                                    <label class="font-weight-bold text-primary" >Taper le Nom d'Utilisateur </label>
                                        <input type="text" class="form-control" name="login" id="login"  placeholder="Nom d'utilisateur.."  >
                                    </div>

                                    <hr>

	          				                <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Taper le Mots de Passe </label>
                                        <input type="password" class="form-control" name="pass" id="pass"  placeholder="Mot de Passe ..."  >
                                    </div>

                      
                                    <hr>

                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Retaper le Mots de Passe </label>
                                        <input type="password" class="form-control" name="pass2" id="pass2"  placeholder="Mot de Passe ..."  >
                                    </div>

                      
                      
                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Nom et Prénom</label>
                                        <input type="text" class="form-control" name="nom" id="nom"  placeholder="Nom et Prénom ..."  >
                                    </div>


                                    <div class="form-group">
                                    <label class="font-weight-bold text-primary" >Etablissement </label>
                                    <select name="typ" id="typ"  class="form-control form-control" >
                                    <option value =""></option>';
                                    <option value ="ADMIN">Administrateur</option>';
                                    <option value='IFG'>Institut de Formation en Gestion IFG</option>";
                                    <option value='EES'>Etablissement d’Enseignement Secondaire EES</option>";
                                    <option value='EFPG'>Ecole de Formation Professionnelle en Gestion EFPG 1er Mai</option>";
                                    <option value='EFPG-BEJAIA'>Ecole de Formation Professionnelle en Gestion EFPG BEJAIA</option>";
                                    <option value='EFPG-ORAN'>Ecole de Formation Professionnelle en Gestion EFPG ORAN</option>";
                                    
                                    </select>
                                    </div>

                      									     
                      <div class="form-group float-right"> 
                            
                               
                            <input type="submit" name='submit' class="btn btn-primary "  value="Ajouter">
                            <input type="reset" name='reset' class="btn btn-primary "  value="Initialiser"><br><br> 
                            
                        

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

