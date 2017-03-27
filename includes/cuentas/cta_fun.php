<?php include("../../plantilla_conexion.php");?>
<?php

//INGRESO DE DATO
  if ($_POST['tipo']==1){
  	$tipo=$_POST['tipo_cta'];
  	$cliente=$_POST['cliente'];
    $sql = "SELECT  FUNC_CTA_INGRESO($tipo,$cliente,$age_codigo,$usu_codigo,null,'',0,0,0,1) MENSAJE  from dual";
    echo $sql;
		$result = odbc_exec($Conexiones , $sql);
  }

 ?>

 <?php echo odbc_result($result,'mensaje');?>
 <?php
 odbc_close($Conexiones);
 ?>

