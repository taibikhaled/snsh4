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
                
<?php    

if(isset($_GET['user'])){


$connect_news=$path.'Config/connect_login.php';
require_once $connect_news;


  $user = $_GET['user'];


  $sql = "select * FROM users Where user='".$user."'";

  
  $req = $con->query($sql);
  $row = $req->fetch();
}	
 
 


?>




          <div class="row">

          <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body ">
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  Modification - Users</h4>
<hr>
 
 
                 
  

             <div class="row">

            
             <div class="col-xl-4 col-lg-4   p-2">

             <img src="images/log.png"  class="m-2">
            </div>


               <div class="col-xl-4 col-lg-4   p-2">

                 <form  method="POST" action="mod.php" >

          
                                    <div class="form-group">
                                    <label class="font-weight-bold text-primary" >Taper le Nom d'Utilisateur </label>
                                        <input type="text" class="form-control" name="login" id="login"  placeholder="Nom d'utilisateur.." value="<?php print $row['user'];?>"  >
                                        <input type="hidden" name="users" value="<?php echo $row['user']; ?>" />
                                    </div>

                                    <hr>

	          				                <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Taper le Mots de Passe </label>
                                        <input type="password" class="form-control" name="pass" id="pass"  placeholder="Mot de Passe ..."  value="<?php print $row['password'];?>" >
                                    </div>

                      
                                    <hr>

                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Retaper le Mots de Passe </label>
                                        <input type="password" class="form-control" name="pass2" id="pass2"  placeholder="Mot de Passe ..." value="<?php print $row['password'];?>" >
                                    </div>

                      
                      
                                    <div class="form-group">
                                        <label class="font-weight-bold text-primary" >Nom et Prénom</label>
                                        <input type="text" class="form-control" name="nom" id="nom"  placeholder="Nom et Prénom ..." value="<?php print $row['nom'];?>" >
                                    </div>


                                    <div class="form-group">
                                    <label class="font-weight-bold text-primary" >Etablissement </label>
                                    <select name="typ" id="typ"  class="form-control form-control" >
                                    <option value =""></option>';
                                    <option value ="ADMIN">Administrateur</option>';
                                    <option value='IFG'>Institut de Formation en Gestion IFG</option>";
                                    <option value='EES'>Etablissement d’Enseignement Secondaire EES</option>";
                                    <option value='EFPG'>Ecole de Formation Professionnelle en Gestion EFPG </option>";
                                    
                                    </select>
                                    </div>

                      									     
                      <div class="form-group float-right"> 
                            
                               
                            <input type="submit" name='submit' class="btn btn-primary "  value="Modification">
                            
                        

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

