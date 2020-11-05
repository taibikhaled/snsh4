<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	include($connect_news);

	
	$idd = $_POST['id'];

	//récupération PROPRE des variables AVANT de les utiliser
	
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$cat ='EES';
	$spe = !empty($_POST['spe']) ? trim($_POST['spe']) : NULL;
	$matiere = !empty($_POST['matiere']) ? trim($_POST['matiere']) : NULL;
	$nom = !empty($_POST['nom']) ? trim($_POST['nom']) : NULL;
	
	  //preparation de la requete

	 
	
	  $dat=date("Y-m-d H:i:s");   
	
	  
  
  
	 
	
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

	if ($test_pj ==true) $f_pj=$nomDestination_f_pj; else $f_pj='';

	  $sql = "UPDATE cour_document SET  lib_doc=:titre, lien=:f_pj, etablissement=:cat,  cldem=:spe, codmat=:matiere, nom_ens=:nom WHERE id='".$idd."'";
	  $datas = array( ':titre'=>$titre,':f_pj'=>$f_pj,':cat'=>$cat, ':spe'=>$spe, ':matiere'=>$matiere, ':nom'=>$nom);
	  
	  //$sql = "UPDATE news SET ref='".$ref."' , titre='".$titre."', content='".$content."', dat='".$dat."', f_img='".$f_img."', f_pj='".$f_pj."' WHERE id='".$idd."'";
	  
	 // execution de la requete
	  $records = $con->prepare($sql);
	  $records->execute($datas);


	  //$records->query($sql) or die ('probleme sql execute');
  
		
  
//	print $sql;
  
	}	
	 
	 


  
header("Location: index.php"); 

?>