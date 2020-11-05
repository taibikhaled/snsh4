<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;

	$sqll='Select * from news order by id desc ;';
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
	
												$repertoireDestination = $path."backup/News/Pieces/";
												$nomDestination_f_pj = "PJ".$idd.".".$extensionFichier;
	
												if (move_uploaded_file($_FILES["file1"]["tmp_name"], $repertoireDestination.$nomDestination_f_pj)) 
										 
												$test_pj=true;	
			
												}
						}
		
	
		}
	

	if (isset($_FILES['file2'])) 
		{
					$nomOrigine = $_FILES['file2']['name'];
					$test_img=false;
					if ($nomOrigine!="") 
					
					{
						$elementsChemin = pathinfo($nomOrigine);
						$extensionFichier = strtoupper($elementsChemin['extension']);
					
						$extensionsAutorisees = array("JPEG", "JPG", "GIF", "PDF", "PNG");
					 
						if (!(in_array($extensionFichier, $extensionsAutorisees))) 
						{
						 		  header("Location: index.php?erreur=2");
									} else {    

						// Copie dans le repertoire du script avec un nom
					
											$repertoireDestination = $path."backup/News/Images/";
											$nomDestination_f_img = "img".$idd.".".$extensionFichier;
					
											if (move_uploaded_file($_FILES["file2"]["tmp_name"], $repertoireDestination.$nomDestination_f_img)) 
														 
											$test_img=true;	
							
											
										}
															
					}
							
					
		}




	//récupération PROPRE des variables AVANT de les utiliser
	$ref = "E.E.S / ".(!empty($_POST['ref']) ? trim($_POST['ref']) : NULL);
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$content = !empty($_POST['editor1']) ? trim($_POST['editor1']) : NULL;
	
	$content_te=str_replace("&#39;","'",$content);
	$content_tex = strip_tags($content_te);
	$content_text = html_entity_decode($content_tex);


	if ($test_img ==true) $f_img=$nomDestination_f_img; else $f_img='';
	if ($test_pj ==true) $f_pj=$nomDestination_f_pj; else $f_pj='';

	
	
	 $dat=date("Y-m-d H:i:s");   
	
	  //preparation de la requete

	 
  
	  	$sql = 'INSERT INTO news (ref, titre, content, dat, f_img, f_pj, content_text)  VALUES (:ref, :titre, :content, :dat, :f_img, :f_pj, :content_text) ';
	  	$datas = array(':ref'=>$ref , ':titre'=>$titre,':content'=>$content,':dat'=>$dat, ':f_img'=>$f_img,':f_pj'=>$f_pj, ':content_text'=>$content_text );
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	 


  
header("Location: index.php"); 

?>