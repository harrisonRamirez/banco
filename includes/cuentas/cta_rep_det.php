<?php include("../../plantilla_conexion.php");

$sql="select * from cta_dat where id_cta='".$_POST['cuenta']."'";
$result = odbc_exec($Conexiones , $sql);

$cuenta=odbc_result($result,'nombre');

?>
<div class="" style="float:left">
  <span class=" mdi-device-data-usage"></span>
</div>
<div class="titulo">
Estado de Cuentas: <?php echo $cuenta;?><br />
</div>

<?php
$cuenta=$_POST['cuenta'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$ncuenta=$cuenta;


// MONTO ANTERIOR
$sql="SELECT SUM(MONTO) anterior FROM CTA_OPR WHERE ID_CTA=$ncuenta AND FECHA<'$fecha1'";
$result = odbc_exec($Conexiones , $sql);
$saldo_anterior=odbc_result($result,'anterior');


// MONTO ANTERIOR
$sql="SELECT SUM(MONTO) anterior FROM CTA_OPR WHERE ID_CTA=$ncuenta AND FECHA<'$fecha1'";
$result = odbc_exec($Conexiones , $sql);
$saldo_anterior=odbc_result($result,'anterior');

// MONTO ACTUAL
$sql="SELECT SUM(MONTO) actual FROM CTA_OPR WHERE ID_CTA=$ncuenta AND FECHA between '$fecha1' and '$fecha2'";
$result = odbc_exec($Conexiones , $sql);
$saldo_actual=odbc_result($result,'actual');




$sql = "select a.fecha fecha, d.NOMBRE nombre, c.ID_TRC documento,a.MONTO monto,a.DESCRIPCION descripcion from cta_opr a, caj_opr b, tra_dat c, tip_tra d  where a.ID_OPR=b.ID_OPR and b.ID_TRC=c.ID_TRC and c.ID_TTR=d.ID_TTR and a.id_cta=$ncuenta and a.FECHA between '$fecha1' and '$fecha2' order by a.fecha";
$result = odbc_exec($Conexiones , $sql);
?>


<div style="float:right;" class="alert alert-success">SALDO ACTUAL: <?php echo number_format($saldo_actual, 2, '.', ',');?></div>
<div style="float:right;margin-right:10px;" class="alert alert-info">SALDO ANTERIOR: <?php echo number_format($saldo_anterior, 2, '.', ',');?></div>
<table width="100%" class="table table-STRIPED">
<tr>
 <th>
   FECHA
 </th>
 <th>
   TIPO DOCUMENTO
 </th>
 <th>
   NO. DOCUMENTO
 </th>
 <th>
   MONTO
 </th>
 <th>
   DESCRIPCIÓN
 </th>
</tr>

<?php
do{
  echo '<tr>';
  echo '<td>'.odbc_result($result,'fecha').'</td>';
  echo '<td>'.odbc_result($result,'nombre').'</td>';
  echo '<td>'.odbc_result($result,'documento').'</td>';
  echo '<td>'. number_format(odbc_result($result,'monto'), 2, '.', ',').'</td>';
  echo '<td>'.odbc_result($result,'descripcion').'</td>';
  
  echo '</tr>';
}while(odbc_fetch_row($result));
?>
</table>
