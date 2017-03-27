<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos del Cliente <br />
<small class="subtitulo">Información personal del cliente</small>
</div>


<!-- Grupo de elementos-->
<input type="hidden" class="form-control" id="inputText" placeholder="Usuario">

<div class="form-group">
    <label for="inputPrimerNombre" class="col-lg-3 control-label">Primer Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre">
    </div>
</div>
<div class="form-group">
    <label for="inputSegundoNombre" class="col-lg-3 control-label">Segundo Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre">

    </div>
</div>
<div class="form-group">
    <label for="inputPrimerApellido" class="col-lg-3 control-label">Primer Apellido</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="apellido1"  placeholder="Primer Apellido">
    </div>
</div>
<div class="form-group">
    <label for="inputSegundoApellido" class="col-lg-3 control-label">Segundo Apellido</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido">
    </div>
</div>
<div class="form-group">
    <label for="inputTercerApellido" class="col-lg-3 control-label">Tercer Apellido</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="casada" placeholder="Tercer Apellido">
    </div>
</div>
<div class="form-group">
    <label for="inputCui" class="col-lg-3 control-label">No. De Cui</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="cui" placeholder="No. De Cui">
    </div>
</div>
<div class="form-group">
    <label for="inputNacimiento" class="col-lg-3 control-label">Fecha de Nacimiento</label>
    <div class="col-lg-8">
        <input type="date" step="1" min="2015-01-01" max="2016-12-31" class="form-control" id="nacimiento" placeholder="Fecha de Nacimiento">
    </div>
</div>
<div class="form-group">
    <label for="inputFotografia" class="col-lg-3 control-label">Fotografía</label>
    <div class="col-lg-8">
        <input type="file" class="form-control" id="inputText">
    </div>
</div>
<div class="form-group">
    <label for="inputFirma" class="col-lg-3 control-label">Firma</label>
    <div class="col-lg-8">
        <input type="file" class="form-control" id="inputText">
    </div>
</div>

<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->
<input type="button" style="float:right" class="btn btn-primary" name="name"
onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","includes/clientes/cli_con.php","")' value="Contraseñas">

<input type="button" style="float:right" class="btn btn-primary" name="name"
onClick ='carga_modal("mdi-communication-email","CORREO","includes/clientes/cli_cor.php","")' value="Correos">

<input type="button" style="float:right" class="btn btn-primary" name="name" value="Telefonos">

<input type="button" style="float:right" class="btn btn-primary" name="name" value="Direcciones">
<br>
<div class="" style="clear:both">

</div>
<input type="button" style="float:right; " class="btn btn-success " name="name"  onclick="Guardar()" value="Guardar">



<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>





<script type="text/javascript">
function Guardar(){
  var nombre1=document.getElementById('nombre1').value;
  var nombre2=document.getElementById('nombre2').value;
  var apellido1=document.getElementById('apellido1').value;
  var apellido2=document.getElementById('apellido2').value;
  var casada=document.getElementById('casada').value;
  var nacimiento=document.getElementById('nacimiento').value;
  var cui=document.getElementById('cui').value;
		$.ajax({
		type:"POST",
		url: "includes/clientes/cli_func.php",
		data:"tipo=1&nombre1="+nombre1+"&nombre2="+nombre2+"&apellido1="+apellido1+"&apellido2="+apellido2+"&casada="+casada+"&nacimiento="+nacimiento+"&cui="+cui,
			success: function(resp){
        swal({
          title: "Mensaje",
          text: resp,
          html: true
        });

			}
		});
}

</script>
