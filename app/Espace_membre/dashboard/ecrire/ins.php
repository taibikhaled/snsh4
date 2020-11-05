<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	



if(isset($_POST['submit'])){


	$connect=$path.'Config/connect_login.php';
	require_once $connect;

	$id = !empty($_POST['id']) ? trim($_POST['id']) : NULL;
	$from_id = !empty($_POST['from_id']) ? trim($_POST['from_id']) : NULL;
	$from_nom = !empty($_POST['from_nom']) ? trim($_POST['from_nom']) : NULL;
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$content = !empty($_POST['editor1']) ? trim($_POST['editor1']) : NULL;
	
	
	

	$connect_news=$path.'Config/connect_login.php';
	include($connect_news);

	$sql='Select * from users_membre where id='.$id;

	$req = $con->query($sql);

	$row = $req->fetch(); 
					
	$nom=$row["nom"];
	

	$sqll='Select id_msg from message order by id_msg desc ;';
	$reqq = $con->query($sqll);

	$id_msq = $reqq->fetch();
	$idd_msq=$id_msq[0]+1;


	


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
	
												$repertoireDestination = $path."backup/Espace_membre/Messages/Pieces/";
												$nomDestination_f_pj = "PJ".$idd_msq.".".$extensionFichier;
	
												if (move_uploaded_file($_FILES["file1"]["tmp_name"], $repertoireDestination.$nomDestination_f_pj)) 
										 
												$test_pj=true;	
			
												}
						}
		
	
		}



	//récupération PROPRE des variables AVANT de les utiliser
	

	//$content_te=str_replace("&#39;","'",$content);
	//$content_tex = strip_tags($content_te);
	//$content_text = html_entity_decode($content_tex);



	
	if ($test_pj ==true) $f_pj=$nomDestination_f_pj; else $f_pj='';

	
	
	setlocale(LC_TIME, "fr_FR", "French");

	$dt = new DateTime();
	//echo $dt->format('Y-m-d H:i:s');

	$dat=$dt->format('Y-m-d H:i:s'); 

	
	//preparation de la requete message

	$vue="false";
	$active="true"; 
  
	$sql = 'INSERT INTO `message` (`id_msg`, `id`, `nom`, `from_id`, `from_nom`, `objet`, `dat`, `body`, `active`, `vue`, `f_pj` ) VALUES 
									 (:ref, :id, :nom, :from_id, :from_nom, :titre, :dat, :content, :active, :vue, :f_pj) ';
									 
	$datas = array(':ref'=>null,':id'=>$id , ':nom'=>$nom ,':from_id'=>$from_id ,':from_nom'=>$from_nom , ':titre'=>$titre,':dat'=>$dat, ':content'=>$content,':active'=>$active,':vue'=>$vue,':f_pj'=>$f_pj );
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');

//		print $sql;
  
		//preparation de la requete message	envoyes

		$vue="false";
		$active="true"; 

		$sql = 'INSERT INTO `message_envoye` (`id_msg`, `id`, `nom`, `from_id`, `from_nom`, `objet`, `dat`, `body`, `active`, `vue`, `f_pj` ) VALUES 
										(:ref, :id, :nom, :from_id, :from_nom, :titre, :dat, :content, :active, :vue, :f_pj) ';
										
		$datas = array(':ref'=>null,':id'=>$id , ':nom'=>$nom ,':from_id'=>$from_id ,':from_nom'=>$from_nom , ':titre'=>$titre,':dat'=>$dat, ':content'=>$content,':active'=>$active,':vue'=>$vue,':f_pj'=>$f_pj );
		
		//execution de la requete
			$records = $con->prepare($sql);
			$records->execute($datas) or die('Probleme');

		//		print $sql;


  
	}	
	 
	 


  
header("Location: ../index.php?id=".$id); 

?>