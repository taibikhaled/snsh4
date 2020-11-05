<?php 
$p=explode("|",$_COOKIE["id_user"]);
$pp=$p[1];
             
$id=$pp;


                           $connect=$path.'Config/connect_login.php';
                            include($connect);

                            $sql='Select * from users_membre where id='.$id;

                            $req = $con->query($sql);

                            $row = $req->fetch(); 
                                            
                            $cat=$row["categorie"];
                            $sp=$row["formation"];

?>

      <nav class="sidebar sidebar-offcanvas shadow" id="sidebar" >
        <ul class="nav">
          <li class="nav-item text-center">
          
          
                      <?php

                      $acu=$path."index.php";
                      
                      $img=$path."images/logo3.png";
                      echo "  <a  href=".$acu."><img src='".$img."' >";
               ?>
  
              
           
            </a>
            <h6 class="mt-2 mb-2">Etablissements d'Enseignement </h6><h6> et de la Formation </h6> <h6> Syndicat National Sonatrach</h6> 
            <hr class="mb-0 border-warning" width="85%">
          </li>

          <li class="nav-item">

           
      <?php
                      $intr=$path."app/Espace_membre/dashboard/index.php";
                      echo '<a class="nav-link" href="'.$intr.'">
                      <img class="img-profile rounded-circle mr-2" src='.$image.' width="20%" height="20%">
                      
                      
                        <span class="h5 text-warning"><b>'.$nom.'</b></span></a>';
                ?>
            <hr class="mt-0 border-warning" width="75%">
            
          </li>







        

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#insc" aria-expanded="false" aria-controls="insc">
              <i class="mdi mdi-email menu-icon"></i>
              <span class="menu-title">Messages</span>
              <i class="menu-arrow"></i>
            </a>
           
            <div class="collapse mb-3" id="insc">
              <ul class="nav flex-column m-0 ">


                
                
                  
                <?php

                
                    

                    $h=$path."app/Espace_membre/dashboard/messages/";
                    $hi=$path."app/Espace_membre/dashboard/ecrire/";
                    $his=$path."app/Espace_membre/dashboard/messages_envoyes/";
                     
                    echo'
                    <li class="nav-item ml-0 ">
                    <a class="nav-link ml-3 pb-0" href="'.$h.'"> 
                    <i class="mdi mdi-email menu-icon"></i> 
                    Boite de Récéption </a>
                    </li>';
                    
                    echo'
                    <li class="nav-item ml-0 ">
                    <a class="nav-link ml-3 pb-0" href="'.$hi.'"> 
                    <i class="mdi mdi-package-down menu-icon"></i> 
                    Ecrire </a>
                    </li>';

                    echo'
                    <li class="nav-item ml-0 ">
                    <a class="nav-link ml-3 pb-0" href="'.$his.'"> 
                    <i class="mdi mdi-email menu-icon"></i> 
                    Messages Envoyés</a>
                    </li>';
                ?>


                
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
          <?php
          $al=$path."app/Espace_membre/dashboard/alertes/index.php";
          echo '<a class="nav-link" href="'.$al.'">';
          ?>   

            
            
              <i class="mdi mdi-book-multiple menu-icon"></i>
              <span class="menu-title">Alertes</span>
              
            </a>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-briefcase-download menu-icon"></i>
              <span class="menu-title">Soutien Scolaire</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse mb-3" id="ui-basic">
            <ul class="nav flex-column m-0 ">
                    
                    
                             
            <?php

                      if ($cat=='FP')
                      {
  
                        $fpcvs=$path."app/Espace_membre/dashboard/fp/cvideos/index.php?sp=".$sp;
                        $fpcds=$path."app/Espace_membre/dashboard/fp/cdocuments/index.php?sp=".$sp;
  
                        echo'
                        <li class="nav-item ml-0 "> 
                            <li class="nav-item ml-0  text-warning "> <b> <a class="nav-link ml-3 pb-0 text-warning" href="#"><i class="mdi mdi-package-down menu-icon"></i> Formation Professionelle </a></b>
                            <ul class="nav flex-column m-0" >
                              
                            <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$fpcvs.'"> <i class="mdi mdi-video menu-icon"></i> Cours en Videos </a></li>
                              <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$fpcds.'"><i class="mdi mdi-file-pdf menu-icon"></i>Cours en PDF</a></li>
                              </ul>
                            </li>
  
                            ';
                          
                      } else {

                      $escvs=$path."app/Espace_membre/dashboard/es/cvideos/index.php?sp=".$sp;
                      $escds=$path."app/Espace_membre/dashboard/es/cdocuments/index.php?sp=".$sp;


                      echo'
                      <li class="nav-item ml-0 "> 
  
                          <li class="nav-item ml-0  text-warning "> <b> <a class="nav-link ml-3 pb-0 text-warning" href="#"> <i class="mdi mdi-package-up menu-icon"></i>  Enseignement Secondaire  </a></b>
                          <ul class="nav flex-column m-0">
                            
                          <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$escvs.'"><i class="mdi mdi-video menu-icon"></i> Cours en Videos </a></li>
                            <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$escds.'"><i class="mdi mdi-file-pdf menu-icon"></i> Cours en PDF</a></li>
                            </ul>
                          </li>
                          ';
                      }       

                ?>
            
            </ul></div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-book-multiple menu-icon"></i>
              <span class="menu-title">Scolarité</span>
              <i class="menu-arrow"></i>
            </a>
           
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Examens</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login-2.html"> Note </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login-2.html"> Dépot de Recours </a></li>
              </ul>
            </div>
          </li>

       
       
           

        </ul>
      </nav>
