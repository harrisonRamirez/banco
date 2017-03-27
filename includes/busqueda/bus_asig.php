<?php
// ASIGNANDO VARIABLES DE SESION
if (!isset($_SESSION)) {
  session_start();
}
if ($_POST['tipo']=="seleccion_agencia"){
	$_SESSION['MM_Agencia']=$_POST['id'];
	echo 1;
	return ;
}
if ($_POST['tipo']=="seleccion_caja"){
	$_SESSION['MM_Caja']=$_POST['id'];
	echo 1;
	return ;
}
echo 0;
?>