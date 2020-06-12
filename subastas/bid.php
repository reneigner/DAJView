<?php

	include("m/funciones.php");

	
	$id=$_POST['id'];
	$puja=$_POST['puja'];
	$f = date('Y-m-d');
	
	insertaPuja('ren',$id,$puja,$f);
	
	
	
?>