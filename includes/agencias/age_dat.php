<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos de agencia <br />
<small class="subtitulo">Informacion de agencia</small>
</div>


<!-- Grupo de elementos-->
<input type="hidden" class="form-control" id="inputText" placeholder="Agencia">
<style>
.formulario table, .formulario table tr, .formulario{width:100%;}
.formulario table td, .formulario label{width: 30%;}
select{width:100%;}
</style>

<div class="formulario">
<table>
	<tr>
		<td><label for="inpuIdPais" class="col-lg-3 control-label">Pais</label></td>
		<td><select name="" id="IdPai" onchange ="javascript:selecciones(this.value,4);"></select></td>
	</tr>
	<tr>
		<td><label for="inputIpDep" class="col-lg-3 control-label">Departamento</label></td>
		<td><select name="" id="id_dep"  onchange ="javascript:selecciones(this.value,5);"></select></td>
	</tr>
	<tr>
		<td><label for="inputIpMun" class="col-lg-3 control-label">Municipio</label></td>
		<td><select name="" id="id_mun"  onchange="javascript:selecciones(this.value,6);"></select></td>
	</tr>
	<tr>
		<td><label for="inputIdZon" class="col-lg-3 control-label">Zona</label></td>
		<td><select name="" id="id_zon" ></select></td>
	</tr>
	<tr>
		<td><label for="inputIdTipDir" class="col-lg-3 control-label">Tipo de direccion</label></td>
		<td><select name="" id="idtipdir"></select></td>
	</tr>
	<tr>
		<td><label for="inputNombre" class="col-lg-3 control-label">Nombre</label></td>
		<td><input type="text"  class="form-control" id="nombre" placeholder="Nombre"></td>
	</tr>
	<tr>
		<td><label for="inputNombre" class="col-lg-3 control-label">direccion</label></td>
		<td><input type="text"  class="form-control" id="direccion" placeholder="Direccion"></td>
	</tr>
</table>
</div>

<div class="Pantalla_Modal_Cuadro"></div>
<input type="button" style="float:right; " class="btn btn-success " name="name"  onclick="Guardar()" value="Guardar">
<div style="clear:both"></div>


<script type="text/javascript">
selecciones(0,2);
selecciones(0,3);
function Guardar(){

   var IdTipDir = document.getElementById('idtipdir').options.selectedIndex;
   var IdPai = document.getElementById('IdPai').options.selectedIndex;
   var id_dep = document.getElementById('id_dep').options.selectedIndex;
   var id_mun = document.getElementById('id_mun').options.selectedIndex;
   var id_zon = document.getElementById('id_zon').options.selectedIndex;
   var nombre = document.getElementById('nombre').value;
   var direccion = document.getElementById('direccion').value;
	 	$.ajax({
	 	type:"POST",
	 	url: "includes/agencias/age_func.php",
	 	data:"tipo=1"+
		"&idtipdir="+IdTipDir+
		"&IdPai="+IdPai+
	 	"&id_dep="+id_dep+
		"&id_mun="+id_mun+
		"&id_zon="+id_zon+
		"&nombre="+nombre+
		"&direccion="+direccion,
	 		success: function(resp){
	 			$('.Pantalla_Modal_Cuadro').html(resp);
	 		}
	 	});
}

function selecciones(codigo,tipo){
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
			//document.getElementById('direccion').value="";
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
