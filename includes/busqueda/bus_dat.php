
<?php 
session_start();
$query='';
$busqueda='';
if (isset($_SESSION['MM_Agencia'])){
	$age_codigo=$_SESSION['MM_Agencia'];	
}else{
	$age_codigo=0;
}

?>
<table width="100%">
	<tr>
		<td>
			<table width="100%">
				<tr>
					<td ><input type="text" id="buscar" style="border:1px solid #ccc;width:100%;padding:2px;" onchange="buscar()" ></td>
					<td width="50px"><a href="javascript:buscar();" class="mdi-action-search" style="width:100%"></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<span class="busqueda_detalle"></span>
		</td>
	</tr>
</table>

<script>

var tipo="<?php echo $_GET['tipo'];?>";
var agencia="<?php echo $age_codigo;?>";
buscar();
function buscar(){

	if (tipo=="seleccion_agencia"){
		query="select id_age,nombre,direccion from age_dat";
		titulo="NOMBRE|DIRECCION";
	}
	if (tipo=="seleccion_caja"){
		query="select id_caj, nombre from caj_dat where id_age="+agencia+" and activo=1";
		titulo="CAJA";
	}


	busqueda='';
	busqueda=document.getElementById('buscar').value;

	$.ajax({
		type:"POST",
		url: "includes/busqueda/bus_det.php",
		data: "query="+query+"&titulo="+titulo+"&busqueda="+busqueda+"&tipo="+tipo,
			success: function(resp){  
				$('.busqueda_detalle').html(resp);
			}
	})
}


function seleccion_busqueda(id){
	$.ajax({
		type:"POST",
		url: "includes/busqueda/bus_asig.php",
		data: "id="+id+"&tipo="+tipo,
			success: function(resp){ 
				location.href = "index_principal.php";
				pantalla_modal_cerrar();
			}
	})
	
}
</script>