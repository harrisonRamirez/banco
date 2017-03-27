<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos de la Empresa <br />
<small class="subtitulo">Información de la Empresa</small>
</div>


<!-- Grupo de elementos-->
<input type="hidden" class="form-control" id="inputText" placeholder="Usuario">

<div class="form-group">
    <label for="inputNombre" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre"  placeholder="Nombre" required>
    </div>
</div>
<div class="form-group">
    <label for="inputPantenteComercio" class="col-lg-3 control-label">Patente de Comercio</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="patenteComercio" placeholder="Patente de Comercio">
    </div>
</div>
<div class="form-group">
	 <label for="inputActivo" class="col-lg-3 control-label">Activo</label>
     <div class="col-lg-8">
	 <input type="checkbox" id="activo" value="0" /> <br />
    </div>
</div>

<!--<div class="" style="clear:both"></div>
<input type="button" style="float:right; " class="btn btn-success " name="name"  onclick="Guardar()" value="Guardar">
-->
<div class="botones_1">
  <input type="button"  class="btn btn-success " style="float:right;padding:10px 16px" onclick="Guardar()" name="name" value="Guardar y Continuar"> 
</div>
<div class="botones_2" style="display:none" >

   <a   class="btn btn-danger " style="float:right;padding:10px 16px" href="index_principal.php" > Salir </a>    
  <input type="button"  class="btn btn-info " style="float:right;padding:10px 16px" onclick="ver_modal(id_emp);" name="name" value="Información Adicional"> 
  <input type="button"  class="btn btn-info " style="float:right;padding:10px 16px" onclick="Guardar()" name="name" value="Nuevo Empresa">
  
</div>
<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<div class="Pantalla_Modal_Cuadro">

</div>

<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>





<script type="text/javascript">
var nombre, pantenteComercio, activo
var id_emp

function validar(){
nombre   = document.getElementById('nombre').value;
patenteComercio   = document.getElementById('patenteComercio').value;
activo    = document.getElementById('activo').checked;
 

if (nombre==''){mensaje('Nueva Empresa','Ingrese el nombre de la Empresa','error',2000); return 0}
if (patenteComercio==''){mensaje('Nueva Empresa','Ingrese Pantente de Comercio','error',2000); return 0}

return 1;
}



function Guardar(){
	if (validar()==false){return 0;}
	$('.bloqueo').show(0);
	
	var nombre = document.getElementById('nombre').value;
	var pantenteComercio = document.getElementById('patenteComercio').value;
	var activo = document.getElementById('activo').value;


		$.ajax({
		type:"POST",
		url: "includes/empresas/emp_func.php",
		data:"tipo=1&nombre="+nombre+"&patenteComercio="+patenteComercio+"&activo="+activo,
		
			success: function(resp){
        var resp = resp.split("|"); ;
        $('.bloqueo').hide(0);

        if (resp[0]>=0){
          $('.botones_1').hide(0);
          $('.botones_2').show(0);
          id_emp=resp[2];
          ver_modal(id_emp);
          mensaje('Empresa',resp[1].trim() ,'success',4000); 
        }else{
          mensaje('Empresa',resp[1].trim(),'error',4000); 
        }
        

			}
		});
}
		


function ver_modal(id_emp){
 pantalla_modal("Información Extra","includes/empresas/emp_dat2.php?empresa="+id_emp);
}

</script>
