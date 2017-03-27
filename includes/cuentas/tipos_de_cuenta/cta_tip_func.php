<?php include("../../../plantilla_conexion.php");?>
<?php

//INGRESO DE DATO
  if ($_POST['tipo']==1){
    $sql = "
    	SELECT  FUNC_CTA_TIP_INGRESO(".$_POST['usuario'].",".$_POST['p_id_int'].",'".$_POST['nombre']."',".$_POST['ret_bol'].",".$_POST['ret_lib'].",".$_POST['ret_che'].",".$_POST['dep_bol'].",".$_POST['dep_che'].",".$_POST['dep_efe'].",".$_POST['p_enl_cta'].") CODIGO  from dual";
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
