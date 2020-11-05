<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
         <div class="col-lg-12 ml-1  text-light text-center"> 

<?php
$log=$path."images/logo.png";
echo '<img class="w-100" src='.$log.' alt="logo"/>';
?>         
	



          </div>
        </div>  
      </div>

	 <?php
        
          
	    	  $rech=$path.'app/recherche/index.php';
 		
  	?>
      <div class="navbar-menu-wrapper  d-flex align-items-center justify-content-end">
      


        <ul class="navbar-nav navbar-nav-right">


        <?php

                  
if (isset($_COOKIE["id_user"])) {

  $aler='alerts.php';
  include($aler);

  $mgs='messages.php';
  include($mgs);

  echo '<div class="topbar-divider d-none d-sm-block"></div> ';

  $user_info='user_info.php';
  include($user_info);
  
} else 


echo " 



<li class=' nav-item dropdown no-arrow mx-1'>
<a class='h5 bg bg-white text-primary border  ' href='".$path."app/Espace_membre/index.php'   role='button'  >

<i class='fas fa fa-user fa-fw'></i><small>Connexion</small>


</a></li>
";

?> 


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
