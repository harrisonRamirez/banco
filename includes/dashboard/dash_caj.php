<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Bitacora - Cajas<br />
<small class="subtitulo">Información de caja</small>
</div>

<?php
$sql = "SELECT  caj_dat.*, age_dat.nombre as agencia from caj_dat, age_dat
where caj_dat.id_age = age_dat.id_age;
";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   No.
 </th>
 <th>
   Agencia
 </th>
 <th>
   Nombre
 </th>
 <th>
   Descripción
 </th>
 <th>
   Cantidad Mínima
 </th>
 <th>
   Cantidad Máxima
 </th>
 <th>
   Activo
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'id_caj').'</td>';
  echo '<td>'.odbc_result($result,'agencia').'</td>';
  echo '<td>'.odbc_result($result,'nombre').'</td>';
  echo '<td>'.odbc_result($result,'descripcion').'</td>';
  echo '<td>'.odbc_result($result,'can_min').'</td>';
  echo '<td>'.odbc_result($result,'can_max').'</td>';
  echo '<td>'.odbc_result($result,'activo').'</td>';
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>


<!--LOG DE CAJAS -->
<?php
$sql = "SELECT id_caj_log,caj_dat.nombre as caja, usu_dat.usuario as usuario, log_eve.nombre as evento, id_est, val_ini, val_fin, fecha, host, observaciones 
from log_caj, caj_dat, usu_dat, log_eve
where log_caj.ID_CAJ= CAJ_DAT.ID_CAJ
and LOG_CAJ.ID_USU = usu_dat.ID_USU
and LOG_CAJ.ID_EVE = log_eve.ID_EVE;";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>Caja</th>
   <th>Usuario  </th>
   <th>Evento   </th>
   <th>Estado  </th>
   <th>Valor Inicial   </th>
   <th>Valor Final   </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
   <th>Host   </th>

  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_caj_log').'</td>';
    echo '<td>'.odbc_result($result,'caja').'</td>';
    echo '<td>'.odbc_result($result,'usuario').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'evento')).'</td>';
    echo '<td>'.odbc_result($result,'id_est').'</td>';
    echo '<td>'.odbc_result($result,'val_ini').'</td>';
    echo '<td>'.odbc_result($result,'val_fin').'</td>';
    echo '<td>'.odbc_result($result,'observaciones').'</td>';
    echo '<td>'.odbc_result($result,'fecha').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'host')).'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
