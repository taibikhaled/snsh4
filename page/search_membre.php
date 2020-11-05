<?php
$fp = fopen ("path.php", "r");
$path = fgets ($fp, 255);
fclose ($fp);

$_SESSION['path']=$path;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Recherche du Personnel CTTP</title>
 
		<?php
	 $base_css=$path.'page/base_css.php';
	 include($base_css);
	 
	 $base_search=$path.'page/base_search.php';
	 include($base_search);
	 
			
	?> 
		<script>
			$(function () { 
				$('input#id_search').quicksearch('table#table_search tbody tr');
				
				});
			
		</script>


		<script language="javascript">

			function Reporter(m, n ) {
				var matricule=m;
				var nom=n;
				
				
				//console.log(arguments[0]);

				window.opener.document.forms["mat"].elements["from_nom"].value=nom;
				window.opener.document.forms["mat"].elements["from_id"].value=matricule;
				
				window.close();
				
			}
		</script>

		<?php




		$connect=$path.'Config/connect_login.php';
		include($connect);

		$sqll="Select * from users_membre";
  		$reqq = $con->query($sqll);


		error_reporting(0);

		?> 

	</head>

	<body class="p-4"> 
	
	<div class="col-xl-12 col-lg-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

	<h5 class="m-0 font-weight-bold text-primary">Recherche du Personnel Membre</h5>

		

		

		<nav class="nav justify-content-end  m-0"> <!-- menu simple -->
                          

		<div class="input-group ">
              <input type="text" class="form-control border-0 small" type="search" name="search" value="" id="id_search" placeholder="Rechercher" autofocus aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>

	  		
		</nav>

		</div>
    </div>
	</div>

		   <div class="card-body card shadow m-0 text-gray-900">
          

                 <div class="row">  
			
		<table id="table_search" class="table table-bordered table-sm table-hover table-list text-left" >
			<thead class="text-primary">
				<tr>
					
					<th width="20%">Nom et Prénom</th>
					
					<th width="10%">Matricule</th>
					<th width="10%">Date de Naissance</th>
					
					<th width="30%">Etablissement</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
		            
					while($row = $reqq->fetch()) {
				  
						$sql='Select * from users_membre where id='.$row['id'];

						$req = $con->query($sql);

						$ro = $req->fetch();
						
						$image3=$_SESSION['path'].'backup/Espace_membre/Photos/'.$ro["img"];



						$i=$i+1;
					  
					  echo '<tr>'; 

					  
					  
					  echo '<td><a class="text-gray-900" href=# onclick="Reporter(`'.$row[0].'`,`'.$row[4].'`)"><img class="rounded-circle" width="25%" src="'.$image3.'" alt=""> ' .$row[4].'</a></td>'; 
					  
					  
					  echo '<td><a class="text-gray-900" href=# onclick="Reporter(`'.$row[0].'`,`'.$row[4].'`)">' .$row[3].'</a></td>';
					  echo '<td><a class="text-gray-900" href=# onclick="Reporter(`'.$row[0].'`,`'.$row[4].'`)">'. $row[5].'</a></td>'; 
		              echo '<td><a class="text-gray-900" href=# onclick="Reporter(`'.$row[0].'`,`'.$row[4].'`)">'. $row[7].'</a></td>';  
					  
					  echo '</tr>';


	
					} 
		        
               
          ?>
		    </tbody>
			</table>

			</div>
	</div>

	</body>
</html>