<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Dashboard - Usuario <br />
<small class="subtitulo">Información de Usuarios</small>
</div>

<?php
$sql = "SELECT  *  from usu_dat";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-hover">
  <tr>
   <th>No.      </th>
   <th>Usuario  </th>
   <th>Nombre   </th>
   <th>Estado   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_usu').'</td>';
    echo '<td>'.odbc_result($result,'usuario').'</td>';
    echo '<td>'.odbc_result($result,'nombre1').'</td>';
    echo '<td>'.odbc_result($result,'activo').'</td>';

    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>



<!--LOG DE USUARIOS -->
<?php
$sql = "SELECT  log_usu.*,log_eve.descripcion eve_descripcion  from log_usu,log_eve where log_usu.id_eve=log_eve.id_eve ORDER BY ID_LOG";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>Usuario  </th>
   <th>Evento   </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
   <th>HOST   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_log').'</td>';
    echo '<td>'.odbc_result($result,'id_usu').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'eve_descripcion')).'</td>';
    echo '<td>'.odbc_result($result,'Observaciones').'</td>';
    echo '<td>'.odbc_result($result,'fecha_hora').'</td>';
        echo '<td>'.odbc_result($result,'host').'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
