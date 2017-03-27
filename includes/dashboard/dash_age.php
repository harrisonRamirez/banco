<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Bitacora - Agencias<br />
<small class="subtitulo">Información de agencias</small>
</div>

<?php
$sql = "SELECT age_dat.id_age, var_dtp.nombre as tipo, var_dpd.nombre as pais, var_ddd.nombre as depart, var_dmd.nombre as muni, var_dzd.nombre as zona, age_dat.nombre as agencia, age_dat.direccion
FROM age_dat, var_dtp, var_dpd,var_ddd, var_dmd, var_dzd
where age_dat.ID_TIP_DIR = var_dtp.ID_TIP_DIR
and age_dat.ID_PAI = var_dpd.ID_PAI
and age_dat.ID_DEP = var_ddd.ID_DEP 
and age_dat.ID_MUN = VAR_DMD.ID_MUN
AND age_dat.ID_ZON = VAR_DZD.ID_ZON;
";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   No.
 </th>
 <th>
   Tipo de Dirección
 </th>
 <th>
   Pais
 </th>
 <th>
   Deepartamento
 </th>
 <th>
   Municipio
 </th>
 <th>
   Zona
 </th>
 <th>
   Nombre
 </th>
 <th>
   Dirección   
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'id_age').'</td>';
  echo '<td>'.odbc_result($result,'tipo').'</td>';
  echo '<td>'.odbc_result($result,'pais').'</td>';
  echo '<td>'.odbc_result($result,'depart').'</td>';
  echo '<td>'.odbc_result($result,'muni').'</td>';
  echo '<td>'.odbc_result($result,'zona').'</td>';
  echo '<td>'.odbc_result($result,'agencia').'</td>';
  echo '<td>'.odbc_result($result,'direccion').'</td>';
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>


<!--LOG DE AGENCIAS-->
<?php
$sql = "SELECT LOG_AGE.ID_LOG_AGE, USU_DAT.USUARIO AS USUARIO, LOG_EVE.NOMBRE AS EVENTO, AGE_DAT.NOMBRE AS AGENCIA, LOG_AGE.FECHA_HORA, LOG_AGE.OBSERVACION 
FROM LOG_AGE, USU_DAT, LOG_EVE,AGE_DAT
WHERE LOG_AGE.ID_USU = USU_DAT.ID_USU
AND LOG_AGE.ID_EVE = LOG_EVE.ID_EVE
AND LOG_AGE.ID_AGE = AGE_DAT.ID_AGE;";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>usuario</th>
   <th>Evento   </th>
   <th>Agencia </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_log_age').'</td>';
    echo '<td>'.odbc_result($result,'usuario').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'evento')).'</td>';
    echo '<td>'.odbc_result($result,'agencia').'</td>';
    echo '<td>'.odbc_result($result,'observacion').'</td>';
    echo '<td>'.odbc_result($result,'fecha_hora').'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
