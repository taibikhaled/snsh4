<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"></head><body>
<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;


if (isset($_SESSION['id_inscription_ecole'])){

  $p=explode("|",$_GET['id']);
  $pp=$p[1];
        
  $id=$pp;
  
  $idd=$id;
  
  if ($_SESSION['id_inscription_ecole'] <> $idd){ 
    header("Location: index.php"); 		 
  }
  } else {header("Location: index.php");}


$connect=$path.'Config/connect_news.php';
include($connect);

$sqll=' SELECT * FROM inscription_ecole where id='.$idd;

$reqq = $con->query($sqll);


$row = $reqq->fetch();


$NOMA = $row['NOMA'];
$PRENOMA = $row['PRENOMA'];
$LIP = $row['LIP'];
$FONC = $row['FONC'];
$MATA = $row['MATA'];
$DIRA = $row['DIRA'];
$ENTRA = $row['ENTRA'];
$ADRA = $row['ADRA'];
$NPHA = $row['NPHA'];
$NOME = $row['NOME'];
$PRENOME = $row['PRENOME'];
$NOMAR = $row['NOMAR'];
$PRENOMAR = $row['PRENOMAR'];
$SEXE = $row['SEXE'];
$DATN = $row['DATN'];
$LIEU = $row['LIEU'];
$ADR = $row['ADR'];
$MAIL = $row['MAIL'];
$NPHE = $row['NPHE'];
$NPHT = $row['NPHT'];
$NIVS = $row['NIVS'];
/////////

if ($row['WILAYA_N']<>'') {
$sqll=' SELECT * FROM wilaya where CODE_W='.$row['WILAYA_N'];

$reqq = $con->query($sqll);


$row_wilaya = $reqq->fetch();

$WADR=$row_wilaya['WILAYA'];
} else $WADR='';

if ($row['COMMUNE_N']<>'') {

$sqll=' SELECT * FROM commune where (CODE_C='.$row['COMMUNE_N'].') and (CODE_W='.$row['WILAYA_N'].')';

$reqq = $con->query($sqll);


$row_commune = $reqq->fetch();
$CADR=$row_commune['COMMUNE'];
} else $CADR='';

$sqll=' SELECT * FROM equivalent_niveau_ecole where id='.$row['NIVS'];

$reqq = $con->query($sqll);

$r = $reqq->fetch();

$NIVS=$r['designation'];
$sqll=' SELECT * FROM inscription_ecole_choix where id_inscription='.$idd;

$reqq = $con->query($sqll);
$cap='X';  $cmtc='X'; $ced='X';
$mfc='X';$mmg='X';
while($ro = $reqq->fetch()) {

  if ($ro['id_formation']==1) $cap=$ro['choix']; 
  if ($ro['id_formation']==2) $cmtc=$ro['choix']; 
  if ($ro['id_formation']==3) $ced=$ro['choix']; 
  if ($ro['id_formation']==4) $mfc=$ro['choix']; 
  if ($ro['id_formation']==5) $mmg=$ro['choix']; 
  
  if ($ro['choix']==1) $choix1=$ro['designation'];


}


require_once('../../tcpdf/tcpdf.php');


include "../../phpqrcode/qrlib.php"; //le code qrcode


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// get the current page break margin
		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// set bacground image
		$img_file = 'images/FECO01.png';
		$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}
	

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// --- example with background set on page ---

// remove default header
$pdf->setPrintHeader(false);

// add a page
$pdf->AddPage();


// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = 'images/FECO01.png';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


// Print a text


$datt = strtotime($row['DATN']);

$dat=date('d/m/Y', $datt);
                         
$d=str_split($dat);


$nb=strlen($NOME);

$nomt=str_split($NOME);

$esnome='';
for ($i=0;$i<= $nb;$i++) {
  $esnome=$esnome.$nomt[$i].'  ';
}

$esnome=strtoupper($esnome);



$nb=strlen($PRENOME);

$nomt=str_split($PRENOME);

$esprenome='';
for ($i=0;$i<= $nb;$i++) {
  $esprenome=$esprenome.$nomt[$i].'  ';
}

$esprenome=strtoupper($esprenome);



$dat=$row['DAT'];

$code=$idd."-".$NOME."-".$PRENOME."-".$dat."-EFPG-ALGER-".$choix1;

QRcode::png ($code , "images/code.png", "L", 2, 2) ;


$pdf->Ln(6);

$pdf->Cell(0,6,"    ".$num,0,1,'L');
$pdf->SetFont('aefurat','',14);


$pdf->Ln(20);

$pdf->Cell(0,7,"                                               ".$esnome."      ",0,1,'L');

$pdf->Ln(5); 

$pdf->Cell(0,7,"                                                   ".$esprenome."      ",0,1,'L');

$pdf->Ln(6); 

$pdf->Cell(0,8,"                                      ".$d[0]." ".$d[1]." / ".$d[3]." ".$d[4]." / ".$d[6]." ".$d[7]." ".$d[8]." ".$d[9]."        ".$LIEU ,0,1,'L');	


$pdf->Cell(0,7,"                ".$ADR,0,1,'L');


$pdf->Cell(0,8,"                ".$CADR."         ".$WADR,0,1,'L');

$pdf->Ln(2);


$pdf->Cell(0,7,"                          ".$NIVS,0,1,'L');

$pdf->Ln(2); 

$pdf->Cell(0,6,"                           ".$NPHE."                                                 ".$NPHT,0,1,'L');

$pdf->Ln(2); 
$pdf->Cell(0,6,"                              ".$FONC."                                                 ".$MATA,0,1,'L');

$pdf->Ln(2);
$pdf->Cell(0,5,"                    ".$ENTRA ."                                                                    ".$NPHA,0,1,'L');

$pdf->Ln(2);
$pdf->Cell(0,5,"                                ".$ADRA,0,1,'L');



$pdf->SetXY(170,60);
$pdf->Write(0, $NOMAR);
    
$pdf->SetXY(170,72);
$pdf->Write(0, $PRENOMAR);
        


$pdf->SetFont('aealarabiya','',10);   
	

if ($cap<>''){
$pdf->SetXY(123.5,173);
$pdf->Write(0, $cap);
}


if ($cmtc<>''){
  $pdf->SetXY(123.5,182);
  $pdf->Write(0, $cmtc);
  }


if ($ced<>'')
{
  $pdf->SetXY(123.5,190);
  $pdf->Write(0, $ced);
  }


  
if ($mfc<>'')
{
  $pdf->SetXY(123.5,205);
  $pdf->Write(0, $mfc);
  }

if ($mmg<>'')
{
  $pdf->SetXY(123.5,213);
  $pdf->Write(0, $mmg);
  }

$pdf->Image($path."backup/ecole01/inscription/photos/".$row['PHOTO'] , 7,29,45,50);

$pdf->Image("images/code.png" , 183,34);
//Close and output PDF document





//Close and output PDF document
ob_end_clean();

$pdf->Output('Fiche.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
</body></html>