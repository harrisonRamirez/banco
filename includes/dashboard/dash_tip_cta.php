<div class="" style="float:left">
  <span class="icono mdi-device-data-usage"></span>
</div>
<div class="titulo">
Bitacora - Tipos de cuenta <br />
<small class="subtitulo">Información de los tipos de cuenta</small>
</div>

<?php
$sql = "SELECT  cta_tip.*,int_dat.interes as interes
from cta_tip, int_dat
where cta_tip.ID_INT = int_dat.Id_int;
";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   No.
 </th>
 <th>
   Interes
 </th>
 <th>
   Retiro/boleta
 </th>
 <th>
   Retiro/libreta
 </th>
 <th>
   Retiro/cheque
 </th>
 <th>
   Deposito/boleta
 </th>
 <th>
   Deposito/libreta
 </th>
 <th>
   Deposito/cheque
 </th>
 <th>
   Deposito/efectivo
 </th>
 <th>
   CTA origen
 </th>

</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'id_tip').'</td>';
  echo '<td>'.odbc_result($result,'interes').'</td>';
  echo '<td>'.odbc_result($result,'nombre').'</td>';
  echo '<td>'.odbc_result($result,'ret_bol').'</td>';
  echo '<td>'.odbc_result($result,'ret_lib').'</td>';
  echo '<td>'.odbc_result($result,'ret_che').'</td>';
  echo '<td>'.odbc_result($result,'dep_bol').'</td>';
  echo '<td>'.odbc_result($result,'dep_che').'</td>';
  echo '<td>'.odbc_result($result,'dep_efe').'</td>';
  echo '<td>'.odbc_result($result,'enl_cta').'</td>';
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>


<!--LOG DE TIPOS DE CUENTA -->
<?php
$sql = "SELECT id_cta_tip_log,cta_tip.nombre as cuenta, usu_dat.usuario as usuario, log_eve.nombre as evento, fecha_hora,observacion 
from log_cta_tip, cta_tip, usu_dat, log_eve
where log_cta_tip.ID_TIP= cta_tip.ID_TIP
and log_cta_tip.ID_USU = usu_dat.ID_USU
and log_cta_tip.ID_EVE = log_eve.ID_EVE;";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
  <tr>
   <th>No.      </th>
   <th>Tipo de Cuenta</th>
   <th>Usuario  </th>
   <th>Evento   </th>
   <th>Observaciones   </th>
   <th>Fecha/Hora   </th>
  </tr>

  <?php
  do{
    echo '<tr>';
    echo '<td>'.odbc_result($result,'id_cta_tip_log').'</td>';
    echo '<td>'.odbc_result($result,'cuenta').'</td>';
    echo '<td>'.odbc_result($result,'usuario').'</td>';
    echo '<td>'.utf8_encode(odbc_result($result,'evento')).'</td>';
    echo '<td>'.odbc_result($result,'observacion').'</td>';
    echo '<td>'.odbc_result($result,'fecha_hora').'</td>';
    echo '</tr>';
  }while(odbc_fetch_row($result));
  ?>
</table>
