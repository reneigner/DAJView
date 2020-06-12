<?php


	include("m/funciones.php");

	$desc = $_POST['item'];
	$p1 = $_POST['precioI'];
	$p2 = $_POST['precioF'];

	$imagen = $_FILES['imagen']['name'];
	$ruta = $_FILES['imagen']['tmp_name'];
	
	$fecha = date('Y-m-d h:m:s');
	$fecha2 = date('Y-m-d');
	
	$rutaEnServidor='itemsImg';
	$rutaTemporal=$ruta;
	$rutaDestino=$rutaEnServidor.'/'.$imagen;
	
	move_uploaded_file($rutaTemporal, $rutaDestino);
	
	$im = explode(".", $imagen);
	$nombreImagenOriginal = $im[0];
	$extension = $im[1];
	
	$nuevoName = $fecha."-".'dbuser'.".".$extension;
			
	//Renombrar la imagen de manera única
	rename("itemsImg/".$imagen, "itemsImg/".$nuevoName); 
	
		
	//INSERTAMOS EN LA BASE
	insertItem($desc, $p1, $p2, $nuevoName, 'dbuser', $fecha2);

	header("Location:auctions.php");
	
	
?>