<?php include("../../plantilla_conexion.php");?>
<?php $usuario=$_GET['u'];?>

<?php
  $sql = "  SELECT FUNC_USU_NOMBRE(id_usu) NOMBRE_COMPLETO, usu_dat.* from usu_dat  where usuario='".$usuario."'";
  $result = odbc_exec($Conexiones , $sql);
  
  // VERIFICACIÓN DE DATOS
  $id_usuario=odbc_result($result,'id_usu');
  $nombre_completo =odbc_result($result,'NOMBRE_COMPLETO');
?>

<div class="alert alert-success" style="text-align:left">
  <b>Usuario:</b>  <?php echo $usuario;?> <br> 
  <b>Nombre :</b>  <?php  echo $nombre_completo;?>
</div>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#Contraseña" aria-controls="Contraseña" role="tab" data-toggle="tab">Contraseña</a></li>
    <li role="presentation"><a href="#Direccion" aria-controls="Direccion" role="tab" data-toggle="tab">Dirección</a></li>
    <li role="presentation" style="display:none"><a href="#telefono" aria-controls="telefono" role="tab" data-toggle="tab">Teléfono</a></li>
    <li role="presentation" style="display:none"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Correo Electronico</a></li>
    <li role="presentation"><a href="#rol" aria-controls="rol" role="tab" data-toggle="tab">Rol</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="width:100%">
    <div role="tabpanel" class="tab-pane active" id="Contraseña" ><?php include('usu_dat_con.php');?></div>
    <div role="tabpanel" class="tab-pane" id="Direccion" ><?php include('usu_dat_dir.php');?></div>
    <div role="tabpanel" class="tab-pane" id="telefono"><?php include('usu_dat_tel.php');?></div>
    <div role="tabpanel" class="tab-pane" id="email"><?php include('usu_dat_email.php');?></div>
    <div role="tabpanel" class="tab-pane" id="rol"><?php include('usu_dat_rol.php');?></div>
  </div>

</div>




<script type="text/javascript">


// tab
  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })


  </script>