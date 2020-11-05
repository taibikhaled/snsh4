<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;


if (isset($_SESSION['id_inscription_oran'])){

  $p=explode("|",$_GET['id']);
  $pp=$p[1];
        
  $id=$pp;
  
  $idd=$id;
  
  if ($_SESSION['id_inscription_oran'] <> $idd){ 
    header("Location: index.php"); 		 
  }
  } else {header("Location: index.php");}

$connect=$path.'Config/connect_news.php';
include($connect);

$sqll=' SELECT * FROM inscription_oran where id='.$idd;

$reqq = $con->query($sqll);


$rows = $reqq->fetch();


$sqll=' SELECT * FROM equivalent_niveau_oran where id='.$rows['NIVS'];

$reqq = $con->query($sqll);

$ro = $reqq->fetch();


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
                <p class="card-title mb-0"><h2 class="text-center" >Ecole de Formation Professionnelle en Gestion  -ORAN </h2><br> <br><h6 class="text-center"> Avenue Larbi Ben Mhidi Oran  </h6 > <br> <br>                  <hr class="border-warning mt-1" width='90%' >

                  <div class="row mt-4">
                  <div class='col-xl-1 col-lg-1'>  </div>
                  
                  <div class='p-4 col-xl-9 col-lg-9 card shadow border text-left mb-4 '>
                  <h4 class='text-center'> Confirmation </h4>
                  <hr class="border-warning"><br>

<p class="display-5 text-right text-justify text-gray-900"> <?php print '، '.$rows['PRENOMAR'].' '.$rows['NOMAR']?>
<br>                  لقد تم التسجيل المسبق الخاص بك بنجاح 

يمكنك تحميل بطاقة التسجيل وطباعتها وتوقيعها من قبل كفيلك (العامل بالمؤسسة) والمصادقة عليها من طرف الفرع النقابي

ستتلقى قريبًا في البريد الإلكتروني الخاص بك موعد التسليم الملف 

</p><br><br>

<p class="display-5 text-justify text-gray-900"> <?php print $rows['NOME'].' '.$rows['PRENOME'].', '?>
 <br> Votre pré-inscription a été enregistrée avec succès 

Vous pouvez télécharger votre fiche d’inscription, l’imprimer, la faire signer par votre parrain (Agent de l’entreprise) et la valider par la section syndicale.
<br>
Vous recevrez un rendez-vous prochainement dans votre boite Email, pour le dépôt de votre dossier.
</p>

<br><br> <div class="text-center"> <?php print '<a href="Fiche.php?id='.$_GET['id'].'" target="_blak" class="btn btn-primary lg col-lg-5"><h6>   <i class="mdi mdi-download menu-icon mr-2"></i> Télécharger - تحميل </h6></a>'; ?></div>
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

