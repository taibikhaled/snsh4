<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"></head><body>
<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;


if (isset($_SESSION['id_inscription_etablissement'])){

  $p=explode("|",$_GET['id']);
  $pp=$p[1];
        
  $id=$pp;
  
  $idd=$id;
  
  if ($_SESSION['id_inscription_etablissement'] <> $idd){ 
    header("Location: index.php"); 		 
  }
  } else {header("Location: index.php");}
  
$connect=$path.'Config/connect_news.php';
include($connect);

$sqll=' SELECT * FROM inscription_etablissement where id='.$idd;

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
$NPHE = $row['NPHA'];
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


$sqll=' SELECT * FROM equivalent_niveau_etablissement where id='.$row['NIVS'];

$reqq = $con->query($sqll);

$r = $reqq->fetch();

$NIVS=$r['designation'];
$sqll=' SELECT * FROM inscription_etablissement_choix where id_inscription='.$idd;


$reqq = $con->query($sqll);
$as1s='X';  $as1l='X'; $as2lp='X';
$as2ll='X';$as2g='X';$as2se='X';
$as3lp='X';$as3ll='X';$as3g='X';$as3se='X';

while($ro = $reqq->fetch()) {

  if ($ro['id_formation']==2) $as1l=$ro['choix']; 
  if ($ro['id_formation']==3) $as1s=$ro['choix']; 
  if ($ro['id_formation']==4) $as2ll=$ro['choix']; 
  if ($ro['id_formation']==5) $as2lp=$ro['choix']; 
  if ($ro['id_formation']==6) $as2g=$ro['choix']; 
  if ($ro['id_formation']==7) $as2se=$ro['choix']; 
  if ($ro['id_formation']==8) $as3ll=$ro['choix']; 
  if ($ro['id_formation']==9) $as3lp=$ro['choix']; 
  if ($ro['id_formation']==10) $as3g=$ro['choix']; 
  if ($ro['id_formation']==11) $as3se=$ro['choix']; 

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
		$img_file = 'images/FINS.png';
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
$img_file = 'images/FINS.png';
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


$code=$idd."-".$NOME."-".$PRENOME."-".$dat."-ESS-".$choix1;


QRcode::png ($code , "images/code.png", "L", 2, 2) ;


$pdf->Ln(6);

$pdf->Cell(0,6,"    ".$num,0,1,'L');
$pdf->SetFont('aefurat','',12);


$pdf->Ln(17.5);

$pdf->Cell(0,5,"          ".$esnome,0,1,'L');

$pdf->Ln(5);

$pdf->Cell(0,6,"               ".$esprenome,0,1,'L');

$pdf->Ln(7.5);

$pdf->Cell(0,5,"                                           ".$d[0]." ".$d[1]."    ".$d[3]." ".$d[4]."    ".$d[6]." ".$d[7]." ".$d[8]." ".$d[9] ,0,1,'L');	

$pdf->Cell(0,6,"                                                                                     ".$LIEU,0,1,'R');
	

$pdf->Cell(0,6,"                                                                                     ".$ADR,0,1,'R');

$pdf->Ln(7);


$pdf->Cell(0,6,"                                       ".$NPHE,0,1,'L');

$pdf->Cell(0,5,"                                 ".$MAIL,0,1,'L');

$pdf->Ln(1);

$pdf->Cell(0,4,"                                                 ".$NPHT,0,1,'L');


$pdf->SetFont('aefurat','',10);

$pdf->Cell(0,6,"                                                                                                     ".$NIVS,0,1,'R');


$pdf->SetFont('aefurat','',14);

$pdf->SetXY(83,61);
$pdf->Write(0, $PRENOMAR);
  

$pdf->SetXY(83,72);
$pdf->Write(0, $NOMAR);
  


if ($SEXE=="M") {

  $pdf->SetXY(58,100);
  $pdf->Write(0, 'X');
    
  } else
  
  {
    $pdf->SetXY(65,100);
    $pdf->Write(0, 'X');
        
  }

 
//  $pdf->SetXY(72,95);
//  $pdf->Write(0, $CADR);
    
  
//  $pdf->SetXY(72,100);
//  $pdf->Write(0, $WADR);
 
  
$pdf->SetFont('aefurat','',12);

$pdf->SetXY(150,58);
$pdf->Write(0, $LIP);

$pdf->SetXY(132,64);
$pdf->Write(0, $NOMA);

$pdf->SetXY(137,70);
$pdf->Write(0, $PRENOMA);

$pdf->SetXY(138,76);
$pdf->Write(0, $FONC);

$pdf->SetXY(139,82);
$pdf->Write(0, $ENTRA);

$pdf->SetFont('aefurat','',8);   
$pdf->SetXY(161,89);
$pdf->Write(0, $ADRA);

$pdf->SetFont('aefurat','',12);   
$pdf->SetXY(157,94);
$pdf->Write(0, $NPHA);


$pdf->SetXY(138,100);
$pdf->Write(0, $MATA);


$pdf->SetXY(138,106);
$pdf->Write(0, $DIRA);

$pdf->SetFont('aealarabiya','',10);   
	

  
if ($as1l<>''){
    $pdf->SetXY(80,150);
    $pdf->Write(0, $as1l);
    }

    
if ($as1s<>''){
  $pdf->SetXY(80,158);
  $pdf->Write(0, $as1s);
  }
  
  
  if ($as2g<>'')
  {
    $pdf->SetXY(80,167);//185
    $pdf->Write(0, $as2g);
    }
  
  
  
  if ($as2ll<>'')
  {
    $pdf->SetXY(80,176);
    $pdf->Write(0, $as2ll);
    }
  
  
    if ($as2lp<>'')
  {
    $pdf->SetXY(80,185);
    $pdf->Write(0, $as2lp);
    }
  
  
  if ($as2se<>'')
  {
    $pdf->SetXY(80,193);
    $pdf->Write(0, $as2se);
    }
    
  if ($as3g<>'')
    {
      $pdf->SetXY(80,202);
      $pdf->Write(0, $as3g);
      }
    

  
  if ($as3ll<>'')
  {
    $pdf->SetXY(80,210);
    $pdf->Write(0, $as3ll);
    }

    
  if ($as3lp<>'')
  {
    $pdf->SetXY(80,219);
    $pdf->Write(0, $as3lp);
    }
    
  if ($as3se<>'')
  {
    $pdf->SetXY(80,227);
    $pdf->Write(0, $as3se);
    }
  
    
    
  
  $pdf->Image($path."backup/etablissement/inscription/photos/".$row['PHOTO'] , 6,15.5,31.5,38);
  
    
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