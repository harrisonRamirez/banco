<link rel="stylesheet" href="estilos/estilo_principal.css">
<link href="estilos/bootstrap.min.css" rel="stylesheet">
<link href="estilos/dist/roboto.min.css" rel="stylesheet">
<link href="estilos/dist/material-fullpalette.min.css" rel="stylesheet">
<link href="estilos/dist/ripples.min.css" rel="stylesheet">
<link href="estilos/snackbar.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include("plantilla_conexion.php");?>
<?php
$sql = "UPDATE USU_DAT SET ACCESO=NULL WHERE id_usu=".$_GET['us'];
$result = odbc_exec($Conexiones , $sql);


if (!isset($_SESSION)) {
  session_start();
}
session_destroy();
?>


<div class="" style="width:50%; text-align:center;margin:auto;margin-top:60px ">
<div class="alert alert-default" style="color:rgb(121, 121, 121);font-size:18px;border-radius:8px; box-shadow:0px 2px 3px #ccc" >
  Ha salido del sistema

  <p>  </p>
  <a href="index.php"><input type="button" name="name" class="btn btn-success"  value="Ingresar"></a>
</div>




</div>
