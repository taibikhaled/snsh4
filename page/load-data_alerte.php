<?php
    $fp = fopen ("path.php", "r");
    $path = fgets ($fp, 255);
    fclose ($fp);
    
    //$fp2 = fopen ("../path.php", "r");
    //$path2 = fgets ($fp2, 255);
    //fclose ($fp2);

    if(session_id() == '') {
      session_start();
      }

        
      $p=explode("|",$_COOKIE["id_user"]);
      $pp=$p[1];
             
      $id=$pp;
  
    //$_SESSION['path']=$path2;
    
    
      $connect_news=$path.'Config/connect_login.php';
      include($connect_news);

     
    
    



    $sqll='Select * from alerte where from_id='.$id.' order by id_msg desc LIMIT  2 ;';

    $reqq = $con->query($sqll);


    
    while($row = $reqq->fetch()) {



    
    $date1 = $row['dat'];

    $dat = strftime(" %d %B %H:%M", strtotime($date1));

    

    $lien=$_SESSION['path']."app/Espace_membre/dashboard/alertes/detaille_alerte/index.php?id=".$row['from_id']."&id_msg=".$row['id_msg'];

    // image 
    $sql='Select * from users_membre where id='.$row['id'];

    $req = $con->query($sql);

    $ro = $req->fetch(); 
         
    $img=$ro["img"];
    
    //$image=$_SESSION['path']."images/".$img;
       $image=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
       $image2=$_SESSION['path'].'backup/Espace_membre/Photos/'.$img;
     //$image2=$_SESSION['path'].'images/'.$matricule.'.jpg';
     //print $image;
       

  
     if ($row["vue"]=="true"){
      echo '<div class="">
      <a class="dropdown-item " href="'.$lien.'">
      
        <img class="rounded-circle" src="'.$image.'" alt="" width="25%">
      
      
      <div>
      <div class="text-truncate ml-2">'.$row['objet'].'</div>
        <div class="small text-gray-500  ml-2">'.$row['nom'].'</div>
      </div>
    </a></div>';
  
      } else {
  
        echo '<div class="bg bg-gray">
      <a class="dropdown-item " href="'.$lien.'">
      
        <img class="rounded-circle" src="'.$image.'" alt="" width="25%">
      
      
      <div>
      <div class="text-truncate font-weight-bold  ml-2">'.$row['objet'].'</div>
        <div class="small text-gray-500 font-weight-bold  ml-2">'.$row['nom'].'</div>
      </div>
    </a></div>';
      }
  }
   
 ?>