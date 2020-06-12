<?php

	require_once("Query.php");

	
	function insertItem($desc, $p1, $p2, $im, $u, $f) {
		$query = "INSERT INTO items(descripcion, precioInicial, precioFinal, imagen, username, fechaCreacion, estatus) VALUES ('$desc', '$p1', '$p2', '$im', '$u', '$f', 'activo')";
		$consulta = Query::selectLibre($query);	
	}
	
	function getItems($user) {
		$query = "SELECT * FROM items WHERE username='$user'";
		$consulta = Query::selectLibre($query);	
		return $consulta;
	}
	
	function insertaPuja($usuario, $id, $val, $f) {
		$query = "INSERT INTO bids(username, id_art, bid, fechaPuj) VALUES ('$usuario', '$id', '$val', '$f')";
		$consulta = Query::selectLibre($query);	
		return $consulta;
	}
	
	function getItemsAll() {
		$query = "SELECT * FROM items ORDER BY fechaCreacion DESC";
		$consulta = Query::selectLibre($query);	
		return $consulta;
	}
	
	function getPujasById($id) {
		$query = "SELECT top 1 username, bid FROM bids WHERE id_art='$id' ORDER BY bid DESC ";
		$consulta = Query::selectLibre($query);	
		return $consulta;
	}
	
?>