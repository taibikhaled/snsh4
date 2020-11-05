<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;


if (isset($_GET['id'])) {

  $id=$_GET['id'];

  
  $connect_news=$path.'Config/connect_news.php';
  include($connect_news);

  $sqll="Select * from contact where id='".$id."'";

  $reqq = $con->query($sqll);
  $rows = $reqq->fetch();
                
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

		

        <div class="col-xl-10 col-lg-10">

<div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    
      <h6 class="m-0 font-weight-bold text-warning"><?php echo $rows["nom"]; ?> </h6>
              
     </div>
            <!-- Card Body -->

    <div class="card-body text-gray-900">

    <div class="text-left">
    
     <?php


    setlocale(LC_TIME, "fr_FR", "French");
    $date1 = $rows['dat'];
    
    $date = strftime("%A %d %B %X", strtotime($date1));

    echo "<p class='text-warning'>".utf8_encode($date)."</p>";
     
    
    ?> </div>
    
    <br><br>
            
      <div class="text-center">

      <h3 class="m-0 font-weight-bold "> <?php echo $rows['nom']; ?> </h3>
      <h3 class="m-0 font-weight-bold text-warning"> <?php echo $rows['mail']; ?> </h3><br><br>
      


      </div>
        
           <p>

           <?php echo $rows['content_text']; ?>

           
           </p><br><br><br><br>  

           
           <br><br> 
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

