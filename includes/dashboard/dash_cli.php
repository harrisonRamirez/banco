<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Dashboard - Clientes <br />
<small class="subtitulo">Información de Clientes</small>
</div>

<?php
$sql = "SELECT  *  from cli_dat";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   No.
 </th>
 <th>
   Usuario
 </th>
 <th>
   Nombre Completo
 </th>
 <th>
   Estado
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'id_cli').'</td>';
  echo '<td>'.odbc_result($result,'id_usu').'</td>';
  echo '<td>'.odbc_result($result,'nombre1').'</td>';
  echo '<td>'.odbc_result($result,'activo').'</td>';
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>


<!--LOG DE USUARIOS -->
<?php
$sql = "SELECT  log_cli.*,log_eve.descripcion eve_descripcion  from log_cli,log_eve where log_cli.id_eve=log_eve.id_eve";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>Cliente  </th>
   <th>Usuario  </th>
   <th>Evento   </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_cli_log').'</td>';
    echo '<td>'.odbc_result($result,'id_cli').'</td>';
    echo '<td>'.odbc_result($result,'id_usu').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'eve_descripcion')).'</td>';
    echo '<td>'.odbc_result($result,'Observacion').'</td>';
    echo '<td>'.odbc_result($result,'fecha_hora').'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
