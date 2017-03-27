<?php include("../../../plantilla_conexion.php");?>
<?php

//INGRESO DE DATO
  if ($_POST['tipo']==1){
    $sql = "
    	SELECT  FUNC_CAJ_DAT_APERTURA(".$usu_codigo.",".$_POST['p_id_age'].",'".$_POST['nombre']."','".$_POST['desc']."',".$_POST['can_min'].",".$_POST['can_max'].",".$_POST['activo'].") CODIGO  from dual";
    $result = odbc_exec($Conexiones , $sql);

if (odbc_result($result,'CODIGO')==0){
      $sql = " SELECT  'PROCESADO EXITOSAMENTE' descripcion from DUAL";
      $result2 = odbc_exec($Conexiones , $sql);
    }else{
    $sql = " SELECT  descripcion from log_eve where cod_gen=".odbc_result($result,'CODIGO');
      $result2 = odbc_exec($Conexiones , $sql);
  }

  }

 ?>
<?php echo odbc_result($result,'CODIGO').'|'.odbc_result($result2,'descripcion');?>
 <?php
 odbc_close($Conexiones);
 ?>
