<?php include("../../plantilla_conexion.php");
?>

<?php
$sql = "SELECT MAX(CTA_DAT.ID_CTA) as ID, MAX(CTA_DAT.NOMBRE) AS CUENTA, SUM(CTA_OPR.MONTO) AS SALDO, MAX(AGE_DAT.NOMBRE) AS AGENCIA, MAX(CTA_TIP.NOMBRE) TIPO, MAX(CTA_DAT.ACTIVO) ESTADO
FROM CTA_OPR , CTA_DAT, AGE_DAT, CTA_TIP
WHERE CTA_DAT.ID_CTA = CTA_OPR.ID_CTA(+) 
AND CTA_DAT.ID_AGE = AGE_DAT.ID_AGE
AND CTA_DAT.ID_TIP = CTA_TIP.ID_TIP
GROUP BY CTA_DAT.ID_CTA;";
$result = odbc_exec($Conexiones , $sql);
?>

<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   ID
 </th>
 <th>
   CUENTA
 </th>
 <th>
   SALDO
 </th>
 <th>
   AGENCIA
 </th>
 <th>
   TIPO
 </th>
 <th>
   ESTADO
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'ID').'</td>';
  echo '<td>'.odbc_result($result,'CUENTA').'</td>';
  echo '<td>'.odbc_result($result,'SALDO').'</td>';
  echo '<td>'.odbc_result($result,'AGENCIA').'</td>';
  echo '<td>'.odbc_result($result,'TIPO').'</td>';
  echo '<td>'.odbc_result($result,'ESTADO').'</td>';
  
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>
