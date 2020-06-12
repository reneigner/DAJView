<?php

	include("header.php");
	
?>
<html>
<head>
	<title>DAJ Auction Live</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arsenal&display=swap" rel="stylesheet">
	<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
	<script src='funciones_pag.js'></script>
	
	<style>
		footer {
			background-color: #251D08;
			color: white;
			padding: 12px;
			position:relative;
			width:100%;
			bottom:0;
			box-shadow: 0 50vh 0 50vh #251D08;
		}
		
		body {
			font-family: 'Arsenal', sans-serif;
			
		}
		
		#tercero a {
			color:white !important;
		}
		
		@media only screen and (max-width: 767px) {
		
			#examplek {
				font-size:9px;
			}
			
		}
		
	</style>
</head>
<body>
	
	<div class="row">
	
		<div class="col-sm-1">
		</div>
	
		<div class="col-sm-10" style="margin-bottom:50px;">
		
			<h1 style="color:#E8B70D;"><b>Auctions </b></h1>
			<hr>
			
			<?php
			
				include("m/funciones.php");
			
				$tabla = getItems('cinthia');
				
			
			?>
			
			
			<div class="row">
	
				<div class="col-sm-1">
				
				
				</div>
	
	
				<div class="col-sm-10" >
				
					<div class="table-responsive" >
				
					<table id="examplek" class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Description</th>
								<th>Starting price</th>
								<th>Top price</th>
								<th>Creation date</th>
								<th>Winner</th>
								<th>Photo</th>
							</tr>
						</thead>
						<tbody>
							<?php
							
								$contador=1;
								foreach($tabla as $t) { ?>
								
								<tr>
									<th>Auction <?= $contador ?></th>
									<th><?= $t['descripcion'] ?></th>
									<th>$<?= $t['precioInicial'] ?></th>
									<th>$<?= $t['precioFinal'] ?></th>
									
									<?php
										
										$dato = explode(" ", $t['fechaCreacion']);
										
										$d1 = $dato[0];
										$d2 = $dato[2];
										$d3 = $dato[3];
									
									?>
									<th><?= $d2. " ".$d1. " ".$d3 ?></th>
									
									<?php
									
										$puj = getPujasById($t['id']);
										
									?>
									
									<?php
									
									
									if(count($puj)!=0) { 
									
										
									
									?>
									
										<th>
										
											
										
										
										<p><?=  $puj[0]['username'].": "."$".$puj[0]['bid'] ?></p>
										
										
											
										
										
										
										</th>
									
									<?php
									} else { ?>
									
									<th> 0 </th>
									
									<?php
									}
									?>
									
									
									<th><img src="itemsImg/<?=$t['imagen'] ?>" width='100px' /></th>
								</tr>
								
								
							<?php
									
									$contador++;
							
								}
							?>
					
					
						</tbody>
					</table>
					<script src='funciones_pag.js'></script>
					<script>  
						$(document).ready(function() {
							$('#examplek').DataTable();
						} );
					</script>
					</div>
					
				
				</div>
	
	
	
				<div class="col-sm-1">
				
				
				</div>
				
	
	
	
	
	
	
			</div>
	
		</div>
	
	
	
		<div class="col-sm-1">
		</div>
		
	</div>

</body>

<?php

	include("footer.php");
	
?>

</html>