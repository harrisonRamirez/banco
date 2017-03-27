<?php include("../../plantilla_conexion.php");?>
	<?php
		$sql = "
		SELECT  rol_dat.*,usu_rol.id_usu  from   rol_dat left join usu_rol on rol_dat.id_rol=usu_rol.id_rol  and usu_rol.id_usu=".$id_usuario. " where   rol_dat.activo=1";
		$result = odbc_exec($Conexiones , $sql);
?>




<table class="table table-striped" style="width:100%">
	
		<?php
		
		  do{?>
		    <tr>
				<td>
					<form action="" class="formulario" style="float:left">
					  <div class="checkbox">
					    <input type="checkbox" onclick="asignar_rol(<?php echo odbc_result($result,'id_rol');?>,this);" name="checkbox" id="rol_<?php echo odbc_result($result,'nombre');?>" <?php if (odbc_result($result,'id_usu')>0){echo 'checked';}?> >
					    <label for="rol_<?php echo odbc_result($result,'nombre');?>"><?php echo odbc_result($result,'nombre');?></label>
					  </div>
					</form>
				</td>
				<td style="text-align:left">
					<?php echo odbc_result($result,'descripcion');?>	
				</td>
			</tr>
		 <?php }while(odbc_fetch_row($result));
	 	?>	
</table>

<script>
	function asignar_rol(rol,aaa){
		var seleccion=0
			if (aaa.checked==true){
				seleccion=1;
			}
		// $('.bloqueo').show(0);
		$.ajax({
			type:"POST",
			url: "includes/usuarios/usu_func.php",
			data:"tipo=ROL&usuario=<?php echo $id_usuario;?>&rol="+rol+"&seleccion="+seleccion,
			async: false, cache:false,   //BLOQUEA PÁGINA MIENTRAS SE EJECUTA
				success: function(resp){
					if (resp==1){
						mensaje('Usuario','PROCESADO EXITOSAMENTE' ,'success',4000); 
					}else{
						mensaje('Usuario','ERROR <BR>'+resp ,'error',4000); 
					}
				}
			});
	}
</script>