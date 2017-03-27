<?php include("../../plantilla_conexion.php");?>
<?php

//INGRESO DE DATO
  if ($_POST['tipo']==1){
    $sql = "
    	SELECT  FUNC_CLI_INGRESO(".$usu_codigo.",'".$_POST['nombre1']."','".$_POST['nombre2']."','".$_POST['apellido1']."','".$_POST['apellido2']."','".$_POST['casada']."','".$_POST['nacimiento']."','".$_POST['cui']."') MENSAJE  from dual";
    $result = odbc_exec($Conexiones , $sql);
  }

 ?>

 <?php echo odbc_result($result,'mensaje');?>
 <?php
 odbc_close($Conexiones);
 ?>
