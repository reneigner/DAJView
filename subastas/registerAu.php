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
		
		#segundo a {
			color:white !important;
		}
		
	</style>
</head>
<body>
	
	<div class="row">
	
		<div class="col-sm-1">
		</div>
	
		<div class="col-sm-10" style="margin-bottom:50px;">
		
			<h1 style="color:#E8B70D;"><b>Register auction </b></h1>
			<hr>
			
			
			
			
			<div class="row">
	
				<div class="col-sm-3">
				
				
				</div>
	
	
				<div class="col-sm-6" style="border: solid #E9E9E9 1px; padding: 20px; border-radius:10px; background-color:#F8F8F8; padding-top:0px;">
				
					<form id="formulario" action="registra.php" method="post" enctype="multipart/form-data" onsubmit="return valida()">
					
						<h3 style="color:#E8B70D;"><i>Complete the next form</i></h3>
						<br>
					
						<div class="row">
							<div class="col-xs-3 form-group">
								<span style="font-size:17px;"><b>Item name:</b></span>
							</div>
							<div class="col-xs-9 form-group">
								<input type="text" name="item" class="form-control" required>
							</div>
						</div>
					
						<div class="row">
							<div class="col-xs-3 form-group">
								<span style="font-size:17px;"><b>Starting price:</b></span>
								<br>
								<span id="letrero_mal_pi" style="color:red;"> </span>
							</div>
							<div class="col-xs-3 form-group">
								<input type="text" name="precioI" class="form-control" required>
							</div>
							<div class="col-xs-3 form-group">
								<span style="font-size:17px; float:right;"><b>Top price:</b></span>
								<br>
								<span id="letrero_mal_pf" style="color:red;"> </span>
							</div>
							<div class="col-xs-3 form-group">
								<input type="text" name="precioF" class="form-control" required>
							</div>
						</div>
						
						
						
						<div class="row">
							<div class="col-xs-3 form-group">
								<span style="font-size:17px;"><b>File: </b></span>
							</div>
							<div class="col-xs-9 form-group">
								<input type="file" name="imagen" required>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-3 form-group">	
							</div>
							<div class="col-xs-9 form-group">
								<button type="submit" class="btn btn-warning">Register</button>
							</div>
						</div>
						
					</form>
				
				</div>
	
	
	
				<div class="col-sm-3">
				
				
				</div>
				
	
	
	
	
	
	
			</div>
	
		</div>
	
	
	
		<div class="col-sm-1">
		</div>
		
	</div>

</body>
<script>
function valida() {
	
	var respuesta = true;
	
	var pi = document.forms["formulario"]["precioI"].value;
	var pf = document.forms["formulario"]["precioF"].value;
	
	var reg = /^\d+$/;
	
	if(!pi.match(reg)){
		document.getElementById("letrero_mal_pi").innerHTML = "Debes poner un número";
		respuesta = false;
	} else {
		document.getElementById("letrero_mal_pi").innerHTML = "";
	}
	
	if(!pf.match(reg)){
		document.getElementById("letrero_mal_pf").innerHTML = "Debes poner un número";
		respuesta = false;
	} else {
		document.getElementById("letrero_mal_pf").innerHTML = "";
	}
	
	
	return respuesta;
	
}


</script>
<?php

	include("footer.php");
	
?>

</html>