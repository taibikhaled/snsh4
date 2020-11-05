<div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">News</p>

                  <hr class="border-warning mt-1">
                              
                              
                <?php
                
                $connect_news=$path.'Config/connect_news.php';
                include($connect_news);

                $sql='Select * from news where active=true';

	              $req = $con->query($sql);

                $count = $req->rowCount();

                // initialisation des variables 
                
                if (!isset($_GET['debut']))  {
                    $debut=0;
                   
                    } else
                    {
                      $debut=$_GET['debut'];
                    }
                    
                 
                   if (!isset($_GET['id']))  {
                      $id=1;
                     
                      } else
                      {
                        $id=$_GET['id'];
                      }
                      
                    

                    
                    $fin=$debut+5;

                $sqll='Select * from news where active=true order by id desc LIMIT '.$debut.', 5 ;';

	              $reqq = $con->query($sqll);

               
                $acc=0;      
                echo '<div class="row"> ';
                
                while($row = $reqq->fetch()) {
                
                
                setlocale(LC_TIME, "fr_FR", "French");
                $date1 = $row['dat'];
                
                $dat = strftime(" %d %B ", strtotime($date1));
         
              
               
               $lien=$path."app/news/index.php?id=".$row['id']."&debut=0";

                $acc=$acc+1;
                
                  echo "<div class='col-lg-1 mb-0'>
                  <img src='".$path."images/barre2.png' class='m-0'> </div> 
                  <div class='col-lg-11 mb-0 p-1'>
                  
                  <a href=".$lien." > ".substr($row['titre'], 0, 80)." </a><br>
                  
                  <a href=".$lien." class='text-warning'>".$dat."</a><br>
                  <a href=".$lien." class='text-warning'>".$row['ref']."</a>
                  </div>";
                  
                
                
                }
                
                echo '</div><table>
                
                       <tr>
                            <th colspan="3" >
                            <div class="float-right">

                              <div class="btn-group mt-2">';
 
                $pos2=$debut-5;
                $lien3="index.php?id=".$id."&debut=".$pos2;
               
                if ($pos2>=0) echo ' <a class="btn btn-dark btn-sm" href="'.$lien3.'">&laquo;</a>';
               
                $i = 0;$pg=0;
                while ($i < $count) {
                    
                    $pg=$pg+1;
                    
                    
                    $intervall_debut=$debut-5;
                    $intervall_fin=$debut+20;
                    
                    if ($intervall_fin>=$count) 
                    
                    {
                      $intervall_debut=$count-30;
                      $intervall_fin=$count;

                    }

                    $lien2="index.php?id=".$id."&debut=".$i;
                    
                    if (($i>$intervall_debut) && ($i<= $intervall_fin))

                      if ($i<>$debut) {
                    
                        echo ' <a class="btn btn-dark btn-sm" href="'.$lien2.'">'.$pg.'</a> ';

                      } else

                      {
                        echo ' <a class="btn btn-outline-dark btn-sm disabled"  href="'.$lien2.'">'.$pg.'</a> ';
                      }
                    
                    $i=$i+5;
              }
                
                $pos=$debut+5;
                $lien4="index.php?id=".$id."&debut=".$pos;

                if ($pos<$count) echo ' <a class="btn btn-dark btn-sm" href="'.$lien4.'">&raquo;</a>';
                
                echo '
                              </div> 
                             </div> 
                          </th>
                       </tr>
                
                </table></div>';

              
               ?> 
                
	                  
                </div>
              </div>
            
