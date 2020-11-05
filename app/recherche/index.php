<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);



 
  
  //démarrage des sessions
  
  if(session_id() == '') {
    session_start();
    }
    
  $_SESSION['path']=$path;
  


?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <title>Etablissements de formation</title>

	<?php
	 $base_css=$path.'page/base_css.php';
	 include($base_css);
	 
		
	?>  

	
      <script language="JavaScript">
            <!--

            function fcte(fiche)
            {
            msg=window.open(fiche,'fenetre','width=550,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
            }


        

      </script> 

</head>
<body>
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <?php
	
	$top_bar=$path.'page/top_bar_search.php';
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
                
       



	  
        <!-- Begin Page Content -->
    <div class="container-fluid">
          <!-- Page Heading -->
        
	
		 
		 
	 
			<!-- Content Row -->

      <div class="row mt-4">

<!-- Historique -->
<div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="m-0 font-weight-bold text-primary">Recherche sur Site</h5>
          
        </div>
        <!-- Card Body -->
        <div class="card-body text-gray-900">
          

                 <div class="row">


                       

                           <div class="col-xl-2 col-lg-2  ">
                           </div>

 


                           <div class="col-xl-7 col-lg-7 text-center p-2">
                  
                      

                             
                                    

                                

        <form method="GET" action="index.php" class="d-none d-sm-inline-block form-inline pull-right mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group ">
              <input type="text" name="q" class="form-control form-control-lg bg-light border-1 small" placeholder="Rechercher ..." aria-label="Search" aria-describedby="basic-addon2" value="<?php if(isset($_GET['q'])) { echo htmlspecialchars($_GET['q']); } ?>">
              <div class="input-group-append">
                <button class="btn btn-primary"  type="submit">
                    Rechercher  &nbsp;
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
            <div class="row mt-4">

                        </div>
                      </div>
            
                   
        </form>
                            
                            <br>
                      
                         <?php
                         //connexion à la bdd

                        
                          
                          //récupération PROPRE des variables AVANT de les utiliser
                          $q = !empty($_GET['q']) ? trim($_GET['q']) : NULL;
                          

                          //traitement du formulaire  
                          if($q<>""){
                              
                           
                              $qq="%".$q."%";
                              //preparation de la requete   

                              $qq = mb_strtoupper($qq, 'UTF-8');

                              $connect=$path.'Config/connect_news.php';
                              require_once $connect;


                              // recherche sur les news
                              
                                $sql = 'SELECT * FROM  news WHERE (active=true) and (upper(content_text) like upper(:content)) ';
                                $datas = array(':content'=>$qq);
                                         
                                       
                                $records = $con->prepare($sql);
                                $records->execute($datas);

                                $count_news = $records->rowCount(); 
	
                              while($row = $records->fetch()) {
                                
                                

                                $conte=$row['content_text'];
                                $cont=str_replace(" ".$q." "," <mark>".$q."</mark> ",$conte);                                
                                $position = strpos($cont," <mark>".$q."</mark> ");


                                $nbr=strlen($cont);
                                
                               

                                

                                if ($nbr<=600) 
                                {
                                 if ($position>=50) $po=$position-51; else $po=0;

                                  $limit=$nbr;
                                } else
                                {
                                  $po=$position; 
                                  $limit=600;
                                }
                                
                                //if (($nbr)>=600) print $po=$position - 400; 
                                
                                
                                $lien=$path."app/news/index.php?id=".$row[0];
                                $apercu_description = substr($cont, $po,  $limit);

                                $apercu_description = "<a class='text-gray-900' href='".$lien."'>".$apercu_description."</a>";


                                //$apercu_description = $apercu_description."(...) <a href='".$lien."'>Lire la suite</a>";

                                $clique[]='';
                                $bord[]="primary";
                                $cat[]="<h5 class='text-primary text-right'>News</5>";
                                $liens[]=$lien;
                                $titre[]=$row[2];
                                $apercu[]=$apercu_description;

                                
                              }
                              


                              
                            

                              

                              // recherche sur les evenement
                              
                                $sql = 'SELECT * FROM  evenement WHERE (upper(content_text) like upper(:content)) ';
                                $datas = array(':content'=>$qq);
                                         
                                       
                                $records = $con->prepare($sql);
                                $records->execute($datas);

                                $count_eve = $records->rowCount(); 
	
                              while($row = $records->fetch()) {
                                
                                

                                $conte=$row['content_text'];
                                $cont=str_replace(" ".$q." "," <mark>".$q."</mark> ",$conte);                                
                                $position = strpos($cont," <mark>".$q."</mark> ");


                                $nbr=strlen($cont);
                                
                               

                                

                                if ($nbr<=600) 
                                {
                                 if ($position>=50) $po=$position-51; else $po=0;

                                  $limit=$nbr;
                                } else
                                {
                                  $po=$position; 
                                  $limit=600;
                                }
                                
                                //if (($nbr)>=600) print $po=$position - 400; 
                                
                                
                                $lien=$path."app/evenement/index.php?id=".$row[0];
                                $apercu_description = substr($cont, $po,  $limit);

                                $apercu_description = "<a class='text-gray-900' href='".$lien."'>".$apercu_description."</a>";


                                //$apercu_description = $apercu_description."(...) <a href='".$lien."'>Lire la suite</a>";

                                $clique[]='';
                                $bord[]="info";
                                $cat[]="<h5 class='text-info text-right'>Evenements</5>";
                                $liens[]=$lien;
                                $titre[]=$row[2];
                                $apercu[]=$apercu_description;

                                
                              }
                              


                              

                              // recherche sur les cours documents
                              
                                $sql = 'SELECT * FROM  cour_document WHERE (active=true) and (upper(lib_doc) like upper(:content)) ';
                                $datas = array(':content'=>$qq);
                                         
                                       
                                $records = $con->prepare($sql);
                                $records->execute($datas);

                                $count_doc = $records->rowCount(); 
	
                              while($row = $records->fetch()) {
                                
                                

                                $conte=$row['lib_doc'];
                                $cont=str_replace(" ".$q." "," <mark>".$q."</mark> ",$conte);                                
                                $position = strpos($cont," <mark>".$q."</mark> ");


                                $nbr=strlen($cont);
                                
                               

                                

                                if ($nbr<=600) 
                                {
                                 if ($position>=50) $po=$position-51; else $po=0;

                                  $limit=$nbr;
                                } else
                                {
                                  $po=$position; 
                                  $limit=600;
                                }
                                
                                //if (($nbr)>=600) print $po=$position - 400; 
                                
                                $lib_matiere="";  
  
                                if ($row["etablissement"]=="IFG"){
                              
                              
                                $sql_mat="Select * from matiere_institut  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                              
                                $req_mat = $con->query($sql_mat);
                              
                                $ro_mat = $req_mat->fetch();
                                $lib_matiere=$ro_mat["DESIGNATION"];
                                }
                                
                                if ($row["etablissement"]=="EES"){
                              
                              
                                  $sql_mat="Select * from matiere_etablissement  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                                
                                  $req_mat = $con->query($sql_mat);
                                
                                  $ro_mat = $req_mat->fetch();
                                  $lib_matiere=$ro_mat["DESIGNATION"];
                                  }
                                
                                  if ($row["etablissement"]=="EFPG"){
                              
                              
                                    $sql_mat="Select * from matiere_ecole  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                                  
                                    $req_mat = $con->query($sql_mat);
                                  
                                    $ro_mat = $req_mat->fetch();
                                    $lib_matiere=$ro_mat["DESIGNATION"];
                                    }
                                    
            
                                    if ($row["etablissement"]=="EFPG-BEJAIA"){
            
            
                                      $sql_mat="Select * from matiere_bejaia  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                                    
                                      $req_mat = $con->query($sql_mat);
                                    
                                      $ro_mat = $req_mat->fetch();
                                      $lib_matiere=$ro_mat["DESIGNATION"];
                                      }
                              
                                  if ($row["etablissement"]=="EFPG-ORAN"){
                              
                              
                                        $sql_mat="Select * from matiere_oran  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                                      
                                        $req_mat = $con->query($sql_mat);
                                      
                                        $ro_mat = $req_mat->fetch();
                                        $lib_matiere=$ro_mat["DESIGNATION"];
                                        }
                                                      
                                        $dat = strftime(" %d %B ", strtotime($row['dat']));
                                            
                                
                                $lien=$path."page/download_document.php?file=".$row[0];
                                $apercu_description = substr($cont, $po,  $limit);

                                $apercu_description = "<a class='text-gray-900' href='".$lien."'>".$apercu_description."</a>";


                                //$apercu_description = $apercu_description."(...) <a href='".$lien."'>Lire la suite</a>";

                                $clique[]='';
                                $bord[]="danger";
                                $cat[]="<h5 class='text-success text-right'>Cours Documents</5>";
                                $liens[]=$lien;
                                $titre[]=$row[2];
                                $apercu[]="<div class='row'><div class='col-lg-2'><img class='mb-2 ml-4' src='".$path."images/pdf.png' width='60%'></div><div><br><h5>".$lib_matiere."</h5><h6>".$row['cldem']."</h6><h6>L'Enseignant : ".$row['nom_ens']."</h6></div></div>";

                                
                              }
                              
                           

                              // recherche sur les cours video
                              
                                $sql = 'SELECT * FROM  cour_video WHERE (active=true) and (upper(lib_doc) like upper(:content)) ';
                                $datas = array(':content'=>$qq);
                                         
                                       
                                $records = $con->prepare($sql);
                                $records->execute($datas);

                                $count_video = $records->rowCount(); 
	
                              while($row = $records->fetch()) {
                                
                                

                                $conte=$row['lib_doc'];
                                $cont=str_replace(" ".$q." "," <mark>".$q."</mark> ",$conte);                                
                                $position = strpos($cont," <mark>".$q."</mark> ");


                                $nbr=strlen($cont);
                                
                               

                                

                                if ($nbr<=600) 
                                {
                                 if ($position>=50) $po=$position-51; else $po=0;

                                  $limit=$nbr;
                                } else
                                {
                                  $po=$position; 
                                  $limit=600;
                                }
                                
                                //if (($nbr)>=600) print $po=$position - 400; 
                                

                                
                    $lib_matiere="";  
  
                    if ($row["etablissement"]=="IFG"){
                  
                  
                    $sql_mat="Select * from matiere_institut  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                  
                    $req_mat = $con->query($sql_mat);
                  
                    $ro_mat = $req_mat->fetch();
                    $lib_matiere=$ro_mat["DESIGNATION"];
                    }
                    
                    if ($row["etablissement"]=="EES"){
                  
                  
                      $sql_mat="Select * from matiere_etablissement  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                    
                      $req_mat = $con->query($sql_mat);
                    
                      $ro_mat = $req_mat->fetch();
                      $lib_matiere=$ro_mat["DESIGNATION"];
                      }
                    
                      if ($row["etablissement"]=="EFPG"){
                  
                  
                        $sql_mat="Select * from matiere_ecole  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                      
                        $req_mat = $con->query($sql_mat);
                      
                        $ro_mat = $req_mat->fetch();
                        $lib_matiere=$ro_mat["DESIGNATION"];
                        }
                        

                        if ($row["etablissement"]=="EFPG-BEJAIA"){


                          $sql_mat="Select * from matiere_bejaia  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                        
                          $req_mat = $con->query($sql_mat);
                        
                          $ro_mat = $req_mat->fetch();
                          $lib_matiere=$ro_mat["DESIGNATION"];
                          }
                  
                      if ($row["etablissement"]=="EFPG-ORAN"){
                  
                  
                            $sql_mat="Select * from matiere_oran  where (CODMAT = '".$row['codmat']."') and (CLDEM = '".$row['cldem']."')";
                          
                            $req_mat = $con->query($sql_mat);
                          
                            $ro_mat = $req_mat->fetch();
                            $lib_matiere=$ro_mat["DESIGNATION"];
                            }
                                          
                            $dat = strftime(" %d %B ", strtotime($row['dat']));
                              
              
                                
                                $lien=$path."page/download_video.php?file=".$row[0];

                                $apercu_description = substr($cont, $po,  $limit);

                                $apercu_description = "<a class='text-gray-900' href='".$lien."'>".$apercu_description."</a>";


                                //$apercu_description = $apercu_description."(...) <a href='".$lien."'>Lire la suite</a>";

                                $clique[]='';
                                $bord[]="danger";
                                $cat[]="<h5 class='text-danger text-right'>Cours Video</5>";
                                $liens[]=$lien;
                                $titre[]=$row[2];
                                $apercu[]="<div class='row'><div class='col-lg-2'><img class='mb-2 ml-4' src='".$path."images/video.png' width='60%'></div><div><br><h5>".$lib_matiere."</h5><h6>".$row['cldem']."</h6><h6>L'Enseignant : ".$row['nom_ens']."</h6></div></div>";  

                                
                              }
                              
                           





				//cour_document

                            $count=0;
 		                  	    $count=$count+$count_news;
			                      $count=$count+$count_eve;
                            $count=$count+$count_doc;
                            $count=$count+$count_video;
                           

                              print "<div class='col-xl-10 col-lg-10 text-primary text-center'><h6>le Resultat de la Recherche : ".$count."</h6></div>";
                           
                              

                              if (!isset($_GET['debut']))  {
                                $debut=0;
                              
                                } else
                                {
                                  $debut=$_GET['debut'];
                                }
                                
                                $fin=$debut+5;

                                if ($fin>$count) {
                                  $fins=$count;
                                } else $fins=$fin;



                              //afficher le resultat
                              
                              for ($i = $debut; $i < $fins; $i++) {
                                print "<div class='col-xl-11 col-lg-11 card shadow border border-left-".$bord[$i]." text-left m-4 p-3'>".$cat[$i]."<br><h4><a href='".$liens[$i]."' $clique[$i] >".$titre[$i]."</h4><br>".$apercu[$i]."</a></div>";
                              }


                              //afficher la pagination

                              if ($count>5) {

           
                                          echo '
                                          <div class="col-xl-12 col-lg-12 text-center ">

                                          <div class="btn-group">';
            
                            $pos2=$debut-5;
                            $lien3="index.php?q=".$q."&debut=".$pos2;
                          
                            if ($pos2>=0) echo ' <a class="btn btn-primary" href="'.$lien3.'">&laquo;</a>';
                          
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

                                $lien2="index.php?q=".$q."&debut=".$i;
                                
                                if (($i>$intervall_debut) && ($i<= $intervall_fin))

                                  if ($i<>$debut) {
                                
                                    echo ' <a class="btn btn-primary" href="'.$lien2.'">'.$pg.'</a> ';

                                  } else

                                  {
            //                        if (($i>=$debut)&&($debut>=0))
                                    echo ' <a class="btn btn-outline-primary disabled"  href="'.$lien2.'">'.$pg.'</a> ';
                                  }
                                
                                $i=$i+5;
                          }
                            
                            $pos=$debut+5;
                            $lien4="index.php?q=".$q."&debut=".$pos;

                            if ($pos<$count) echo ' <a class="btn btn-primary" href="'.$lien4.'">&raquo;</a>';
                              }    
                            echo '
                                          </div> 
                                        </div> ';
                                      
                                      } else 

                                      print "<div class='col-xl-11 col-lg-11 text-primary text-center'><h6>Aucun Resultat de la Recherche  </h6></div><br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>";
                                    
                        
                        ?>
   <br>
                <br>
                            
                            <br>
                            <br>
                            <br> <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>


                            
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

