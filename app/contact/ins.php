<?php

session_start();

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);	


if(isset($_POST['captcha'])){
		
	if($_POST['captcha']==$_SESSION['code']){


				if(isset($_POST['submit'])){


	
	$connect_news=$path.'Config/connect_news.php';
	require_once $connect_news;


	//récupération PROPRE des variables AVANT de les utiliser
	$titre = !empty($_POST['titre']) ? trim($_POST['titre']) : NULL;
	$mail = !empty($_POST['mail']) ? trim($_POST['mail']) : NULL;
	$content = !empty($_POST['editor1']) ? trim($_POST['editor1']) : NULL;
	

	
	
	 $dat=date("Y-m-d H:i:s");   
	
	  //preparation de la requete

	 
  
	  	$sql = 'INSERT INTO contact (nom,  dat, mail , content_text)  VALUES (:titre, :dat, :mail, :content_text) ';
	  	$datas = array( ':titre'=>$titre, ':dat'=>$dat, ':mail'=>$mail, ':content_text'=>$content );
	  
	  //execution de la requete
		$records = $con->prepare($sql);
		$records->execute($datas) or die('Probleme');
  
		
  

  
	}	
	 
	
						header("Location: index.php?msg=true"); 
	} else {

		header("Location: index.php?tcpa=true&msg=true"); 	 

	} 
}

?>