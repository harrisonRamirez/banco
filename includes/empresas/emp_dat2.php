<?php include("../../plantilla_conexion.php");?>
<?php $empresa=$_GET['empresa'];?>

<?php
$sql = "SELECT  id_emp,patente,nombre,ACTIVO,ID_USU
      from emp_dat	  where ID_EMP='".$empresa."'";
  $result = odbc_exec($Conexiones , $sql);
  
  // VERIFICACIÓN DE DATOS
  $id_empresa=odbc_result($result,'id_emp');
  $nombre_completo =odbc_result($result,'nombre');
?>

<div class="alert alert-success" style="text-align:left">

  <b>Id Empresa: </b> <?php echo $id_empresa;?> <br>
  <b>Nombre :  </b> <?php  echo $nombre_completo;?>
</div>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  
    <li role="presentation"><a href="#Direccion" aria-controls="Direccion" role="tab" data-toggle="tab">Dirección</a></li>
    <li role="presentation" ><a href="#telefono" aria-controls="telefono" role="tab" data-toggle="tab">Teléfono</a></li>
    <li role="presentation" ><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Correo Electronico</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="width:100%">
 
    <div role="tabpanel" class="tab-pane" id="Direccion" ><?php include('emp_dat_dir.php');?></div>
    <div role="tabpanel" class="tab-pane" id="telefono"><?php include('emp_dat_tel.php');?></div>
    <div role="tabpanel" class="tab-pane" id="email"><?php include('emp_dat_email.php');?></div>

  </div>

</div>




<script type="text/javascript">


// tab
  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })


  </script>