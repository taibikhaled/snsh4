<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;

$idd=$_GET['id'];


$connect=$path.'Config/connect_news.php';
include($connect);



$url="";
//récupération PROPRE des variables AVANT de les utiliser
$noma = !empty($_GET['noma']) ? trim($_GET['noma']) : NULL;
$url=$url."noma=".$noma;
$prenoma = !empty($_GET['prenoma']) ? trim($_GET['prenoma']) : NULL;
$url=$url."&prenoma=".$prenoma;
$lip = !empty($_GET['lip']) ? trim($_GET['lip']) : NULL;
$url=$url."&lip=".$lip;
$fonc = !empty($_GET['fonc']) ? trim($_GET['fonc']) : NULL;    
$url=$url."&fonc=".$fonc;
$mata = !empty($_GET['mata']) ? trim($_GET['mata']) : NULL;
$url=$url."&mata=".$mata;
$dira = !empty($_GET['dira']) ? trim($_GET['dira']) : NULL;
$url=$url."&dira=".$dira;
$entra = !empty($_GET['entra']) ? trim($_GET['entra']) : NULL;
$url=$url."&entra=".$entra;
$adra = !empty($_GET['adra']) ? trim($_GET['adra']) : NULL;
$url=$url."&adra=".$adra;
$npha = !empty($_GET['npha']) ? trim($_GET['npha']) : NULL;
$url=$url."&npha=".$npha;
$nome = !empty($_GET['nome']) ? trim($_GET['nome']) : NULL;
$url=$url."&nome=".$nome;
$prenome = !empty($_GET['prenome']) ? trim($_GET['prenome']) : NULL;
$url=$url."&prenome=".$prenome;
$nomar = !empty($_GET['nomar']) ? trim($_GET['nomar']) : NULL;
$url=$url."&nomar=".$nomar;
$prenomar = !empty($_GET['prenomar']) ? trim($_GET['prenomar']) : NULL;
$url=$url."&prenomar=".$prenomar;
$sexe = !empty($_GET['sexe']) ? trim($_GET['sexe']) : NULL;
$url=$url."&sexe=".$sexe;
$datn = !empty($_GET['datn']) ? trim($_GET['datn']) : NULL;
$url=$url."&datn=".$datn;

$wnais = !empty($_GET['wnais']) ? trim($_GET['wnais']) : NULL;
$url=$url."&wnais=".$wnais;

$cnais = !empty($_GET['cnais']) ? trim($_GET['cnais']) : NULL;
$url=$url."&cnais=".$cnais;



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


$wadr = !empty($_GET['wadr']) ? trim($_GET['wadr']) : NULL;
$url=$url."&wadr=".$wadr;

$cadr = !empty($_GET['cadr']) ? trim($_GET['cadr']) : NULL;
$url=$url."&cadr=".$cadr;


$adr = !empty($_GET['adr']) ? trim($_GET['adr']) : NULL;
$url=$url."&adr=".$adr;


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


$mail = !empty($_GET['mail']) ? trim($_GET['mail']) : NULL;
$url=$url."&mail=".$mail;
$nphe = !empty($_GET['nphe']) ? trim($_GET['nphe']) : NULL;
$url=$url."&nphe=".$nphe;
$npht = !empty($_GET['npht']) ? trim($_GET['npht']) : NULL;
$url=$url."&npht=".$npht;

$nphf = !empty($_GET['nphf']) ? trim($_GET['nphf']) : NULL;
$url=$url."&nphf=".$nphf;

$nivs = !empty($_GET['nivs']) ? trim($_GET['nivs']) : NULL;
$url=$url."&nivs=".$nivs;



$sqll=' SELECT * FROM inscription_bejaia where id='.$idd;

$reqq = $con->query($sqll);


$rows = $reqq->fetch();


$sqll=' SELECT * FROM equivalent_niveau_bejaia where id='.$rows['NIVS'];

$reqq = $con->query($sqll);

$ro = $reqq->fetch();

$niveau=$ro['designation'];

$url=$url."&niveau=".$niveau;

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Etablissements de formation</title>
  
  <?php
	 $base_css=$path.'page/base_css.php';
	 include($base_css);
	 
	?> 


<script type="text/javascript">

                  function testForm(s,v){

                  var ss="#"+s;
                  var mm="#c"+s;
                  var vv=v;


                  //if(jQuery(ss).val()=="")  alert(jQuery(ss).val());
                  //var t=jQuery(ss).val();
                  
                  //var t=document.getElementById(s).value;
                  
                  //alert(jQuery(ss).text());
                  
                  jQuery(mm).html(vv);
                  //jQuery(mm).val(jQuery(ss).val());

                  console.log(ss);
                  console.log(mm);
                  console.log(vv);

                  //jQuery(mm).html='test';

                  }

                  

</script>
</head>
<body>
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <?php
	
	$top_bar=$path.'page/top_bar_insc.php';
	include($top_bar);

	?> 

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->

      <?php
		 $menu=$path.'page/menu.php';
		 include($menu);
		
	?> 
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
         
                    
                <?php
                
                $documents=$path.'page/marque.php';
                include($documents);

                ?> 
                
       



          <div class="row">

          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <p class="card-title mb-0"><h2 class="text-center" >Ecole de Formation Professionnelle en Gestion  -BEJAIA </h2><br> <br><h6 class="text-center"> Cité 164 LogtsSonatrach - Bejaia  </h6 ></p><br>
                  <hr class="border-warning mt-1" width='90%' >

                  <div class="row mt-4">
                  <div class='col-xl-1 col-lg-1'>  </div>
                  
                  <div class='p-4 col-xl-9 col-lg-9 card shadow border text-left mb-4 '>
                  <h4 class='text-center'> Alerte </h4>
                  <hr class="border-warning"><br>

<p class="display-5 text-right text-justify text-gray-900"> </p>

<p class="display-5 text-justify text-gray-900"> <?php print $rows['NOME'].' '.$rows['PRENOME'].', '?>
 <br> Votre pré-inscription a été déja enregistré. <br><br>  

cliquer sur Modifier pour modifier votre pré-inscription. <br>
cliquer sur retour pour retourner la page de pré-inscription.
</p> <br><br>
<div class="form-group text-center"> 
           

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
	Modifier
	</button>
  <input type="button" name='retour' class="btn btn-primary btn-lg " onclick="javascript:history.back()"  value="Retour">
                    
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">

    <form   action='' >

    <div class="row mt-4">
                  
                  <div class='p-2 col-xl-12 col-lg-12   text-left mb-4 '>
                  <br>
                  <h3 class="text-center text-danger">Vous ête sûr de vouloir modifier votre pré-inscription</h3>    
                    <br><br>
<div class="form-group text-center"> 

<?php print  "<a href='modification/index.php?id=".$idd."&".$url."' class='btn btn-primary btn-lg'>Oui</a>" ?>
                      <input type="button" name='retour' class="btn btn-primary btn-lg " data-dismiss="modal" aria-label="Close"  value="Non">
                    
		</div>
</from>

           
       

    </div>
                  </div>
                  </div>

                  
                  </div></div>
                  </div>


                  </div>
                  </div>
                  
                
               
                
               




        </div>


        <?php
     	$bas_page=$path.'page/bas_page.php';
     	include($bas_page);

	  ?>
    
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
  <?php
    $base_js=$path.'page/base_js.php';
    include($base_js);
	
	?>
</body>

</html>

