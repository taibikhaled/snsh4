<?php

session_start();

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


$connect_news=$path.'Config/connect_news.php';
include($connect_news);

if(isset($_POST['captcha'])){


	$url="";
							//récupération PROPRE des variables AVANT de les utiliser
							$id_ins = !empty($_POST['id']) ? trim($_POST['id']) : NULL;
							$url=$url."id=".$id_ins;
							$noma = !empty($_POST['noma']) ? trim($_POST['noma']) : NULL;
							$url=$url."&noma=".$noma;
							$prenoma = !empty($_POST['prenoma']) ? trim($_POST['prenoma']) : NULL;
							$url=$url."&prenoma=".$prenoma;
							$lip = !empty($_POST['lip']) ? trim($_POST['lip']) : NULL;
							$url=$url."&lip=".$lip;
							$fonc = !empty($_POST['fonc']) ? trim($_POST['fonc']) : NULL;    
							$url=$url."&fonc=".$fonc;
							$mata = !empty($_POST['mata']) ? trim($_POST['mata']) : NULL;
							$url=$url."&mata=".$mata;
							$dira = !empty($_POST['dira']) ? trim($_POST['dira']) : NULL;
							$url=$url."&dira=".$dira;
							$entra = !empty($_POST['entra']) ? trim($_POST['entra']) : NULL;
							$url=$url."&entra=".$entra;
							$adra = !empty($_POST['adra']) ? trim($_POST['adra']) : NULL;
							$url=$url."&adra=".$adra;
							$npha = !empty($_POST['npha']) ? trim($_POST['npha']) : NULL;
							$url=$url."&npha=".$npha;
							$nome = !empty($_POST['nome']) ? trim($_POST['nome']) : NULL;
							$url=$url."&nome=".$nome;
							$prenome = !empty($_POST['prenome']) ? trim($_POST['prenome']) : NULL;
							$url=$url."&prenome=".$prenome;
							$nomar = !empty($_POST['nomar']) ? trim($_POST['nomar']) : NULL;
							$url=$url."&nomar=".$nomar;
							$prenomar = !empty($_POST['prenomar']) ? trim($_POST['prenomar']) : NULL;
							$url=$url."&prenomar=".$prenomar;
							$sexe = !empty($_POST['sexe']) ? trim($_POST['sexe']) : NULL;
							$url=$url."&sexe=".$sexe;
							$datn = !empty($_POST['datn']) ? trim($_POST['datn']) : NULL;
							$url=$url."&datn=".$datn;
					
							$wnais = !empty($_POST['wnais']) ? trim($_POST['wnais']) : NULL;
							$url=$url."&wnais=".$wnais;

							$cnais = !empty($_POST['cnais']) ? trim($_POST['cnais']) : NULL;
							$url=$url."&cnais=".$cnais;
										
							$autre_lieu = !empty($_POST['autre_lieu']) ? trim($_POST['autre_lieu']) : NULL;
							
							if (($autre_lieu=="")&&($wnais<>"Autre")){

							$sqll=' SELECT * FROM wilaya where CODE_W='.$wnais;

							$reqq = $con->query($sqll);


							$row_wilaya = $reqq->fetch();

							$WLIEU=$row_wilaya['WILAYA'];

							$CLIEU="";
							if ($cnais<>''){ 
							
							$sqll=' SELECT * FROM commune where (CODE_C='.$cnais.') and (CODE_W='.$wnais.')';

							$reqq = $con->query($sqll);


							$row_commune = $reqq->fetch();
							$CLIEU=$row_commune['COMMUNE'];
							}
							$lieu = $CLIEU.' - '.$WLIEU;

							}  else $lieu = $autre_lieu;
					






										
			$autre_lieu = !empty($_GET['autre_lieu']) ? trim($_GET['autre_lieu']) : NULL;

			if (($autre_lieu=="")&&($wnais<>"Autre")){

			$sqll=' SELECT * FROM wilaya where CODE_W='.$wnais;

			$reqq = $con->query($sqll);


			$row_wilaya = $reqq->fetch();

			$WLIEU=$row_wilaya['WILAYA'];

			$CLIEU="";
			if ($cnais<>''){ 

			$sqll=' SELECT * FROM commune where (CODE_C='.$cnais.') and (CODE_W='.$wnais.')';

			$reqq = $con->query($sqll);


			$row_commune = $reqq->fetch();
			$CLIEU=$row_commune['COMMUNE'];
			}
			$lieu = $CLIEU.' - '.$WLIEU;

			}  else $lieu = $autre_lieu;

			$url=$url."&wlieu=".$WLIEU;
			$url=$url."&clieu=".$CLIEU;


							$wadr = !empty($_POST['wadr']) ? trim($_POST['wadr']) : NULL;
							$url=$url."&wadr=".$wadr;
					
							$cadr = !empty($_POST['cadr']) ? trim($_POST['cadr']) : NULL;
							$url=$url."&cadr=".$cadr;
					
							$adr = !empty($_POST['adr']) ? trim($_POST['adr']) : NULL;
							$url=$url."&adr=".$adr;
					

							$WLIEU="";
							
							if ($wadr<>''){ 

								$sqll=' SELECT * FROM wilaya where CODE_W='.$wadr;
								
								$reqq = $con->query($sqll);
								
								
								$row_wilaya = $reqq->fetch();
								
								$WLIEU=$row_wilaya['WILAYA'];
								
								}
								
								$CLIEU="";
								
								if ($cadr<>''){ 
								
								$sqll=' SELECT * FROM commune where (CODE_C='.$cadr.') and (CODE_W='.$wadr.')';
								
								$reqq = $con->query($sqll);
								
								
								$row_commune = $reqq->fetch();
								$CLIEU=$row_commune['COMMUNE'];
								}
								
								
								
								$url=$url."&walieu=".$WLIEU;
								$url=$url."&calieu=".$CLIEU;

							
							$mail = !empty($_POST['mail']) ? trim($_POST['mail']) : NULL;
							$url=$url."&mail=".$mail;
							$nphe = !empty($_POST['nphe']) ? trim($_POST['nphe']) : NULL;
							$url=$url."&nphe=".$nphe;
							$npht = !empty($_POST['npht']) ? trim($_POST['npht']) : NULL;
							$url=$url."&npht=".$npht;
	
							$nphf = !empty($_POST['nphf']) ? trim($_POST['nphf']) : NULL;
							$url=$url."&nphf=".$nphf;
	
							$nivs = !empty($_POST['nivs']) ? trim($_POST['nivs']) : NULL;
							$url=$url."&nivs=".$nivs;
							


							$sqll=' SELECT * FROM equivalent_niveau_oran where id='.$nivs;

							$reqq = $con->query($sqll);
							
							$ro = $reqq->fetch();
							
							$niveau=$ro['designation'];
							
							$url=$url."&niveau=".$niveau;
							

	
	if($_POST['captcha']==$_SESSION['code']){
		

				if(isset($_POST['submit'])){

							
							



							$idd=$id_ins;




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
											
																	$repertoireDestination = $path."backup/oran/inscription/photos/";
																	$nomDestination_f_img = "img".$idd.".".$extensionFichier;
											
																	if (move_uploaded_file($_FILES["file2"]["tmp_name"], $repertoireDestination.$nomDestination_f_img)) 
																				
																	$test_img=true;	
													
																	
																}
																					
											}
													
											
								}



							

							if ($test_img ==true) $f_img=$nomDestination_f_img; else $f_img='';

							
							
							$dat=date("Y-m-d H:i:s");   
							$annee='2020';
							//preparation de la requete

							
								$sql='UPDATE `inscription_oran` SET 
								`DAT`=:dat,`NOMA`=:noma,`PRENOMA`=:prenoma,`LIP`=:lip,`FONC`=:fonc,`MATA`=:mata,`DIRA`=:dira,`ENTRA`=:entra,`ADRA`=:adra,`NPHA`=:npha,`NOME`=:nome,`PRENOME`=:prenome,`NOMAR`=:nomar,`PRENOMAR`=:prenomar,`SEXE`=:sexe,`DATN`=:datn,`LIEU`=:lieu,`ADR`=:adr,`MAIL`=:mail,`NPHE`=:nphe,`NPHT`=:npht,`NPHF`=:nphf,`ANNEE`=:annee,`NIVS`=:nivs,`PHOTO`=:f_img,`WILAYA_N`=:wilaya,`COMMUNE_N`=:commune WHERE `ID`='.$id_ins; 
																																																																																					

								$datas = array( ':dat'=>$dat,':noma'=>$noma, ':prenoma'=>$prenoma, ':lip'=>$lip, ':fonc'=>$fonc, ':mata'=>$mata, ':dira'=>$dira, ':entra'=>$entra, ':adra'=>$adra, ':npha'=>$npha, ':nome'=>$nome, ':prenome'=>$prenome, ':nomar'=>$nomar, ':prenomar'=>$prenomar, ':sexe'=>$sexe, ':datn'=>$datn, ':lieu'=>$lieu, ':adr'=>$adr,':mail'=>$mail,':nphe'=>$nphe, ':npht'=>$npht, ':nphf'=>$nphf,':annee'=>$annee,':nivs'=>$nivs,':f_img'=>$f_img ,':wilaya'=>$wadr ,':commune'=>$cadr   );
							
							//execution de la requete
								$records = $con->prepare($sql);
								$records->execute($datas) or die('Probleme');
						
								
						

						
							}	
							
							




							$_SESSION['id_inscription_oran'] = $idd;

							                
							$coc=sha1($idd);
							$coc=$coc."|";
							$coc=$coc.$idd;
						
						
							header("Location: choix.php?id=".$coc); 
							exit;

						
						} else {

		header("Location: index.php?".$url."&tcpa=true"); 	 
		exit;
} 
}header("Location: index.php");
?>