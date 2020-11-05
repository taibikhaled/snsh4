<?php 
              
              $au=$path."page/deconnexion.php"; 

              $dash=$_SESSION['path']."app/Espace_membre/dashboard/index.php?id=".sha1($id); 
              
              $para='#';//$_SESSION['path']."app/Espace_membre/dashboard/parametres/index.php?id=".sha1($id); 

              $connect_news=$path.'Config/connect_login.php';
              include($connect_news);

              $p=explode("|",$_COOKIE["id_user"]);
              $pp=$p[1];
                    
              $id=$pp;
              
              $sql='Select * from users_membre where id='.$id;

              $req = $con->query($sql);

              $row = $req->fetch(); 
                              
              $nom=$row["nom"];
              $matricule=$row["matricule"];

              $dat=$row["dat_nais"];

  //            $fonc=$row["fonction"];
//              $struc=$row["structure"];

               
              $img=$row["img"];
    
              //$image=$_SESSION['path']."images/".$img;
              $image=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
              $image2=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
              //$image2=$_SESSION['path'].'images/'.$matricule.'.jpg';
              //print $image;
              
              ?>

   <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <?php
            
              echo '<img class="img-profile rounded-circle" src="'.$image.'">

              <span class="nav-profile-name text-white">'.$nom.'</span>';
              ?>

            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="<?php print $dash; ?>">
                <i class="mdi mdi-account text-primary"></i>
                Espace Etudiant
              </a>

              <a class="dropdown-item" href="<?php print $para; ?>">
                <i class="mdi mdi-settings text-primary"></i>
                Paramètres
              </a>

              <a class="dropdown-item" href="<?php print $au; ?>">
                <i class="mdi mdi-logout text-primary"></i>
                Déconnexion
              </a>
            </div>
          </li>



