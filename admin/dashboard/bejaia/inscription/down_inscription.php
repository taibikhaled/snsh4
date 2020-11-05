<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);



  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}
  


$connect_news=$path.'Config/connect_evenement.php';
require_once $connect_news;

//Create our SQL query.

$con->exec("SET CHARACTER SET cp1256");


/// inscription 
$sql="SELECT * FROM `inscription_bejaia` a, `inscription_bejaia_choix` b, `equivalent_niveau_bejaia` c where (a.id=b.id_inscription) and (a.nivs=c.id) and (b.choix='1') order by a.id";
 
//Prepare our SQL query.
$reqq = $con->query($sql);
//$statement = $pdo->prepare($sql);
 
//Executre our SQL query.
//$statement->execute();
 
//Fetch all of the rows from our MySQL table.
$rows = $reqq->fetchAll(PDO::FETCH_ASSOC);
 
//Get the column names.
$columnNames = array();
if(!empty($rows)){
    //We only need to loop through the first row of our result
    //in order to collate the column names.
    $firstRow = $rows[0];
    foreach($firstRow as $colName => $val){
        $columnNames[] = $colName;
    }
}
 
//Setup the filename that our CSV will have when it is downloaded.
$fileName = 'inscription_bejaia_export_'.date('Y-m-d H.i.s').'.csv';
 
//Set the Content-Type and Content-Disposition headers to force the download.
//ini_set('default_charset','UTF-8');
header('Content-Type: text/html; charset=windows-windows-1256');
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
 
//Open up a file pointer
$fp = fopen('php://output', 'w');
 
//Start off by writing the column names to the file.
fputcsv($fp, $columnNames,';');
 
//Then, loop through the rows and write them to the CSV file.
foreach ($rows as $row) {
    fputcsv($fp, $row, ';');
}
 
//Close the file pointer.
fclose($fp);
  



?>
