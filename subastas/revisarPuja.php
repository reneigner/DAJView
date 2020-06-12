<?php


	$respuesta = 1;

	$actual = $_POST["precio"];
	$puja = $_POST["puja"];
	
	if($puja<=$actual) {
		$respuesta = 2;
	}
	
	
	if (!ctype_digit($puja)) {
		$respuesta = 3;
	}
	
	echo $respuesta;
	

	
?>