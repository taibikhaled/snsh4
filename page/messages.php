<li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="ml-3 font-weight-bold count text-white">
                
                <div id="compteur">
                
                    <?php
                  
                        include("load-compteur.php");

                    ?>
                  
                </div>
            </span>
          
          </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <div class="mt-2">
        
                  <div id="resultat"></div>
      
              </div>
                 
            <?php 
             
             $p=explode("|",$_COOKIE["id_user"]);
             $pp=$p[1];
                   
             $id=$pp;
             $lien=$_SESSION['path']."app/Espace_membre/dashboard/messages/index.php?id=".$id; 
              
              print '<a class="dropdown-item text-center small text-gray-500" href="'.$lien.'">Lire les Autres Messages</a>';
              
              ?>
              </div>
            </li>
            
            
    
 

