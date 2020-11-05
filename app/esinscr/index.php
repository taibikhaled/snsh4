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

<?php
    $base_js=$path.'page/base_js_fade.php';
    include($base_js);
	
	?>




 <?php if (!isset($_GET['tcpa'])) print 
"<script>
 $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
    
</script>
";?>


  <script type="text/javascript">
             function fetch_select(val)
                    {
                      var valeur=val;
                      if (valeur!='Autre'){
                        jQuery("#autre").hide(); jQuery("#autre_lieu").hide();jQuery("#cnais").show(); jQuery("#lcnais").show();
                        $.ajax({
                                type: 'post',
                                url: 'fetch_data_cnais.php',
                                data: {
                                get_option:val
                                },
                                success: function (response) {
                                  document.getElementById("cnais").innerHTML=response; 
                                }
                                });
                              
                      } else { 
                        if(jQuery("#wnais").val()=="Autre"){jQuery("#autre").show(); jQuery("#autre_lieu").show();jQuery("#cnais").hide(); jQuery("#lcnais").hide();}
                      }
                      console.log(valeur);
                    }
       
             function fetch_select_adr(val)
                    {
                    $.ajax({
                    type: 'post',
                    url: 'fetch_data_cadr.php',
                    data: {
                    get_option:val
                    },
                    success: function (response) {
                      document.getElementById("cadr").innerHTML=response; 
                    }
                    });
                    }
    
            function fetch_moyenne()
                    {
                    $.ajax({
                    type: 'post',
                    url: 'fetch_moyenne.php',
                    data: {
                    get_option:jQuery("#moyenne").val()
                    },
                    success: function (response) {
                      //document.getElementById("cadr").innerHTML=response;
                      //if (val<response) 
                      var r;
                      r=response;
                      
                      if (r=="false") alert('    معدل المترشح ! لا يسمح لك بتسجيل في الثانوية');
                      console.log(r);
                     
                    }
                    });
                    }
    
            function isEmailValid(email){
                      var e = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                      return e.test(email);
                    }



                    function testMoy(){


                    if(jQuery('#nivs').val()=='1') {

                    jQuery("#lmoy").html('  <h3 class="text-danger ">&nbsp;   المعدل القبول </h3>');
                    

                    } else {
                      jQuery("#lmoy").html('  <h3 class="text-danger ">&nbsp;  المعدل السنوي </h3>');

                    
                    }

                     console.log(jQuery('#nivs').val());
                     }


               


            function testForm(s){

                    ss="#"+s;
                    mm="#m"+s;

                    if(jQuery(ss).val()==""){jQuery(mm).show();return false;}else {jQuery(mm).hide();}

                    if (s=="mail") if(!isEmailValid(jQuery("#mail").val())){jQuery('#mmail').show();return false;}else { jQuery('#mmail').hide();}		
                    if (s=="mail2") if(!isEmailValid(jQuery("#mail2").val())){jQuery('#mmail2').show();return false;}else { jQuery('#mmail2').hide();}		
                    if (s=="moyenne") if(!isMoyenneValid(jQuery("#moyenne").val())){jQuery('#mmoyenne').show();return false;}else {jQuery('#mmoyenne').hide();}		
                    if (s=="moyenne") if(jQuery('#nivs').val()=='1') fetch_moyenne(); 
                    
                    if (s=="nphe") {
                               var x=jQuery('#nphe').val();
                                xx=Math.floor(Math.log(x)/Math.LN10)+1;  
                                if(xx<9) jQuery('#mnphe').show();
                                          
                                         

                    }


                    if (s=="npht") {
                               var x=jQuery('#npht').val();
                                xx=Math.floor(Math.log(x)/Math.LN10)+1;  
                                if(xx<9) jQuery('#mnpht').show();


                    }



                 if ((jQuery("#mail").val()!='')&& (jQuery("#mail2").val()!='')) if (jQuery("#mail").val()!=jQuery("#mail2").val()) {jQuery('#mmaile').show(); jQuery('#mmail2e').show();return false;}else { jQuery('#mmaile').hide();jQuery('#mmail2e').hide();}		
                    

                    if (s=="datn") {
                    
                    var myDate = jQuery("#datn").val();
                      myDate = myDate.split("-");
                      var newDate = myDate[0]+","+myDate[1]+","+myDate[2];              
                      var date= new Date(newDate);
                    var diff = Date.now() - date.getTime();
                    var age = new Date(diff); 
                    var som = Math.abs(age.getUTCFullYear() - 1970);

              console.log(som);
                    if(som<14){jQuery('#mdatn').show();window.scroll(270,270);return false;}else {jQuery('#mdatn').hide();}
                    }

                console.log(mm);
            }
    
    
            function valideForm(){
		


              if(jQuery('#nome').val()==""){jQuery('#mnome').show();window.scroll(0,0);return false;}else {jQuery('#mnome').hide();}
              if(jQuery('#prenome').val()==""){jQuery('#mprenome').show();window.scroll(0,0);return false;}else {jQuery('#mprenome').hide();}
              if(jQuery('#prenomar').val()==""){jQuery('#mprenomar').show();window.scroll(0,0);return false;}else {jQuery('#mprenomar').hide();}
              if(jQuery('#nomar').val()==""){jQuery('#mnomar').show();window.scroll(90,90);return false;}else {jQuery('#mnomar').hide();}
              if(jQuery('#sexe').val()==""){jQuery('#msexe').show();window.scroll(150,150);return false;}else {jQuery('#msexe').hide();}
              if(jQuery('#datn').val()==""){jQuery('#mdatn').show();window.scroll(270,270);return false;}else {jQuery('#mdatn').hide();}
              if(jQuery('#wnais').val()==""){jQuery('#mwnais').show();window.scroll(330,330);return false;}else {jQuery('#mwnais').hide();}
              //if(jQuery('#cnais').val()==""){jQuery('#mcnais').show();window.scroll(330,330);return false;}else {jQuery('#mcnais').hide();}
              if(jQuery('#wadr').val()==""){jQuery('#mwadr').show();window.scroll(330,330);return false;}else {jQuery('#mwadr').hide();}
              if(jQuery('#cadr').val()==""){jQuery('#mcadr').show();window.scroll(330,330);return false;}else {jQuery('#mcadr').hide();}

//              if(jQuery('#lieu').val()==""){jQuery('#mlieu').show();window.scroll(330,330);return false;}else {jQuery('#mlieu').hide();}
              if(jQuery('#adr').val()==""){jQuery('#madr').show();window.scroll(400,400);return false;}else {jQuery('#madr').hide();}
              
              if(!isEmailValid(jQuery("#mail").val())){jQuery('#mmail').show();window.scroll(520,520);return false;}else { jQuery('#mmail').hide();}		

              if(!isEmailValid(jQuery("#mail2").val())){jQuery('#mmail2').show();return false;}else { jQuery('#mmail2').hide();}		

              if ((jQuery("#mail").val()!='')&& (jQuery("#mail2").val()!='')) if (jQuery("#mail").val()!=jQuery("#mail2").val()) {jQuery('#mmaile').show(); jQuery('#mmail2e').show();return false;}else { jQuery('#mmaile').hide();jQuery('#mmail2e').hide();}		
              
              if(!isMoyenneValid(jQuery("#moyenne").val())){jQuery('#mmoyenne').show();window.scroll(650,650);return false;}else {jQuery('#mmoyenne').hide();}		
                    

              if(jQuery('#nphe').val()==""){
                jQuery('#mnphe').show();
                window.scroll(600,800);
                return false;}else 
                {
                  var x=jQuery('#nphe').val();
                  xx=Math.floor(Math.log(x)/Math.LN10)+1;  
                  if(xx<9) {
                            jQuery('#mnphe').show(); 
                            return false;
                           } else jQuery('#mnphe').hide();
                  }
              

              
              
              
              if(jQuery('#npht').val()==""){jQuery('#mnpht').show();window.scroll(600,600);return false;}else {jQuery('#mnpht').hide();}
              



              if(jQuery('#npht').val()==""){
                jQuery('#mnpht').show();
                window.scroll(600,800);
                return false;}else 
                {
                  var x=jQuery('#npht').val();
                  xx=Math.floor(Math.log(x)/Math.LN10)+1;  
                  if(xx<9) {
                            jQuery('#mnpht').show(); 
                            return false;
                           } else jQuery('#mnpht').hide();
                  }
              





              if(jQuery('#nivs').val()==""){jQuery('#mnivs').show();window.scroll(680,680);return false;}else {jQuery('#mnivs').hide();}
              if(jQuery('#file2').val()==""){jQuery('#mfile2').show();window.scroll(800,800);return false;}else {jQuery('#mfile2').hide();}
              
              if(jQuery('#lip').val()==""){jQuery('#mlip').show();window.scroll(0,0);return false;}else {jQuery('#mlip').hide();}
              if(jQuery('#noma').val()==""){jQuery('#mnoma').show();window.scroll(0,0);return false;}else {jQuery('#mnoma').hide();}
              if(jQuery('#prenoma').val()==""){jQuery('#mprenoma').show();window.scroll(0,0);return false;}else {jQuery('#mprenoma').hide();}
              if(jQuery('#fonc').val()==""){jQuery('#mfonc').show();window.scroll(90,90);return false;}else {jQuery('#mfonc').hide();}
              if(jQuery('#entra').val()==""){jQuery('#mentra').show();window.scroll(150,150);return false;}else {jQuery('#mentra').hide();}
              if(jQuery('#adra').val()==""){jQuery('#madra').show();window.scroll(270,270);return false;}else {jQuery('#madra').hide();}
              if(jQuery('#npha').val()==""){jQuery('#mnpha').show();window.scroll(330,330);return false;}else {jQuery('#mnpha').hide();}
              if(jQuery('#mata').val()==""){jQuery('#mmata').show();window.scroll(400,400);return false;}else {jQuery('#mmata').hide();}
              if(jQuery('#dira').val()==""){jQuery('#mdira').show();window.scroll(520,520);return false;}else {jQuery('#mdira').hide();}

            }



            function codeTouche(evenement)
              {
                      for (prop in evenement)
                      {
                              if(prop == 'which') return(evenement.which);
                      }
                      return(evenement.keyCode);
              }


            function pressePapierNS6(evenement,touche)
              {
                      var rePressePapierNS = /[cvxz]/i;

                      for (prop in evenement) if (prop == 'ctrlKey') isModifiers = true;
                      if (isModifiers) return evenement.ctrlKey && rePressePapierNS.test(touche);
                      else return false;
              }


            function scanTouche(evenement)
            {
                    var reCarSpeciaux = /[\x00\x08\x0D\x03\x16\x18\x1A]/;
                    var reCarValides = /\d/;

                    var codeDecimal  = codeTouche(evenement);
                    var car = String.fromCharCode(codeDecimal);
                    var autorisation = reCarValides.test(car) || reCarSpeciaux.test(car) || pressePapierNS6(evenement,car);

                    return autorisation;
            }


            function isMoyenneValid(moyenne){
              var l = new RegExp(/^[0-9]+(.[0-9]+)?$/ );
              l.test(moyenne);
              var moy=0;
              moy=moyenne;
              moy=(moy*10)/10;
              if (l.test(moyenne)==true){
                if (moy>=7){ 
                  if (moy<20) {
                        return true; }}}
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
                  <p class="card-title mb-0"><h1 class="text-center" > <b> مؤسسة التعليم الثانوي </b></h1 > <br> <h4 class="text-center" > حي 350 مسكن الربوة الحمراء حسين داي  -الجزائر </h4 ><br>
                  <hr class="border-warning mt-1" width='90%' >

                  <div class="row mt-4">
                  
                  <div class='p-4 col-xl-12 col-lg-12 card shadow border text-left mb-4 '>
                  <p class="card-title mb-0"><h1 class="text-center" >   Le Candidat   -   المترشح </h1 > 
                  <hr class="border-warning"><br>
                  <?php if (isset($_GET['moyg'])) print "<p class='h3 text-danger text-center'>     معدل المترشح   لا يسمح لك بتسجيل في الثانوية ".$_GET['mo']." </p>";?>
                  <table width='100%' class="">    
                    <form enctype="multipart/form-data" method="POST" action="ins.php" onsubmit="return valideForm();">


<tr><td>
                    <table width='100%'><tr>
                    
                    <div class="form-group text-right">
                    <td width='10%'><label class="ml-4" id="mnomar">&nbsp; Champ Obligatoire</label></td>
                    <td width='30%'><input type="text" class="form-control form-control-sm keyboardInput " dir="rtl" name="nomar" id="nomar"  placeholder="" style="text-transform: uppercase"  value="<?php if (isset($_GET['nomar'])) print $_GET['nomar'];?>" onblur="testForm('nomar')"></td>
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;  اللقب </h3> </label></td>
                    
                    <div class="form-group"> 
                    <td width='10%' ><label id="mprenomar">&nbsp; Champ Obligatoire</label></td>
                    <td width='30%'> <input type="text" class="form-control form-control-sm keyboardInput " dir="rtl" name="prenomar" id="prenomar"  placeholder="" value="<?php if (isset($_GET['prenomar'])) print $_GET['prenomar'];?>" onblur="testForm('prenomar')" ></td>
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6 mr-4 " for="textarea"><h3>&nbsp;  الإسم </h3></label></td>
                    </div>

                    </div></tr></table>

</td></tr>          


<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h4>Nom &nbsp; </h4> </label></td>
                    <td width='30%'><input type="text" class="form-control form-control-sm" style="text-transform: uppercase" name="nome" id="nome"  placeholder="Nom.." value="<?php if (isset($_GET['nome'])) print $_GET['nome'];?>" onblur="testForm('nome')" ><td>
                    <td width='10%'><label id="mnome">&nbsp; Champ Obligatoire</label></td>
                    </div>

                    <div class="form-group text-right">
   
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6" for="textarea"><h4>Prénom </h4></label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm " name="prenome" id="prenome" style="text-transform: uppercase" placeholder="Prénom ..." value="<?php if (isset($_GET['prenome'])) print $_GET['prenome'];?>" onblur="testForm('prenome')" ></td>
                    <td width='10%'><label id="mprenome">&nbsp; Champ Obligatoire</label></td>
            
                    </div>
                    </tr></table>

</td></tr>          

<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    
                    <td width='10%'><label id="msexe">&nbsp; Champ Obligatoire</label></td>
                    <td width='30%'>
                    <select name="sexe" id="sexe"  class="form-control form-control-sm" onblur="testForm('sexe')">

                    <?php if (isset($_GET['sexe'])&&($_GET['sexe']=='M')) print '<option value ="'.$_GET['sexe'].'">ذكر</option>';?>
                    <?php if (isset($_GET['sexe'])&&($_GET['sexe']=='F')) print '<option value ="'.$_GET['sexe'].'">أنثى</option>';?>

                    <option value=''></option>
     
                      <option value='M'>ذكر</option>";
                      <option value='F'>أنثى</option>";

                      </select>
                    <td>
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp; الجنس </h3> </label></td>
                    
                    </div>

                    <div class="form-group text-right">
   
                    <td width='10%' ><label id="mdatn">&nbsp; Champ Obligatoire ! ou Date Nais < 14 </label></td>
                    <td width='30%' ><input type="date"  class="form-control form-control-sm" name="datn" id="datn" value="<?php if (isset($_GET['datn'])) print $_GET['datn'];?>" onblur="testForm('datn')" ></td>
                    
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;تاريخ الميلاد</h3> </label></td>
                    </div>
                    </tr></table>

</td></tr>




<tr><td>
                    <table width='100%'><tr>

                    <div class="form-group text-right">
   
                    <td width='10%' ><label id="mcnais">&nbsp; Champ Obligatoire  </label></td>
                    <td width='30%' >
                      
                    <select name="cnais" id="cnais"  class="form-control form-control-sm" onblur="testForm('cnais')" >

                         
                    <?php if (isset($_GET['cnais'])) print '<option value ="'.$_GET['cnais'].'">'.$_GET['clieu'].'</option>';?>
                    <option value=''></option>
                    

                    </select>
     
     
                        <input input type="text" class="form-control form-control-sm keyboardInput " dir="rtl" name="autre_lieu" id="autre_lieu"  placeholder="" value="<?php if (isset($_GET['lieu'])) print $_GET['lieu'];?>" onblur="testForm('autre')">
                        </td>
                    
                    <td width='10%' class="text-right" ><label id='lcnais' class="text-gray-100 h6" for="textarea"><h3>&nbsp;بلدية الميلاد</h3>  </label><label id="autre" class="text-gray-100 h6" for="textarea"><h3> مكان الإزياد </h3></label></td></td>
                    </div>

                    <div class="form-group"> 
                    <td width='10%'><label id="mwnais">&nbsp; Champ Obligatoire</label></td>
                    <td width='30%' >
                    <select name="wnais" id="wnais"  class="form-control form-control-sm " onchange="fetch_select(this.value);" onblur="testForm('wnais')">

                    <?php if (isset($_GET['wnais'])) print '<option value ="'.$_GET['wnais'].'">'.$_GET['wlieu'].'</option>';?>
                    
                    <option value=''></option>
     
                        <?php

                            $connect=$path.'Config/connect_news.php';
                            include($connect);

                            $sqll=' SELECT * FROM wilaya';

                            $reqq = $con->query($sqll);
                            
                            

                            while($row = $reqq->fetch()) {
                              echo "<option value='".$row["CODE_W"]."'>".$row["WILAYAA"]."</option>";
                              }

                        ?>
                    
                       <option value ="Autre">بلد آخر</option>                   



                      </select>
                    <td>
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;ولاية الميلاد</h3> </label></td>
                    
                    </div>

                    </tr></table>

</td></tr>          


<tr><td>
                      <table width='100%'><tr>
                      <div class="form-group">
                      <td width='10%'><label id="madr">&nbsp; Champ Obligatoire !</label></td>
                      <td width='80%'><input type="text" class="form-control form-control-sm keyboardInput " dir="rtl" name="adr" id="adr"  placeholder="Adresse..." value="<?php if (isset($_GET['adr'])) print $_GET['adr'];?>" onblur="testForm('adr')"></td>
                      <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;العنوان</h3></label></td>
                                            
                      </div>
                      </tr></table>

</td></tr>

<tr><td>
                    <table width='100%'><tr>
                    
                    <div class="form-group text-right">
                    <td width='10%' ><label id="mcadr">&nbsp; Champ Obligatoire  </label></td>
                  
                    <td width='30%' >
                      
                    <select name="cadr" id="cadr"  class="form-control form-control-sm" onblur="testForm('cadr')">

                    <?php if (isset($_GET['cadr'])) print '<option value ="'.$_GET['cadr'].'">'.$_GET['calieu'].'</option>';?>
                    <option value=''></option>

                    </select>
                    
                    </td>
                    
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6" for="textarea"> <h3>&nbsp;البلدية </h3> </label></td>
                    </div>

                    <div class="form-group"> 
                    <td width='10%'><label id="mwadr">&nbsp; Champ Obligatoire</label></td>
                    <td width='30%'>
                    <select name="wadr" id="wadr"  class="form-control form-control-sm" onchange="fetch_select_adr(this.value);" onblur="testForm('wadr')">


                    <?php if (isset($_GET['wadr'])) print '<option value ="'.$_GET['wadr'].'">'.$_GET['walieu'].'</option>';?>
                    <option value=''></option>

                   

                  <?php

                      $connect=$path.'Config/connect_news.php';
                      include($connect);

                      $sqll=' SELECT * FROM wilaya';

                      $reqq = $con->query($sqll);
                      
                      

                      while($row = $reqq->fetch()) {
                        echo "<option value='".$row["CODE_W"]."'>".$row["WILAYAA"]."</option>";
                        }

                  ?>


                  </select>
                    <td>

                    
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;الولاية </h3> </label></td>
                    </div>

                    
                    </tr></table>

</td></tr>         


<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%'><label id="mnphe">&nbsp; Erreur de Formalisation !</label></td>                    
                    <td width='30%'><input type="text" maxlength="10" class="form-control form-control-sm" name="nphe" id="nphe"  placeholder="Téléphone..." value="<?php if (isset($_GET['nphe'])) print $_GET['nphe'];?>" onKeyPress="return scanTouche(event);" onblur="testForm('nphe');" ><td>
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"> <h3>&nbsp; هاتف المترشح </h3></label></td>
                    </div>

                    <div class="form-group text-right">
                    <td width='10%'><label id="mnpht">&nbsp; Erreur de Formalisation !</label></td>   
                    <td width='30%' ><input type="text" maxlength="10" class="form-control form-control-sm" name="npht" id="npht"  placeholder="Téléphone..." value="<?php if (isset($_GET['npht'])) print $_GET['npht'];?>" onKeyPress="return scanTouche(event);" onblur="testForm('npht');" ></td>
                    <td width='10%' class="text-right"><label class="text-gray-100 " for="textarea"><h3>&nbsp;هاتف الأب </h3></label></td>

                    </div>
                    </tr></table>

</td></tr> 

<tr><td>
                    <table width='100%'><tr>

                    <div class="form-group">
                    <td width='10%'><label id="mnphf"> </label></td>
                    <td width='30%' ><input type="text" maxlength="10" class="form-control form-control-sm" name="nphf" id="nphf"  placeholder="Téléphone Fixe..." value="<?php if (isset($_GET['nphf'])) print $_GET['nphf'];?>" onKeyPress="return scanTouche(event);" onblur="testForm('nphf');" ></td>
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6 text-right" for="textarea"> <h3>&nbsp;الهاتف الثابت </h3></label></td>
                    </div>
                    
                    <div class="form-group"> 

                    
                    <td width='10%'><label id="mmail">&nbsp; Erreur de Formalisation !</label > <label id="mmaile">&nbsp; Vérifier Votre Email</label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm" name="mail" id="mail"  placeholder="E-mail..." value="<?php if (isset($_GET['mail'])) print $_GET['mail'];?>" onblur="testForm('mail')" ></td>
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;العنوان الإلكتروني</h3></label></td>
                    </tr></table>

</td></tr>  


<tr><td>
                    <table width='100%'><tr>

                    <div class="form-group"> 
            
            <td width='10%'>  <label id="mnivs">&nbsp; Champ Obligatoire </label></td>
            <td width='30%' >
              
            <select name="nivs" id="nivs"  class="form-control form-control-sm" onblur="testForm('nivs')" onchange="testMoy();">


                
            

            <?php if (isset($_GET['nivs'])) print '<option value ="'.$_GET['nivs'].'">'.$_GET['niveau'].'</option>';?>
         
             <option value=''></option>
           
                  <?php

                      $connect=$path.'Config/connect_news.php';
                      include($connect);

                      $sqll=' SELECT * FROM equivalent_niveau_etablissement ';

                      $reqq = $con->query($sqll);
                      
                      

                      while($row = $reqq->fetch()) {
                          echo "<option value='".$row["id"]."'>".$row["designation"]."</option>";
                        }

                  ?>



                </select>
            <td>
            
            <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;المستوى الدراسي الحالي  </h3></label></td>
            </div>
 
                    
                    <div class="form-group"> 

                    
                    <td width='10%'><label id="mmail2">&nbsp; Erreur de Formalisation !</label><label id="mmail2e">&nbsp; Vérifier Votre Email</label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm" name="mail2" id="mail2"  placeholder="E-mail..." value="<?php if (isset($_GET['mail'])) print $_GET['mail'];?>" onblur="testForm('mail2')" ></td>
                    <td width='10%' class="text-right" ><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;تأكيد العنوان الإلكتروني  </h3></label></td>
                    </tr></table>

</td></tr>  



<tr><td>
                    <table width='100%'><tr>

                    <div class="form-group">
                    <td width='10%' class="text-right" ><label id="mmoyenne"> &nbsp; هذا المعدل لا يسمح لك بالتسجيل </label></td>
                    <td width='30%' class="text-right" ><input type="text" maxlength="5" class="form-control form-control-sm" name="moyenne" id="moyenne"  placeholder="" value="<?php if (isset($_GET['moyenne'])) print $_GET['moyenne'];?>" onblur="testForm('moyenne')"    ></td>
                    <td width='10%' class="text-right" ><label name="lmoy" id="lmoy"  class="text-gray-100 h6 text-right" for="textarea"> <h3>&nbsp; المعدل السنوي  </h3></label></td>
                    </div>      

                    <div class="form-group">
   
                    <td width='10%' ><input type="hidden" name="MAX_FILE_SIZE" value="41943040" />  
                    <label id="mfile2"> &nbsp; Champ Obligatoire </label></td>
                    <td width='30%' >
                    <input type="hidden" name="fichier2" value="fichier2" />
                    <input name="file2" type="file" size="30" id="file2" class="form-control form-control-sm"  accept="image/*" onblur="testForm('file2')" ></td>
                    <td width='10%' class="text-right"><label class="text-gray-100 h6" for="textarea"><h3>&nbsp;صورة المترشح </h3></label></td>
            
                    </div>

                    </tr></table>

</td></tr>



</table> 


</div>
                  <div class='p-4 col-xl-12 col-lg-12 card shadow border text-left mb-4 '>

                  <p class="card-title mb-0"><h1 class="text-center" >   L'Agent   -   العون </h1 >
                  <hr class="border-warning"><br>
                  <table width='100%'  class="">    
                  

                  
<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%'><label class="text-gray-100 h6" for="textarea">Nom </label></td>
                    <td width='30%'><input type="text" class="form-control form-control-sm" style="text-transform: uppercase" name="noma" id="noma"  placeholder="Nom.." value="<?php if (isset($_GET['noma'])) print $_GET['noma'];?>" onblur="testForm('noma')" ><td>
                    <td width='10%'><label id="mnoma">&nbsp; Champ Obligatoire</label></td>
                    </div>

                    <div class="form-group text-right">
   
                    <td width='10%' ><label class="text-gray-100 h6" for="textarea">Prénom </label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm " name="prenoma" id="prenoma" style="text-transform: uppercase" placeholder="Prénom ..." value="<?php if (isset($_GET['prenoma'])) print $_GET['prenoma'];?>" onblur="testForm('prenoma')" ></td>
                    <td width='10%'><label id="mprenoma">&nbsp; Champ Obligatoire</label></td>
            
                    </div>
                    </tr></table>

</td></tr> 

<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%'><label class="text-gray-100 h6" for="textarea">Lien de parenté </label></td>
                    <td width='30%'>
                      
                    <select name="lip" id="lip"  class="form-control form-control-sm" onblur="testForm('lip')" value="<?php if (isset($_GET['lip'])) print $_GET['lip'];?>" >

                    <?php if (isset($_GET['lip'])&&($_GET['lip']=='DD')) print '<option value ="'.$_GET['lip'].'">Père ou Mére</option>';?>
                    
                    <option value=''></option>
                   
                      <option value='DD'>Père</option>";
                      <option value='DD'>Mére</option>";
                      <option value='DI'>Autre</option>";              
                      </select>

                      <td width='10%'><label id="mlip">&nbsp; Champ Obligatoire </label></td>
                    
                    </div>

                    <div class="form-group">
   
                    <td width='10%' ><label class="text-gray-100 h6" for="textarea">Fonction </label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm" name="fonc" id="fonc"  placeholder="Fonction ..." value="<?php if (isset($_GET['fonc'])) print $_GET['fonc'];?>"  onblur="testForm('fonc')" ></td>
                    <td width='10%'><label id="mfonc">&nbsp; Champ Obligatoire </label></td>
            
                    </div>
                    </tr></table>

</td></tr> 
                    

<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%'><label class="text-gray-100 h6" for="textarea">Entreprise </label></td>
                    <td width='30%'>
                      
                    <select name="entra" id="entra"  class="form-control form-control-sm" onblur="testForm('entra')">
                    
                    <?php if (isset($_GET['entra'])) print '<option value ="'.$_GET['entra'].'">'.$_GET['entra'].'</option>';?>
   
                    <option value =''  ></option>
                    <option value ='SONATRACH'>SONATRACH</option>
 	                   <option value ='NAFTAL'>NAFTAL</option>
                      <option value ='ENTP'>ENTP</option>
                      <option value ='ENSP'>ENSP</option>
                      <option value ='ENAFOR'>ENAFOR</option>
                      <option value ='ENGTP'>ENGTP</option>
                      <option value ='ENGCB'>ENGCB</option>
                      <option value ='ENAC'>ENAC</option>
                      <option value ='2 SP'>2 SP</option>
                      <option value ='CASH'>CASH</option>
                      <option value ='ENAGEO'>ENAGEO</option>
                      <option value ='MIP'>MIP</option>
                      <option value ='TASSILI AIRLINES'>TASSILI AIRLINES</option>
                      <option value ='GSP - MCA'>GSP - MCA</option>
                      <option value ='HELIOS SPA'>HELIOS SPA</option>
                      <option value ='COGIZ'>COGIZ</option>
                      <option value ='SOMIK'>	SOMIK</option>
                      <option value ='SOTRAZ'>SOTRAZ</option>
                      <option value ='HYPROC'>HYPROC</option>
                      <option value ='NAFTOGAZ'>NAFTOGAZ</option>
                      <option value ='SARPI SPA'>SARPI SPA</option>
                      <option value ='IAP'>IAP</option>
                      <option value ='STH'>STH</option>
                      <option value ='SYNDICAT NATIONAL SONATRACH'>SYNDICAT NATIONAL SONATRACH</option>
                      <option value ='MINISTÈRE DE L’ÉNERGIE'>MINISTÈRE DE L’ÉNERGIE</option>

                      </select>

                     <td width='10%'><label id="mentra">&nbsp; Champ Obligatoire </label></td>
                    
                    </div>

                    <div class="form-group">
   
                    <td width='10%' > <label class="text-gray-100 h6" for="textarea">Direction </label></td>
                    <td width='30%' >
                    <input type="text" class="form-control form-control-sm" name="dira" id="dira"  placeholder="Direction de l'agent..." value="<?php if (isset($_GET['dira'])) print $_GET['dira'];?>" onblur="testForm('dira')" ></td>
                    <td width='10%'><label id="mdira">&nbsp; Champ Obligatoire </label></td>
            
                    </div>
                    </tr></table>

</td></tr>

                    
 

<tr><td>
                    <table width='100%'><tr>
                    <div class="form-group"> 
                    <td width='10%' ><label class="text-gray-100 h6" for="textarea">Matricule l'Agent</label></td>
                    <td width='30%' ><input type="text" class="form-control form-control-sm" name="mata" id="mata"  placeholder="Matricule de l'agent..." value="<?php if (isset($_GET['mata'])) print $_GET['mata'];?>" onblur="testForm('mata')" ></td>
                    <td width='10%'><label id="mmata">&nbsp; Champ Obligatoire </label></td>
                    
                    </div>

                    <div class="form-group">
   
            
                    <td width='10%'>   <label class="text-gray-100 h6" for="textarea">Téléphone l'Agent</label></td>
                    <td width='30%'><input type="text" maxlength="10" class="form-control form-control-sm" name="npha" id="npha"  placeholder="Téléphone de l'agent..." value="<?php if (isset($_GET['npha'])) print $_GET['npha'];?>" onKeyPress="return scanTouche(event);" onblur="testForm('npha')"></td>                      
                    <td width='10%'>  <label id="mnpha">&nbsp; Champ Obligatoire </label></td>
            
            
                    </div>
                    </tr></table>

</td></tr>

<tr><td>
                    <table width='100%'><tr>
                    
                    <div class="form-group">
   
                    <td width='10%' ><label class="text-gray-100 h6" for="textarea">Adresse Entreprise</label></td>
                    <td width='80%' ><input type="text" class="form-control form-control-sm" name="adra" id="adra"  placeholder="Adresse..." value="<?php if (isset($_GET['adra'])) print $_GET['adra'];?>" onblur="testForm('adra')" ></td>
                    <td width='10%'><label id="madra">&nbsp; Champ Obligatoire </label></td>
                    </div>


                    </tr></table>

</td></tr></table> 

                  </div>
                  
              </div>
              <div class="row mt-4">
                <div class='col-xl-1 col-lg-1'>  </div>
                  <div class='p-4 col-xl-9 col-lg-9 card shadow border text-left mb-4 '>
                  <hr class="border-warning"><br>

                  <div class='row'>
                  <div class='col-xl-4 col-lg-4 '> </div>
                  
                  <div class="form-group text-center col-xl-4 col-lg-4 p-4"> 
                  <label class="font-weight-bold text-gray-100" for="textarea">Veuillez Entrée Code </label>
                  <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
                  <input type="text" name="captcha" class="form-control form-control-sm" />
                  <?php if (isset($_GET['tcpa'])) print "<p class='text-danger'>Erreur Code, cliquer sur l'image pour charger un autre code</p>";?>
                  
                  </div>
                  <div class='col-xl-4 col-lg-4 '> </div>

                  </div>
                  
                  <div class="form-group text-center"> 


                        <input type="submit" name='submit' class="btn btn-primary"   value="Validation">
                        <input type="reset" name='reset' class="btn btn-primary"  value="Initialiser"><br><br> 



                  </div>

                  

                  </form>

                  </div></div>
                  </div>


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

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center bg bg-warning">
      <h3 class="modal-title  "> مؤسسة التعليم الثانوي - حي 350 مسكن الربوة الحمراء حسين داي  -الجزائر </h3 >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <?php 	
                
                $sqll='Select * from moyenne_etablissement ;';
								$reqq = $con->query($sqll);
								
								$row_moy = $reqq->fetch();
								
								$cnag=$row_moy[1];
								$moy_adm=$row_moy[0];
								
		      ?>
        <?php if (isset($_GET['moyg'])) print "<p class='h3 text-danger text-center'>     معدل المترشح   لا يسمح لك بتسجيل في الثانوية ".$_GET['mo']." </p>"; else print '<h3 class="text-danger text-right">'.$cnag.' (CNEG)   ملاحظة للمترشحين ،بالنسبة  السنة الرابعة متوسط معدل  ​​القبول    </h3><img src="images/formation.png" alt="" width="100%">';?>          
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
</body>

</html>

