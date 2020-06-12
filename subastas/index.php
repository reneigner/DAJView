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
		
		#primero a {
			color:white !important;
		}
		
		.customPagination, .paginacaoCursor{
			margin: 20px 5px;
			padding: 5px 8px;
			color: #fff;
			background: #E19911;
			cursor: pointer;
		}
	</style>
</head>
<body>
	
	<div class="row">
	
		<div class="col-sm-1">
		</div>
	
		<div class="col-sm-10" style="margin-bottom:50px;">
		
			<h1 style="color:#E8B70D;"><b>Products </b></h1>
			<hr>
			
			<?php
			
				include("m/funciones.php");
			
				$tabla = getItemsAll();
				
			
			?>
			
			
			<div class="row">
	
				<div class="col-sm-1"></div>
	
	
				<div class="col-sm-10" style="background-color:gray; padding:30px; border: solid #E9E9E9 1px; border-radius:10px; background-color:#F8F8F8;" >
				

					
				
					<div class="container">
					
					

			<ul class="paginationTable list-group">
			
				<?php

					$arregloProds = array();
					$contador=0;
					foreach($tabla as $t) {
						$arregloProds[$contador] = $t['imagen'];
						$arregloIDS[$contador] = $t['id'];
						//Buscamos la puja maxima
						$puja_max = getPujasById($t['id']);
						$pm = $puja_max[0]['bid'];
						if($pm==0) {
							$pm=$t['precioInicial'];
						}
						$arregloPrecios[$contador] = $pm;
						$contador++;
					}
					
					
					$contador2=0;
					
					
					while($contador2<$contador) {  ?>
					
						<li class="tableItem list-group-item" style="width:75%;">
						
							<div class="row">
	
								<div class="col-sm-3"><img src='itemsImg/<?= $arregloProds[$contador2] ?> ' width='150px' />
								</div>
								
								<?php
									if(isset($arregloProds[$contador2])) { ?>
								
								<div class="col-sm-3">
									<form id="formulario_<?=$contador2?>" method="POST" onsubmit="return valida(<?=$contador2?>)">
										<p>Current price: $<?= number_format($arregloPrecios[$contador2]) ?></p>
										<input type="text" id="puja" name="puja" class="form-control">
										<input type="hidden" name="id" value="<?= $arregloIDS[$contador2]?>">
										<input type="hidden" name="precio" value="<?= $arregloPrecios[$contador2]?>">
										<br>
										<button type="submit" class="btn btn-warning">Bid</button>
										<br>
										<span id="letrero_mal_<?=$contador2?>" style="color:red;"> </span>
									</form>
								</div>
								
								<?php
								
									}
									
									if(isset($arregloProds[$contador2+1])) { ?>
								
								
									<div class="col-sm-3"><img src='itemsImg/<?= $arregloProds[$contador2+1] ?> ' width='150px' />
									</div>
									
									<div class="col-sm-3">
										<form id="formulario_<?=$contador2+1?>" method="POST" onsubmit="return valida(<?=$contador2+1?>)">
											<p>Current price: $<?= number_format($arregloPrecios[$contador2+1]) ?></p>
											<input type="text" id="puja" name="puja" class="form-control">
											<input type="hidden" name="id" value="<?= $arregloIDS[$contador2+1]?>">
											<input type="hidden" name="precio" value="<?= $arregloPrecios[$contador2+1]?>">
											<br>
											<button type="submit" class="btn btn-warning">Bid</button>
											<br>
											<span id="letrero_mal_<?=$contador2+1?>" style="color:red;"> </span>
										</form>
									</div>
									
								<?php
									}
								?>

							</div>
							

						</li>
				<?php
				
						$contador2+=2;
				
					}
					
				?>
			
			</ul>
			<div id="pagination-container">
				<p class='paginacaoCursor' id="beforePagination"><</p>
				<p class='paginacaoCursor' id="afterPagination">></p>
			</div>


			<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			<script type="text/javascript" src="HZpagination.js"></script>
			
			
				
			
			</div>
			
			<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-36251023-1']);
			  _gaq.push(['_setDomainName', 'jqueryscript.net']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

			</script>
				
				
				
				</div>
	
	
	
				<div class="col-sm-1"></div>
				

			</div>
	
		</div>
	
	
	
		<div class="col-sm-1">
		</div>
		
	</div>

</body>


<script>
var secondCall = false;
function valida(valor) {

    if (secondCall) {
        return;
    }
	$.ajax({url:'revisarPuja.php', 
        data: $('#formulario_'+valor).serialize(),
        type:'post',
        async:false,
        success: function(data) {
			if(data == 1) {
				secondCall = true;
				$.ajax({
					type: 'post',
					url: 'bid.php',
					data: $('#formulario_'+valor).serialize(),
					success: function () {
						document.getElementById("letrero_mal_"+valor).innerHTML = "Tu puja se ha enviado";
					}
				});
						
			} else {
				if(data == 2) {
					document.getElementById("letrero_mal_"+valor).innerHTML = "Tu puja debe ser mayor al precio actual";
				}	
				if(data == 3) {
					document.getElementById("letrero_mal_"+valor).innerHTML = "Tu puja debe ser numérica";
				}	
	
			}
		}
    });
	
    return false;
}
</script>


<?php

	include("footer.php");
	
?>

</html>