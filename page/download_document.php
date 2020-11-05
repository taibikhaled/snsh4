<?php

$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);

$file=$_GET['file'];

if (!isset($_COOKIE["id_user"])) {
header('location:'.$path.'page/redirect.php?file='.$file);
exit();
} else {

setlocale(LC_TIME, "fr_FR", "French");


session_start();

$_SESSION['path']=$path;

$p=explode("|",$_COOKIE["id_user"]);
$pp=$p[1];
      
$id=$pp;


$connect_news=$path.'Config/connect_login.php';
include($connect_news);

$sql='Select count(*) from users_membre where id='.$id;

$req = $con->query($sql);

$row = $req->fetch(); 


if ($row[0]>0) 
	{
		
		$lien=$path."app/cdocument/index.php?id=".$file;
		header('location:'.$lien);

	}  
}             
?>
