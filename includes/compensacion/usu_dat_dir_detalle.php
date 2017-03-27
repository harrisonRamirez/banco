<?php include("../../plantilla_conexion.php");?>
	<?php
		$usuario=$_POST['id_usuario'];
		$sql = "SELECT  *  from usu_dir where id_usu=".$usuario;
		$result = odbc_exec($Conexiones , $sql);
?>

<?php
 if (odbc_result($result,'id_tip_dir')!=null){?>

<table class="table table-striped table-hover">
		<tr>
			<th>TIPO</th>
			<th>PAIS</th>
			<th>DEPARTAMENTO</th>
			<th>MUNICIPIO</th>
			<th>ZONA</th>
			<th>DIRECCIÓN</th>
			<th>ACCIÓN</th>
		</tr>

		<?php
		  do{
		    echo '<tr>';
		    echo '<td>'.odbc_result($result,'id_tip_dir').'</td>';
		    echo '<td>'.odbc_result($result,'id_pai').'</td>';
		    echo '<td>'.odbc_result($result,'id_dep').'</td>';
		    echo '<td>'.odbc_result($result,'id_mun').'</td>';
		    echo '<td>'.odbc_result($result,'id_zon').'</td>';
		    echo '<td>'.odbc_result($result,'direccion').'</td>';
		    echo '<td><a class="btn btn-danger">Eliminar</a></td>';
		    echo '</tr>';
		  }while(odbc_fetch_row($result));
	 	?>
</table>
<?php }?>
<?php odbc_close($Conexiones); ?>