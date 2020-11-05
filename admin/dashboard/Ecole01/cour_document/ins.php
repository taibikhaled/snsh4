<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	$sqll='Select * from cour_document order by id desc ;';
	$reqq = $con->query($sqll);

	$id = $reqq->fetch();
	$idd=$id[0]+1;



	
	if (isset($_FILES['file1'])) 
		{
					$nomOrigine = $_FILES['file1']['name'];
					$test_pj=false;
					if ($nomOrigine!="")
						
						{
							$elementsChemin = pathinfo($nomOrigine);
							$extensionFichier = strtoupper($elementsChemin['extension']);
	
							$extensionsAutorisees =array("JPEG", "JPG", "GIF", "PDF", "PNG", "DOC", "XLS", "DOCX", "XLSX","PPT" ,"PPTX","RAR", "ZIP");
							
							if (!(in_array($extensionFichier, $extensionsAutorisees))) 
							{
							 		  header("Location: index.php?erreur=2");
										} else {    
							// Copie dans le repertoire du script avec un nom
	
												$repertoireDestination = $path."backup/cours_document/";
												$nomDestination_f_pj = "PJ".$idd.".".$extensionFichier;
	
												if (move_uploaded_file($_FILES["file1"]["tmp_name"], $repertoireDestination.$nomDestination_f_pj)) 
										 
												$test_pj=true;	
			
												}
						}
		
	
		}


	//récupération PROPRE des variables AVANT de les utiliser
	$ref = !empty($_POST['ref']) ? trim($_POST['ref']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$cat ='EFPG';
	$spe = !empty($_POST['spe']) ? trim($_POST['spe']) : NULL;
	$matiere = !empty($_POST['matiere']) ? trim($_POST['matiere']) : NULL;
	$nom = !empty($_POST['nom']) ? trim($_POST['nom']) : NULL;
	
	  //preparation de la requete

	 
	
	  $dat=date("Y-m-d H:i:s");   
	
	  
  
	if ($test_pj ==true) $f_pj=$nomDestination_f_pj; else $f_pj='';

	  	$sql = 'INSERT INTO cour_document ( dat , lib_doc, lien,  etablissement, cldem, codmat, nom_ens )  VALUES (:dat,  :titre, :f_pj ,:cat, :spe, :matiere, :nom) ';
	  	$datas = array(':dat'=>$dat,  ':titre'=>$titre,':f_pj'=>$f_pj,':cat'=>$cat,':spe'=>$spe, ':matiere'=>$matiere, ':nom'=>$nom );
		  
//		  print $sql ."<br>";	  
//		  print_r($datas);	  
	    //execution de la requete
		
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>