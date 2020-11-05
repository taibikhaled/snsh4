<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);



  //Affichage des erreurs php
  //error_reporting(E_ALL);
 // ini_set('display-errors','on');
  
  //démarrage des sessions
  
if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;

  
  //connexion à la bdd

  $connect_login=$path.'Config/connect_login.php';
  require_once $connect_login;
  
  //récupération PROPRE des variables AVANT de les utiliser
  $login = !empty($_POST['login']) ? trim($_POST['login']) : NULL;
	$pass = !empty($_POST['pass']) ? trim($_POST['pass']) : NULL;

  $errMsg = array();
  
  //traitement du formulaire  
	if(isset($_POST['submit'])){
		//$errMsg = '';
		//login and password sent from Form
		if(!$login){
			$errMsg[] = 'Veuillez entrer votre nom<br>';	
    }
	
		if(!$pass){
			$errMsg[] = 'Veuillez entrer votre mot de passe<br>';
    }
    
		if(empty($errMsg)){
      
      //preparation de la requete
      $sql = 'SELECT * FROM  users WHERE user = :login AND password = :pass';
      $datas = array(':login'=>$login , ':pass'=>$pass);
      
      //execution de la requete
      try{
			  $records = $con->prepare($sql);
			  $records->execute($datas);
      }catch(Exception $e){
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
        exit();
      }

      $results = $records->fetch();

      $count = $records->rowCount();

			if($count > 0 ){
	  			//$_SESSION['login'] = $results['login'];
        
              if ($results['typ']=='ADMIN')
              {
              header('location:dashboard/index.php');
              exit();
              }

              if ($results['typ']=='IFG')
              {
              header('location:dashboard/institut/index.php');
              exit();
              }

              if ($results['typ']=='EES')
              {
              header('location:dashboard/Etablissement/index.php');
              exit();
              }

              if ($results['typ']=='EFPG')
              {
              header('location:dashboard/Ecole01/index.php');
              exit();
              }

              if ($results['typ']=='EFPG-BEJAIA')
              {
              header('location:dashboard/bejaia/index.php');
              exit();
              }

              if ($results['typ']=='EFPG-ORAN')
              {
              header('location:dashboard/oran/index.php');
              exit();
              }


			}else{
				$errMsg[] = 'Vérifiez vos identifiants de connexion<br>';
			}
		}
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
                  <h4 class="card-title  ">Identification</h4>
<hr>
 
 
 <div class="row ">
                 


                       
<br><br><br>
<div class="col-xl-3 col-lg-3  ">
</div>




<div class="col-xl-5 col-lg-5 border text-center p-2">
<br><br><br><br>
<?php
   if(!empty($errMsg)){
       echo '<h5 class="m-0  text-danger">';
       foreach($errMsg as $err) {
           echo $err;
       }
   echo '</h5>';
 }
?> 

<div class="row">
<div class="col-xl-4 col-lg-4">

         <img src="images/log.png"  class="m-2 w-100" >
</div>
    

     

       <div class="col-xl-8 col-lg-8">


     <form  method="POST" action="index.php" >

          <div class="form-group">
             <input type="text" class="form-control form-control-sm" name="login" id="login"  placeholder="Nom d'utilisateur.." value="<?php if (isset($_POST['login'])) print $_POST['login'];?>" >
         </div>

         <div class="form-group">
             <input type="password" class="form-control form-control-sm" name="pass" id="pass"  placeholder="Mot de Passe ..." value="<?php if (isset($_POST['pass'])) print $_POST['pass'];?>" >
         </div>

         <hr>

               <input type="submit" name='submit' class="btn btn-sm btn-outline-dark btn-user btn-block"  value="Connexion">


       </form>
       </div>
       

 </div>


 </div>


 </div>


 </div>
 <br><br><br><br><br><br><br><br><br><br>  </div>
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

