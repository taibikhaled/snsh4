<?php
mb_internal_encoding("UTF-8");
session_start();

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


$connect_news=$path.'Config/connect_news.php';
include($connect_news);


if(isset($_POST['captcha'])){

					$url="";
					//récupération PROPRE des variables AVANT de les utiliser
					$noma = !empty($_POST['noma']) ? trim($_POST['noma']) : NULL;
					$url=$url."noma=".$noma;
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
			

								
				$autre_lieu = !empty($_GET['autre_lieu']) ? trim($_GET['autre_lieu']) : NULL;

				if (($autre_lieu=="")&&($wnais<>"Autre")){

				$sqll=' SELECT * FROM wilaya where CODE_W='.$wnais;

				$reqq = $con->query($sqll);


				$row_wilaya = $reqq->fetch();

				$WLIEU=$row_wilaya['WILAYAA'];

				$CLIEU="";
				if ($cnais<>''){ 

				$sqll=' SELECT * FROM commune where (CODE_C='.$cnais.') and (CODE_W='.$wnais.')';

				$reqq = $con->query($sqll);


				$row_commune = $reqq->fetch();
				$CLIEU=$row_commune['COMMUNEA'];
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
					


					$sqll=' SELECT * FROM equivalent_niveau_etablissement where id='.$nivs;

					$reqq = $con->query($sqll);
					
					$ro = $reqq->fetch();
					
					$niveau=$ro['designation'];
					
					$url=$url."&niveau=".$niveau;

					$moyenne = !empty($_POST['moyenne']) ? trim($_POST['moyenne']) : NULL;
					$url=$url."&moyenne=".$moyenne;
							

							
	
	if($_POST['captcha']==$_SESSION['code']){
		

				if(isset($_POST['submit'])){

						
	
							if ($nivs=='1'){

								$sqll='Select * from moyenne_etablissement ;';
								$reqq = $con->query($sqll);
								
								$row_moy = $reqq->fetch();
								
								$cnag=$row_moy[1];
								$moy_adm=$row_moy[0];
								$moyg=$moyenne;
		

							if ($moyg<$cnag) {

									header("Location: index.php?".$url."&moyg=true;&mo=".$moyg);						
									exit;
								}
							}	
							
							
							$sqll='Select * from inscription_etablissement order by id desc ;';
							$reqq = $con->query($sqll);


							$id = $reqq->fetch();
							$idd=$id[0]+1;




							if (isset($_FILES['file2'])) 
								{
											$nomOrigine = $_FILES['file2']['name'];
											$test_img=false;
											if ($nomOrigine!="") 
											
											{
												$elementsChemin = pathinfo($nomOrigine);
												$extensionFichier = ($elementsChemin['extension']);
											
												$extensionsAutorisees = array("JPEG","jpeg", "JPG","jpg", "GIF","gif", "PDF","pdf", "PNG", "png");
											
												if (!(in_array($extensionFichier, $extensionsAutorisees))) 
												{
														header("Location: index.php?erreur=2");
															} else {    

												// Copie dans le repertoire du script avec un nom
											
																	$repertoireDestination = $path."backup/etablissement/inscription/photos/";
																	$nomDestination_f_img = "img".$idd.".".$extensionFichier;

echo $repertoireDestination.$nomDestination_f_img;											
																	if (move_uploaded_file($_FILES["file2"]["tmp_name"], $repertoireDestination.$nomDestination_f_img)) 
																				
																	$test_img=true;	
													
																	
																}
																					
											}
													
											
								}




							if ($test_img ==true) $f_img=$nomDestination_f_img; else $f_img='';

							
							
							$dat=date("Y-m-d H:i:s");   
							$annee='2020';
							//preparation de la requete

							
							$sql='INSERT INTO `inscription_etablissement` (`ID`, `DAT`, `NOMA`, `PRENOMA`, `LIP`, `FONC`, `MATA`, `DIRA`, `ENTRA`, `ADRA`, `NPHA`, `NOME`, `PRENOME`, `NOMAR`, `PRENOMAR`, `SEXE`, `DATN`, `LIEU`, `ADR`, `MAIL`, `NPHE`,`NPHT`, `NPHF`, `ANNEE`, `NIVS`, `PHOTO`, `WILAYA_N`, `COMMUNE_N`, `MOYENNE`) VALUES 
							(:id, :dat, :noma, :prenoma, :lip, :fonc, :mata, :dira, :entra, :adra, :npha, :nome, :prenome, :nomar, :prenomar, 
							:sexe, :datn, :lieu, :adr, :mail, :nphe, :npht, :nphf, :annee, :nivs, :f_img, :wilaya, :commune, :moyenne);';


							$datas = array(':id'=>null , ':dat'=>$dat,':noma'=>$noma, ':prenoma'=>$prenoma, ':lip'=>$lip, ':fonc'=>$fonc, ':mata'=>$mata, ':dira'=>$dira, ':entra'=>$entra, ':adra'=>$adra, ':npha'=>$npha, ':nome'=>$nome, ':prenome'=>$prenome, ':nomar'=>$nomar, ':prenomar'=>$prenomar, ':sexe'=>$sexe, ':datn'=>$datn, ':lieu'=>$lieu, ':adr'=>$adr,':mail'=>$mail,':nphe'=>$nphe, ':npht'=>$npht, ':nphf'=>$nphf,':annee'=>$annee,':nivs'=>$nivs,':f_img'=>$f_img ,':wilaya'=>$wadr ,':commune'=>$cadr, ':moyenne'=>$moyenne   );

							//execution de la requete
							$records = $con->prepare($sql);
							$records->execute($datas) or die('Probleme');

								
						

					

						
						}	
							
							


						$_SESSION['id_inscription_etablissement'] = $idd;

										
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