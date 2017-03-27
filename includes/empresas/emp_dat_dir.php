

<div class="extra">
	


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

		<tr>
			<td><select name="" id="idtipdir"></select></td>
			<td><select name="" id="IdPai" onchange ="javascript:selecciones(this.value,4);"></select></td>
			<td><select name="" id="id_dep"  onchange ="javascript:selecciones(this.value,5);"></select></td>
			<td><select name="" id="id_mun"  onchange="javascript:selecciones(this.value,6);"></select></td>
			<td><select name="" id="id_zon" ></select></td>
			<td><input type="text" id="direccion"></td>
			<td><a class="btn btn-success" onclick="emp_dir_guardar()"><span class="mdi-content-save"></span></a></td>
		</tr>
	</table>

</div>
<div class="emp_dat_dir" style=" max-height: 200px;overflow: auto;"></div>


	<script type="text/javascript">
	selecciones(0,2);
	selecciones(0,3);
	emp_dir_detalle();

	function emp_dir_detalle(){
		$.ajax({          
			type:"POST",
			url: "includes/empresas/emp_dat_dir_detalle.php",
			data:"id_emp=<?php echo $id_empresa;?>",
				success: function(resp){
				      $('.emp_dat_dir').html(resp);

				}
			});
	}

	function emp_dir_guardar(){
	var dir_tip=document.getElementById('idtipdir').value;
	var dir_pais=document.getElementById('IdPai').value;
	var dir_dep=document.getElementById('id_dep').value;
	var dir_mun=document.getElementById('id_mun').value;
	var dir_zon=document.getElementById('id_zon').value;
	var dir_dir=document.getElementById('direccion').value;
	var empresa='<?php echo $id_empresa;?>';

	// $('.bloqueo').show(0);
		$.ajax({
			type:"POST",
			url: "includes/empresas/emp_func.php",
			data:"tipo=DIRECCION&id_emp="+empresa+"&dir_tipo="+dir_tip+"&dir_pais="+dir_pais+"&dir_dep="+dir_dep+"&dir_mun="+dir_mun+"&dir_zon="+dir_zon+"&dir_dir="+dir_dir,
			async: false, cache:false,   //BLOQUEA PÁGINA MIENTRAS SE EJECUTA
				success: function(resp){
					emp_dir_detalle();
					limpiar(0);
					
				}
			});
	}

	function selecciones(codigo,tipo){
	   // $('.bloqueo').show(0);
			$.ajax({
			type:"POST",
			url: "includes/general/gen_dir.php",
			data:"tipo="+tipo+"&codigo="+codigo,
			 // async: false, cache:false,   //BLOQUEA PÁGINA MIENTRAS SE EJECUTA
				success: function(resp){
					// $('.bloqueo').hide(0);
					if(tipo==2){$('#idtipdir').html(resp);}
					if(tipo==3){$('#IdPai').html(resp);limpiar(1);}
					if(tipo==4){$('#id_dep').html(resp);limpiar(2);}
					if(tipo==5){$('#id_mun').html(resp);limpiar(3);}
					if(tipo==6){$('#id_zon').html(resp);}
				}
			});
	}
	function limpiar(tipo){
		if (tipo==0){
			$('#idtipdir').html('');
			$('#IdPai').html('');
			$('#id_dep').html('');
			$('#id_mun').html('');
			$('#id_zon').html('');
			document.getElementById('direccion').value="";
		}
		if (tipo==1){
			$('#id_dep').html('');
			$('#id_mun').html('');
			$('#id_zon').html('');	
		}
		if (tipo==2){
			$('#id_mun').html('');
			$('#id_zon').html('');	
		}
		if (tipo==3){
			$('#id_zon').html('');	
		}
	}

	</script>
