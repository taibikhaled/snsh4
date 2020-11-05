<div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Evèvement</p>
                  <hr class="border-warning mt-1" >






                  <div class="row">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                   
                  <?php

                                          
                                          
                    $connect_news=$path.'Config/connect_evenement.php';
                    include($connect_news);

                    $sqll="Select * from evenement order by id desc";

                    $reqq = $con->query($sqll);
                   
                   $i=1;
                    while($row = $reqq->fetch()) {
                      
                      $lien=$path."app/evenement/index.php?id=".$row['id'];

                      if ($i==1){
                          print "<div class='carousel-inner'>
                          <div class='carousel-item active'>
                          <center><a href='".$lien."'>  <img class='d-block' src=".$path."backup/Evenement/Images/".$row['f_img']."
                              alt='First slide'></a></center>

                              <a href='".$lien."'> <h4 class='text-center text-danger'>".$row['titre']."</h4></a>
                          </div>
                          ";}
                    
                      if ($i==2){
                            print "
                            
                            <div class='carousel-item'>
                             <center> <a href='".$lien."'> <img class='d-block' src=".$path."backup/Evenement/Images/".$row['f_img']."
                                alt='Second slide' ></a></center>
                               
                                <a href='".$lien."'> <h4 class='text-center text-danger'>".$row['titre']."</h4></a> 

                            </div>
                            ";}
                            
                    
                            if ($i==3){
                              
                              print "
                              
                              <div class='carousel-item'>
                               <center> <a href='".$lien."'> <img class='d-block' src=".$path."backup/Evenement/Images/".$row['f_img']."
                                  alt='Third slide' ></a></center>
                                 
                                  <a href='".$lien."'> <h4 class='text-center text-danger'>".$row['titre']."</h4></a> 
  
                              </div>
                              ";}
                      $i++;      
                    }               


                print ' </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                </div>


                ';

                    ?>

                                                  
                   
             
              
               </div>
                  

                  </div>



             </div>
           </div>
            
