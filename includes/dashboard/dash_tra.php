<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Dashboard - Empresas <br />
<small class="subtitulo">Información de las empresas</small>
</div>

<?php
$sql = "SELECT  *  from emp_dat";
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
   Nombre
 </th>
 <th>
   Patente
 </th>
 <th>
   Estado
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'id_emp').'</td>';
  echo '<td>'.odbc_result($result,'id_usu').'</td>';
  echo '<td>'.odbc_result($result,'nombre').'</td>';
  echo '<td>'.odbc_result($result,'patente').'</td>';
  echo '<td>'.odbc_result($result,'activo').'</td>';
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>


<!--LOG DE USUARIOS -->
<?php
$sql = "SELECT  log_emp.*,log_eve.descripcion eve_descripcion  from log_emp,log_eve where log_emp.id_eve=log_eve.id_eve";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>Código  </th>
   <th>Usuario  </th>
   <th>Evento   </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_emp_log').'</td>';
    echo '<td>'.odbc_result($result,'id_emp').'</td>';
    echo '<td>'.odbc_result($result,'id_usu').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'eve_descripcion')).'</td>';
    echo '<td>'.odbc_result($result,'Observacion').'</td>';
    echo '<td>'.odbc_result($result,'fecha_hora').'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
