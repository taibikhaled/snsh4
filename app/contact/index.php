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

<script type="text/javascript">


      function valideForm(){

         if(!isEmailValid(jQuery("#mail").val()))
         {
           jQuery('#mmail').show();
           return false;
           } else { 
             jQuery('#mmail').hide();
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
                  <h4 class="card-title  "> Contact</h4>
<hr>
 
 
                 


</div>



<div class="row p-2">


     
<div class="col-xl-4 col-lg-4 "></div>
<div class="col-xl-4 col-lg-4 shadow p-4 ">
<?php if (isset($_GET['msg'])) print "<p class='text-danger'>Votre Message à été Envoyer</p>";?>

<form enctype="multipart/form-data" method="POST" action="ins.php" onsubmit="return valideForm();">

     

     <div class="form-group">
     <label class="font-weight-bold text-gray-100" for="textarea">Nom :</label>
           <input type="text" class="form-control form-control-sm" name="titre" id="titre"  placeholder="Nom ..." value="<?php if (isset($_POST['titre'])) print $_POST['titre'];?>" >
     </div>

     <div class="form-group">
        <label class="font-weight-bold text-gray-100 h6" for="textarea">E-Mail :</label>
        <input type="text" class="form-control form-control-sm" name="mail" id="mail"  placeholder="E-mail..." value="<?php if (isset($_GET['mail'])) print $_GET['mail'];?>" onblur="testForm('mail')" >
        <label id="mmail">&nbsp; Erreur de Formalisation !</label>

     </div>
     <div class="form-group ">
     <label class="font-weight-bold text-gray-100" for="textarea" >Votre Message :</label>
     <textarea name="editor1" id="content" class="form-control border border-1 border-warning" rows="6"></textarea>
  
     </div>

     
     
     <div class="form-group  "> 
                  <label class="text-gray-100 h6" for="textarea">Veuillez Entrée Code :</label>
                  <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
                  <input type="text" name="captcha" class="form-control form-control-sm col-xl-6 col-lg-6" />
                  <?php if (isset($_GET['tcpa'])) print "<p class='text-danger'>Erreur Code, cliquer sur l'image pour charger un autre code</p>";?>
                  
    </div>
       
     <hr>
                            
     <div class="form-group float-right"> 
           
              
           <input type="submit" name='submit' class="btn btn-outline-dark btn-sm "  value="Envoyer" >
           <br><br> <br>
           
       

     </div>

    

</form>

</div><div class="col-xl-4 col-lg-4 "></div>
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

