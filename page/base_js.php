


  <?php

$s=$path.'vendors/base/vendor.bundle.base.js';
$s1=$path.'js/Chart.min.js';
$s2=$path.'vendors/datatables.net/jquery.dataTables.js';
$s3=$path.'vendors/datatables.net-bs4/dataTables.bootstrap4.js';
$s4=$path.'js/off-canvas.js';
$s5=$path.'js/hoverable-collapse.js';
$s6=$path.'js/jquery.dataTables.js';
$s7=$path.'js/dataTables.bootstrap4.js';
$s8=$path.'js/jquery.js';
$s9=$path.'js/jquery-2.2.4.min.js';
$s10=$path.'js/keyboard.js';


echo '<script src="'.$s.'"></script>';
echo '<script src="'.$s1.'"></script>';
echo '<script src="'.$s2.'"></script>';
echo '<script src="'.$s3.'"></script>';
echo '<script src="'.$s4.'"></script>';
echo '<script src="'.$s5.'"></script>';
echo '<script src="'.$s6.'"></script>';
echo '<script src="'.$s7.'"></script>';
echo '<script src="'.$s8.'"></script>';
echo '<script src="'.$s9.'"></script>';
echo '<script src="'.$s10.'"></script>';




?>


<script>

var n="<?php echo $path;?>";
var id="<?php echo $_COOKIE["id_user"];?>";

$(document).ready(function() {
      
  

  $("#messageDropdown").click(function() {
      
      $('#resultat').html('');

      $.ajax({
        type: "GET",
        url: n+'page/load-data.php?id='+id, 
        data: {},
        success: function(data){
          if (data != ""){
      //console.log(url);
            $('#resultat').append(data);
          }else {
              document.getElementById('resultat').innerHTML="<div class='text-danger text-center mt-2'></div>"
          }
            
        
        }
      });
    });
      
  });   
  
  
function charger(){

      setTimeout( function(){
        
     

        $('#compteur').html('');

        $.ajax({
          type: "GET",
          url: n+'page/load-compteur.php?id='+id, 
          data: {},
          success: function(data){
            if (data != ""){
        //console.log(url);
              $('#compteur').append(data);
            }else {
                document.getElementById('compteur').innerHTML="0"
            }
              
          
          }
        });
        
        

        charger();
        
        

      }, 40000);   




      }
charger();


// alertes


$(document).ready(function() {
      
      $("#alertsDropdown").click(function() {
          
          $('#resultat_alerte').html('');
    
          $.ajax({
            type: "GET",
            url: n+'page/load-data_alerte.php?id='+id, 
            data: {},
            success: function(data){
              if (data != ""){
          //console.log(url);
                $('#resultat_alerte').append(data);
              }else {
                  document.getElementById('resultat_alerte').innerHTML="<div class='text-danger text-center mt-2'></div>"
              }
                
            
            }
          });
        });
          
      });   
      
      function charger_alerte(){
    
    setTimeout( function(){
      
      $('#compteur_alerte').html('');

      $.ajax({
        type: "GET",
        url: n+'page/load-compteur_alerte.php?id='+id, 
        data: {},
        success: function(data){
          if (data != ""){
      //console.log(url);
            $('#compteur_alerte').append(data);
          }else {
              document.getElementById('compteur_alerte').innerHTML="0"
          }
            
        
        }
      });
      
      charger_alerte();



      $('#resultat_alerte').html('');
    
      $.ajax({
        type: "GET",
        url: n+'page/load-data_alerte.php?id='+id, 
        data: {},
        success: function(data){
          if (data != ""){
      //console.log(url);
            $('#resultat_alerte').append(data);
          }else {
              document.getElementById('resultat_alerte').innerHTML="<div class='text-danger text-center mt-2'></div>"
          }
            
        
        }
      });
      
    }, 40000);   




    }
charger_alerte();

</script>

