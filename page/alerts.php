<li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="alertsDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="ml-2 font-weight-bold count text-white"> 
                
                <div id="compteur_alerte">
                  
                  <?php
                
                      include("load-compteur_alerte.php");

                  ?>
                
                </div>
              </span>

            </a>            
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="alertsDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Alerts</p>
                <div class="mt-2">
        
              <div id="resultat_alerte"></div>

              </div>
                
            <?php 
            
       
            $p=explode("|",$_COOKIE["id_user"]);
            $pp=$p[1];
                  
            $id=$pp;

            $lien=$_SESSION['path']."app/Espace_membre/dashboard/alertes/index.php?id=".$id; 
              
              print '<a class="dropdown-item text-center small text-gray-500" href="'.$lien.'">Lire les Autres Alertes</a>';
              
              ?>
              </div>   </li>
       