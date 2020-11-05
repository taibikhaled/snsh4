<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


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

          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Nos Etablissements</p>
                  <hr class="border-warning mt-1" >

                  
                  <div class="row">
                  <div  class='p-4 m-4 col-xl-5 col-lg-5 card shadow border border-primary text-left mb-4 cadre '>
<a href="institut/">
<h3 class="text-center text-primary" > <b>  معهد التكوين في التسيير  </b> </h3 > <br> <h6 class="text-center mt-1" > شارع يحي مازوني رقم 17 اﻷبيار الجزائر  </h6 ><br>

                  <h2 class="mt-3 text-center text-primary"> <b> I.F.G -ALGER</b></h2>
                          <br><h5 class='text-center' ><b>Institut de Formation en Gestion  <br><br>  17 , rue Yahia el Mazouni Val d’Hydra – Alger</b></h5></a> <br>
                  
                  </div>
              
                  <div class='p-4 m-4 col-xl-5 col-lg-5 card shadow border border-warning text-left mb-4 cadre_ees' >

                  <a href="etablissement/">
<h3 class="text-center text-warning" > <b>  مؤسسة التعليم الثانوي </b> </h3 > <br> <h6 class="text-center mt-1" > حي 350 مسكن الربوة الحمراء حسين داي  -الجزائر </h6 ><br>

                  <h2 class="text-warning text-center mt-3"> <b> E.E.S -ALGER</b></h2>
                  
                      <br><h5 class='text-center' ><b>Etablissement d’Enseignement Secondaire  <br><br> cité 350 Logts côte rouge hussein dey - Alger </b></h5></a><br>
                    </div>
              
                    <div class='p-4 m-4 col-xl-5 col-lg-5 card shadow border border-success text-left mb-4 cadre_efpg'>

<a href="Ecole01/">
<h3 class="text-center text-success" > <b>   مدرسة التكوين المهني في التسيير  - الجزائر  </b> </h3 > <br> <h6 class="text-center mt-1" > إكمالية هارون الرشيد - ساحة 1 ماي -  الجزائر           </h6 ><br>

                    <h2 class="mt-3 text-success text-center"> <b> E.F.P.G -ALGER </b></h2>
                        <br>   <h5 class='text-center' ><b>	Ecole de Formation Professionnelle en Gestion  <br> <br> CEM Haroune Rachid Place du 1er Mai – Alger </b></h5></a><br>
                      </div>

                    <div class='p-4 m-4 col-xl-5 col-lg-5 card shadow border border-info text-left mb-4 cadre_efpg_bejaia'>

<a href="bejaia/index.php">
<h3 class="text-center text-info" > <b>   مدرسة التكوين المهني في التسيير  - بجاية  </b> </h3 > <br> <h6 class="text-center mt-1" >       حي 164 مسكن سوناطرك - بجاية    </h6 ><br>

                    <h2 class="mt-3 text-info text-center"> <b> E.F.P.G -BEJAIA </b></h2>
                        <br>   <h5 class='text-center'><b>	Ecole de Formation Professionnelle en Gestion <br><br>  Cité 164 Logts Sonatrach - Bejaia </b></h5></a><br>
                      </div>
                      
                    <div class='p-4 m-4 col-xl-5 col-lg-5 card shadow border border-danger text-left mb-4 cadre_efpg_oran'>

<a href="oran/index.php">

<h3 class="text-center text-danger" > <b>   مدرسة التكوين المهني في التسيير  - وهران  </b> </h3 > <br> <h6 class="text-center mt-1" >  نهج العربي بن مهيدي - وهران        </h6 ><br>

                    <h2 class="text-danger text-center"> <b> E.F.P.G -ORAN </b></h2>
                        <br>   <h5 class='text-center' ><b>	Ecole de Formation Professionnelle en Gestion <br> <br> Avenue Larbi Ben Mhidi - Oran  </b></h5></a><br>
                      </div>
  
               </div>
                  
                
               
                  </div>
                </div>
                </div>

  
       
      
          </div>


        <div class="row">

                    
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

