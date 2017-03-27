<div class="" style="float:left">
  <span class="icono mdi-communication-forum" ></span>
</div>
<div class="titulo">
Información <br>
  <small class="subtitulo">Plantillas</small>
  <small class="subtitulo" style="position:absolute;top:0px;right:25px;color:#ccc">gen_inf. php</small>
</div>

<?php 
$sql = "select owner, count(owner) Numero 
  from dba_objects where owner='BANCO'
  group by owner 
  order by Numero desc";
$result = odbc_exec($Conexiones , $sql);

$sql = "select *
from ALL_PROCEDURES WHERE OWNER='BANCO' ORDER BY OBJECT_TYPE,OBJECT_NAME";
$result2 = odbc_exec($Conexiones , $sql);


$sql = 'SELECT * FROM (select * from v$sqlarea vs WHERE PARSING_SCHEMA_NAME='."'BANCO'".' AND SQL_TEXT NOT LIKE '."'%sqlarea%'".' and SQL_TEXT NOT LIKE '."'%RULE%'".' order by last_load_time desc) WHERE ROWNUM <= 10';
$result3 = odbc_exec($Conexiones , $sql);


$sql="select * from all_jobs";
$result4 = odbc_exec($Conexiones , $sql);


?>

<table class="table table-striped">
	<tr>
		<td>
			NO. DE OBJETOS EN LA DB
		</td>
		<td>
			<?php echo odbc_result($result,'Numero'); ?>
		</td>
	</tr>
	
	<tr>
		<td>ULTIMAS INSTRUCCIONES</td>
		<td>
			<table class="table table-striped table-hover">
				<tr>
					<th>INTRUCCION</th>
					<th>TIEMPO</th>
					<th>FILAS</th>
					<th>FECHA</th>
				</tr>
				<?php do{?>
				<tr>
					<td>
						<?php echo odbc_result($result3,'SQL_TEXT'); ?>
					</td>
					<td>
						<?php echo odbc_result($result3,'USER_IO_WAIT_TIME'); ?>
					</td>
					<td>
						<?php echo odbc_result($result3,'ROWS_PROCESSED'); ?>
					</td>
					<td>
						<?php echo odbc_result($result3,'last_load_time'); ?>
					</td>

					

				</tr>
				<?php }while(odbc_fetch_row($result3));?>
			</table>
		</td>
	</tr>
	<tr>
		<td>PROCEDIMIENTOS / FUNCIONES</td>
		<td>
			<table class="table table-striped table-hover">
				<?php do{?>
				<tr>
					<td>
						<?php echo odbc_result($result2,'OBJECT_TYPE'); ?>
					</td>
					<td>
						<?php echo odbc_result($result2,'OBJECT_NAME'); ?>
					</td>
				</tr>
				<?php }while(odbc_fetch_row($result2));?>
			</table>
		</td>
	</tr>
	<tr>
		<td>JOBS</td>
		<td>
			<table class="table table-striped table-hover">
				<tr>
				 	<th>JOB</th>
				 	<th>ULTIMA ACTUALIZACIÓN</th>
				 	<th>SIGUIENTE ACTUALIZACION</th>
				 	<th>INSTRUCCION</th>


				</tr>
				<?php do{?>
				<tr>
					<td>
						 <?php echo odbc_result($result4,'JOB'); ?>
					</td>
					<td>
						<?php echo odbc_result($result4,'LAST_DATE'); ?>
					</td>
					<td>
						<?php echo odbc_result($result4,'NEXT_DATE'); ?>
					</td>
					<td>
						<?php echo odbc_result($result4,'WHAT'); ?>
					</td>
				</tr>
				
				<?php }while(odbc_fetch_row($result4));?>
			</table>
		</td>
	</tr>
</table>

<br>
<br>
Las alertas se generaran en base a los datos devueltos por el sp (procedimiento almacenado)
<br>
<br>
Existen dos modalidades de plantillas:
<ul>
  <li>Plantillas de modulo</li>
  <li>Plantillas modales</li>
</ul>

<br>
<br>
<b>Nota:</b> En la parte superior derecha se escribe el nombre de la página que servira de guia, posteriormente sera eliminada
