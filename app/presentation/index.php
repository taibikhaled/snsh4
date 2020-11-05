<?php



$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);


if(session_id() == '') {
	session_start();
  }

$_SESSION['path']=$path;

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
  <style type="text/css"> 
   .interligne { line-height: 300%;} 
   </style> 
  
</head>
<body>
  <div class="container-scroller ">
    <!-- partial:partials/_navbar.html -->
    <?php
	
	$top_bar=$path.'page/top_bar.php';
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
                  <p class="card-title mb-0"><br><H3> HISTORIQUE DE LA CREATION DU C.F.P.C.T </H3></p>
                  <br>
                  <hr class="border-warning mt-1" >

                  <div class="row p-4">
                  
                 
                  <p class="interligne" style="text-align:justify"><span style="font-size:18px">Apr&egrave;s l&rsquo;ind&eacute;pendance de l&rsquo;Alg&eacute;rie le gouvernement cr&eacute;a le commissariat &agrave; la formation professionnelle, et par d&eacute;cret confia la formation professionnelle des travailleurs aux Comites d&rsquo;entreprises. Chaque entreprise ayant un effectif de 50 travailleurs et plus avait l&rsquo;obligation d&rsquo;avoir un Comite d&rsquo;entreprise, pr&eacute;sid&eacute; par le PDG, le secr&eacute;taire g&eacute;n&eacute;ral et le tr&eacute;sorier &eacute;taient des travailleurs.<br />
Le secteur p&eacute;trolier &eacute;tait scind&eacute; en deux groupes :<br />
1-les entreprises de distribution et de raffinage ; SHELL, ESSO, BP, BUTAGAZ, RAFIGAZ &hellip;<br />
2-les entreprises de la recherche de la production et de l&rsquo;exploitation ; SNREPAL, CFPA, SNPA, CREPS&hellip;<br />
En 1964 la f&eacute;d&eacute;ration des p&eacute;troliers consciente de la n&eacute;cessit&eacute; de la formation professionnelle des travailleurs projette le lancement de quelques formations et sensibilisa les deux groupes le premier adh&egrave;re alors que le second rejette la proposition arguant l&rsquo;existence de sa propre formation en entreprise.<br />
Apr&egrave;s un accord commun entre la f&eacute;d&eacute;ration et les entreprises du premier groupe, un Comit&eacute; Inter Entreprise le C.I.E fut cr&eacute;e afin de s&rsquo;occuper de la formation et de la promotion culturelle des travailleurs.<br />
Pr&eacute;sident du C.I.E Mr KLARK PDG de SHELL<br />
Vice pr&eacute;sident Mr BURO PDG de TOTAL<br />
SG Mr AGUIB SG du C.E de ESSO<br />
Tr&eacute;sorier Mr SEBAIA SG du C.E de BERYL<br />
<br />
Et c&rsquo;est ainsi que le CFPCT fut cr&eacute;e en 1964 au sis,64 Bvd Med V Alger, au 3&egrave;me &eacute;tage .<br />
La premi&egrave;re formation lanc&eacute;e &eacute;tait destin&eacute;e aux chefs de service formation<br />
par la suite d&rsquo;autres formations furent lanc&eacute;es : Comptabilit&eacute; Secr&eacute;tariat et Anglais.<br />
Le financement &eacute;tait vers&eacute; par les entreprises affili&eacute;es au C.I.E au prorata de leurs effectifs.<br />
<br />
En 1968 les entreprises affili&eacute;es au C.I.E furent nationalis&eacute;es et reprises par SONATRACH Le C.I.E fut dissout et remplac&eacute; par le Comit&eacute; des &OElig;uvres sociales le C.O.S Avec les missions principales<br />
1- reprendre l&rsquo;activit&eacute; de la M.I.P.A<br />
2- reprendre l&rsquo;activit&eacute; des &OElig;uvres sociales<br />
3- g&eacute;rer et promouvoir la formation des travailleurs<br />
<br />
Pr&eacute;sident Mr GHOZALI<br />
SG Mr BOUTALBA<br />
Tr&eacute;sorier Mr SEBAIA<br />
Repr&eacute;sentant de Mr GHOZALI Mr FARES<br />
<br />
En1973 apr&egrave;s la nationalisation de tout le secteur p&eacute;trolier et dans le cadre d&rsquo;une nouvelle r&eacute;organisation le C.O.S fut dissout et la f&eacute;d&eacute;ration des p&eacute;troliers devint l&rsquo;unique tutelle du CFPCT jusqu&#39;&agrave; 1976 ann&eacute;e de la cr&eacute;ation du Syndicat National Sonatrach.</span></p>

<p>&nbsp;</p>




               </div>
                  
                
               
                  </div>
                </div>
                </div>


       
      
          </div>


        <div class="row">

                    
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

