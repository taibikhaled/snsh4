<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);



  //Affichage des erreurs php
  error_reporting(E_ALL);
  ini_set('display-errors','on');
  
  //démarrage des sessions
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
  

  
  

<script type="text/javascript">

function fcte(fiche)
            {
            msg=window.open(fiche,'fenetre','width=800,height=600,toolbar=no,location=no,status=no,menubar=no,resizable=no,top=250,left=500');
            msg.focus();
            }


</script> 

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

          <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body ">
                  <h4 class="card-title  "><a href='../index.php'>Administration</a>  -<a href='index.php'> Inscriptions</a> - Statistiques</h4>
              <hr>
                            
                <?php 



                $connect_news=$path.'Config/connect_news.php';
                include($connect_news);

                $sql="SELECT a.id, a.dat, a.NOME, a.PRENOME, a.DATN, (c.designation) as NIVEAU, b.designation, b.choix FROM `inscription_bejaia` a, `inscription_bejaia_choix` b, `equivalent_niveau_bejaia` c where (a.id=b.id_inscription) and (a.nivs=c.id) and (b.choix='1') order by a.id";

                $req = $con->query($sql);

                $count = $req->rowCount();
                print "<div class='h2 text-center m-4'>Nombre d'inscriptions : ". $count."</div>";
                ?>  
              <div class="row m-1">

                                  
              <div class="col-xl-6 col-lg-6">

                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Inscriptions par Sexe </h6>
                    </div>
                    <div class="card-body">
                      
                      <canvas id="pieChart"></canvas>
                    </div>
                    </div>





                    <?php

                    $connect_news=$path.'Config/connect_news.php';
                    include($connect_news);

                    // femme

                    $annee=date('Y');


                    $sqll="select count(id) from inscription_bejaia where sexe='F' ";
                        
                    $reqq = $con->query($sqll);

                    $row = $reqq->fetch();


                    $lf='FEMME';

                    $af=$row[0];

                    //homme

                    $sqll="select count(id) from inscription_bejaia where sexe='M' ";
                        
                    $reqq = $con->query($sqll);

                    $row = $reqq->fetch();


                    $lm='HOMME';

                    $am=$row[0];


                    $label=array();
                    $data=array();


                    $label[0]=$lf;
                    $label[1]=$lm;



                    $data[0]=$af;
                    $data[1]=$am;




                    $Labels_Json = json_encode($label);
                    $Data_Json = json_encode($data, JSON_NUMERIC_CHECK);

                    ?>


    </div>
            
                                
                                

    <div class="col-xl-6 col-lg-6">

<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Inscriptions par Date </h6>
</div>
<div class="card-body">
  
  <canvas id="lineChart"></canvas>
</div>
</div>





<?php

$connect_news=$path.'Config/connect_news.php';
include($connect_news);


$annee=date('Y');

$label=array();
$data=array();

$sqll="SELECT DATE(DAT), count(ID) FROM `inscription_bejaia` GROUP by DATE(DAT)";
    
$reqq = $con->query($sqll);

while($row = $reqq->fetch()) {

  $label[]=$row[0];
  $data[]=$row[1];

}


$Labels_Json_a = json_encode($label);
$Data_Json_a = json_encode($data, JSON_NUMERIC_CHECK);

?>


</div>

</div>
<div class="row">

<div class="col-xl-12 col-lg-12">

<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">Inscriptions par Spécialités</h6>
</div>
<div class="card-body">
  
  <canvas id="barChart"></canvas>
</div>
</div>





<?php

$connect_news=$path.'Config/connect_news.php';
include($connect_news);

// femme

$annee=date('Y');

$label=array();
$data=array();

$sqll="SELECT id_formation, designation, COUNT(id_inscription) FROM `inscription_bejaia_choix` WHERE choix=1 group by id_formation, designation ";
    
$reqq = $con->query($sqll);

while($row = $reqq->fetch()) {

  $label[]=$row[1];
  $data[]=$row[2];

}




$Labels_Json_b = json_encode($label);
$Data_Json_b = json_encode($data, JSON_NUMERIC_CHECK);

?>



                </div>

                              


</div>
</div></div>
                    
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
<script >

$(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  var data = {
    labels: <?php echo $Labels_Json_b; ?>,
    datasets: [{
      label: '# Premier Choix',
      data: <?php echo $Data_Json_b; ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

  var data2 = {
    labels: <?php echo $Labels_Json_a; ?>,
    datasets: [{
      label: '# Nombre des inscris' ,
      data: <?php echo $Data_Json_a; ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };
  
  var multiLineData = {
    labels: <?php echo $Labels_Json_a; ?>,
    datasets: [{
        label: 'Dataset 1',
        data: <?php echo $Data_Json_a; ?>,
        borderColor: [
          '#587ce4'
        ],
        borderWidth: 2,
        fill: false
      },
      {
        label: 'Dataset 2',
        data: <?php echo $Data_Json; ?>,
        borderColor: [
          '#ede190'
        ],
        borderWidth: 2,
        fill: false
      },
      {
        label: 'Dataset 3',
        data: <?php echo $Data_Json; ?>,
        borderColor: [
          '#f44252'
        ],
        borderWidth: 2,
        fill: false
      }
    ]
  };
  var options = {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    legend: {
      display: false
    },
    elements: {
      point: {
        radius: 0
      }
    }

  };
  var doughnutPieData = {
    datasets: [{
      data: <?php echo $Data_Json; ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: <?php echo $Labels_Json; ?>
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
  var areaData = {
    labels: <?php echo $Labels_Json; ?>,
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

  var multiAreaData = {
    labels: <?php echo $Labels_Json_a; ?>,
    datasets: [{
        label: 'Facebook',
        data: <?php echo $Data_Json_a; ?>,
        borderColor: ['rgba(255, 99, 132, 0.5)'],
        backgroundColor: ['rgba(255, 99, 132, 0.5)'],
        borderWidth: 1,
        fill: true
      },
      {
        label: 'Twitter',
        data: <?php echo $Data_Json; ?>,
        borderColor: ['rgba(54, 162, 235, 0.5)'],
        backgroundColor: ['rgba(54, 162, 235, 0.5)'],
        borderWidth: 1,
        fill: true
      },
      {
        label: 'Linkedin',
        data: <?php echo $Data_Json; ?>,
        borderColor: ['rgba(255, 206, 86, 0.5)'],
        backgroundColor: ['rgba(255, 206, 86, 0.5)'],
        borderWidth: 1,
        fill: true
      }
    ]
  };

  var multiAreaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    },
    elements: {
      point: {
        radius: 0
      }
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  var scatterChartData = {
    datasets: [{
        label: 'First Dataset',
        data: [{
            x: -10,
            y: 0
          },
          {
            x: 0,
            y: 3
          },
          {
            x: -25,
            y: 5
          },
          {
            x: 40,
            y: 5
          }
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)'
        ],
        borderWidth: 1
      },
      {
        label: 'Second Dataset',
        data: [{
            x: 10,
            y: 5
          },
          {
            x: 20,
            y: -30
          },
          {
            x: -25,
            y: 15
          },
          {
            x: -10,
            y: 5
          }
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      }
    ]
  }

  var scatterChartOptions = {
    scales: {
      xAxes: [{
        type: 'linear',
        position: 'bottom'
      }]
    }
  }
  // Get context with jQuery - using jQuery's .get() method.
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: options
    });
  }

  if ($("#lineChart").length) {
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data2,
      options: options
    });
  }

  if ($("#linechart-multi").length) {
    var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
    var lineChart = new Chart(multiLineCanvas, {
      type: 'line',
      data: multiLineData,
      options: options
    });
  }

  if ($("#areachart-multi").length) {
    var multiAreaCanvas = $("#areachart-multi").get(0).getContext("2d");
    var multiAreaChart = new Chart(multiAreaCanvas, {
      type: 'line',
      data: multiAreaData,
      options: multiAreaOptions
    });
  }

  if ($("#doughnutChart").length) {
    var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }

  if ($("#areaChart").length) {
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    var areaChart = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaData,
      options: areaOptions
    });
  }

  if ($("#scatterChart").length) {
    var scatterChartCanvas = $("#scatterChart").get(0).getContext("2d");
    var scatterChart = new Chart(scatterChartCanvas, {
      type: 'scatter',
      data: scatterChartData,
      options: scatterChartOptions
    });
  }

  if ($("#browserTrafficChart").length) {
    var doughnutChartCanvas = $("#browserTrafficChart").get(0).getContext("2d");
    var doughnutChart = new Chart(doughnutChartCanvas, {
      type: 'doughnut',
      data: browserTrafficData,
      options: doughnutPieOptions
    });
  }
});
</script>
</body>

</html>

