<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['submit'])){


	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;
	
	$idd=!empty($_POST['id']) ? trim($_POST['id']) : NULL;

	
	
	$sql="DELETE FROM `inscription_ecole_choix` WHERE id_inscription=".$idd;
	//execution de la requete
	$records = $con->query($sql);
	

	$choix1 = !empty($_POST['choix1']) ? trim($_POST['choix1']) : NULL;
    $choix2 = !empty($_POST['choix2']) ? trim($_POST['choix2']) : NULL;
    $choix3 = !empty($_POST['choix3']) ? trim($_POST['choix3']) : NULL;
    $choix4 = !empty($_POST['choix4']) ? trim($_POST['choix4']) : NULL;
    $choix5 = !empty($_POST['choix5']) ? trim($_POST['choix5']) : NULL;
	$choix6 = !empty($_POST['choix6']) ? trim($_POST['choix6']) : NULL;
    $choix7 = !empty($_POST['choix7']) ? trim($_POST['choix7']) : NULL;
    $choix8 = !empty($_POST['choix8']) ? trim($_POST['choix8']) : NULL;
    $choix9 = !empty($_POST['choix9']) ? trim($_POST['choix9']) : NULL;
    
	



	$des1 = !empty($_POST['des1']) ? trim($_POST['des1']) : NULL;
    $des2 = !empty($_POST['des2']) ? trim($_POST['des2']) : NULL;
    $des3 = !empty($_POST['des3']) ? trim($_POST['des3']) : NULL;
    $des4 = !empty($_POST['des4']) ? trim($_POST['des4']) : NULL;
    $des5 = !empty($_POST['des5']) ? trim($_POST['des5']) : NULL;
	$des6 = !empty($_POST['des6']) ? trim($_POST['des6']) : NULL;
	$des7 = !empty($_POST['des7']) ? trim($_POST['des7']) : NULL;
	$des8 = !empty($_POST['des8']) ? trim($_POST['des8']) : NULL;
	$des9 = !empty($_POST['des9']) ? trim($_POST['des9']) : NULL;




	$for1 = !empty($_POST['for1']) ? trim($_POST['for1']) : NULL;
    $for2 = !empty($_POST['for2']) ? trim($_POST['for2']) : NULL;
    $for3 = !empty($_POST['for3']) ? trim($_POST['for3']) : NULL;
    $for4 = !empty($_POST['for4']) ? trim($_POST['for4']) : NULL;
    $for5 = !empty($_POST['for5']) ? trim($_POST['for5']) : NULL;
    $for6 = !empty($_POST['for6']) ? trim($_POST['for6']) : NULL;
    $for7 = !empty($_POST['for7']) ? trim($_POST['for7']) : NULL;
    $for8 = !empty($_POST['for8']) ? trim($_POST['for8']) : NULL;
    $for9 = !empty($_POST['for9']) ? trim($_POST['for9']) : NULL;


	 if ($choix1<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for1,':desi'=>$des1,':id_inscr'=>$idd, ':choix'=>$choix1);

		print_r($datas)."<br>";
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
	   
	 
	 if ($choix2<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for2,':desi'=>$des2,':id_inscr'=>$idd, ':choix'=>$choix2);

		print_r($datas)."<br>";
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
	 
	 if ($choix3<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for3,':desi'=>$des3,':id_inscr'=>$idd, ':choix'=>$choix3);

		print_r($datas)."<br>";
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
	 
	 if ($choix4<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for4,':desi'=>$des4,':id_inscr'=>$idd, ':choix'=>$choix4);

		print_r($datas)."<br>";
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
	 
	 if ($choix5<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for5,':desi'=>$des5,':id_inscr'=>$idd, ':choix'=>$choix5);

		print_r($datas);
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
  

	 if ($choix6<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for6,':desi'=>$des6,':id_inscr'=>$idd, ':choix'=>$choix6);

		print_r($datas);
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
  
	 
	 if ($choix7<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for7,':desi'=>$des7,':id_inscr'=>$idd, ':choix'=>$choix7);

		print_r($datas);
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
  
	 
	 if ($choix8<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for8,':desi'=>$des8,':id_inscr'=>$idd, ':choix'=>$choix8);

		print_r($datas);
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
  
	 
	 if ($choix9<>null) {

	
		$sql="INSERT INTO `inscription_ecole_choix` 
		(`id_formation`, `designation`, `id_inscription`, `choix`) VALUES 
		( :id_for, :desi, :id_inscr, :choix);";

		$datas = array(':id_for'=>$for9,':desi'=>$des9,':id_inscr'=>$idd, ':choix'=>$choix9);

		print_r($datas);
		//execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');


	 }
  
  
	}	
	 

	



							                
	$coc=sha1($idd);
	$coc=$coc."|";
	$coc=$coc.$idd;


  
header("Location: confirm.php?id=".$coc); 

?>