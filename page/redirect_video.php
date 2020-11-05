<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


$_SESSION['path'] = $path;

$file=$_GET['file'];
  
  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}
  
  //connexion à la bdd

  $connect_login=$path.'Config/connect_login.php';
  require_once $connect_login;
  
  //récupération PROPRE des variables AVANT de les utiliser
  $login = !empty($_GET['login']) ? trim($_GET['login']) : NULL;
	$pass = !empty($_GET['pass']) ? trim($_GET['pass']) : NULL;

  $errMsg = array();
  
  
//  error_reporting(0); 
  
   
  //traitement du formulaire  
	if(isset($_GET['submit'])){
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
              $sql = 'SELECT * FROM  users_membre WHERE (`user` = :login) and (`password` =:pass) ';
              $datas = array(':login'=>$login, ':pass'=>$pass );
              
              //execution de la requete
              try{
                $records = $con->prepare($sql);
                $records->execute($datas);
              }catch(Exception $e){
                echo "<p>Erreur : " . $e->getMessage() . "</p>";
                exit();
              }
              
              //$results = $records->fetchAll(PDO::FETCH_ASSOC);

              
              $results = $records->fetch();
              
              $count = $records->rowCount();
              
              if($count >0 ){

                
                $_SESSION['login'] = $results['user'];

                
                $coc=sha1($results['id']);
                $coc=$coc."|";
                $coc=$coc.$results['id'];
                setcookie("id_user", $coc , time() + 3600 * 24 * 7 , '/' , '', false , true);

                $_SESSION['id'] = $results['id'];

                $files=$_GET['file'];

		$lien=$path."app/cvideo/index.php?id=".$files;
		header('location:'.$lien);

             //  header('location:'.$path.'index.php');
                exit();
                
              }



                      
                  } else {
                      $errMsg[] = "Échec d'identification, revoire le nom d'utilisateur ou mot de passe ";
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
                 


                       

<div class="col-xl-4 col-lg-4  ">
</div>




<div class="col-xl-5 col-lg-5 border text-center p-2">

<h3 class="text-danger"><b> دخول خاص بالاعضاء </h3><h4 class="text-danger">  Accés resérvé aux membres  </b> </h4>

<?php
   if(!empty($errMsg)){
       echo '<h5 class="m-0  text-danger">';
       foreach($errMsg as $err) {
           echo $err;
       }
   echo '</h5>';
 }
?> 

  
         <img src="../images/log.png"  class="m-2" width="60%" height="50%">


     


     <form  method="GET" action="redirect_video.php" >

          <div class="form-group">
             <input type="text" class="form-control form-control-sm" name="login" id="login"  placeholder="Nom d'utilisateur.." value="<?php if (isset($_GET['login'])) print $_GET['login'];?>" >

  <input type="hidden" name="file" value="<?php echo $file;?>"  />

         </div>



         <div class="form-group">
             <input type="password" class="form-control form-control-sm" name="pass" id="pass"  placeholder="Mot de Passe ..." value="<?php if (isset($_GET['pass'])) print $_GET['pass'];?>" >
         </div>

         <hr>

               <input type="submit" name='submit' class="btn btn-sm btn-outline-dark btn-user btn-block"  value="Connexion">


       </form>
 
 <br>

 </div>


 </div>

 


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

