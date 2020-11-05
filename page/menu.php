
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
            <hr class="border-warning" width="85%">
          </li>










          <li class="nav-item">

                      <?php

                      $nos=$path."app/etablissements/";
                      
                      echo'
                          <a class="nav-link" href="'.$nos.'">';
                      ?>
      
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Nos Etablissements</span>
            </a>
          </li>

        

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#insc" aria-expanded="true" aria-controls="insc">
            
  	   <i class="mdi mdi-book-multiple menu-icon"></i>
              <span class="menu-title">Pré-Inscription</span>
              <i class="menu-arrow"></i>
            </a>
           
            <div class="collapse show mb-3" id="insc">
              <ul class="nav flex-column m-0 ">


                
                
                <li class="nav-item ml-0 "> 
                  
                <?php

                    $fpinsc=$path."app/fpinscr/";
                    $esinsc=$path."app/esinscr/";

                    echo'
                    <li class="nav-item ml-0 "><a class="nav-link ml-3 pb-0" href="'.$fpinsc.'"> <i class="mdi mdi-package-down menu-icon"></i> Formation Professionelle </a></li>';
                    echo'
                    <li class="nav-item ml-0 "><a class="nav-link ml-3 pb-0" href="'.$esinsc.'"> <i class="mdi mdi-package-up menu-icon"></i> Enseignement Secondaire </a></li>';
                ?>


                
                
              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-briefcase-download menu-icon"></i>
              <span class="menu-title">Soutien Scolaire</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse mb-3 " id="ui-basic">
            <ul class="nav flex-column m-0 ">
                    
                    
                             
            <?php

                      $escvs=$path."app/es/cvideos/index.php";
                      $escds=$path."app/es/cdocuments/index.php";

                      $fpcvs=$path."app/fp/cvideos/index.php";
                      $fpcds=$path."app/fp/cdocuments/index.php";

                      echo'
                      <li class="nav-item ml-0 "> 
                          <li class="nav-item ml-0  text-warning  "> <b> <a class="nav-link ml-3 pb-0 text-warning" href="#"><i class="mdi mdi-package-down menu-icon"></i> Formation Professionelle </a></b>
                          <ul class="nav flex-column m-0" >
                            
                          <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$fpcvs.'"> <i class="mdi mdi-video menu-icon"></i> Cours en Videos </a></li>
                            <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$fpcds.'"><i class="mdi mdi-file-pdf menu-icon"></i>Cours en PDF</a></li>
                            </ul>
                          </li>

                          <li class="nav-item ml-0  text-warning "> <b> <a class="nav-link ml-3 pb-0 text-warning" href="#"> <i class="mdi mdi-package-up menu-icon"></i>  Enseignement Secondaire  </a></b>
                          <ul class="nav flex-column m-0">
                            
                          <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$escvs.'"><i class="mdi mdi-video menu-icon"></i> Cours en Videos </a></li>
                            <li class="nav-item ml-4"> <a class="nav-link ml-3 pb-0 " href="'.$escds.'"><i class="mdi mdi-file-pdf menu-icon"></i> Cours en PDF</a></li>
                            </ul>
                          </li>
                          ';
                                

                ?>
            
            </ul></div>
          </li>


       
       
           
          <li class="nav-item mt-2">
             
              <?php

              $cont=$path."app/contact/";

              echo'   <a class="nav-link" href="'.$cont.'">';
              ?>

              <i class="mdi mdi-email menu-icon"></i>
              <span class="menu-title">Contact</span>
            </a>
            
          </li>

        </ul>
      </nav>
