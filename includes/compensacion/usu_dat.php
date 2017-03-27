<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos Personales <br />
<small class="subtitulo">Información personal del usuario</small>
</div>


<!-- Grupo de elementos-->




    <label for="inputPrimerNombre" class="col-lg-3 control-label">Primer Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" required>
    </div>


    <label for="inputSegundoNombre" class="col-lg-3 control-label">Segundo Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre">
    </div>

    <label for="inputPrimerApellido" class="col-lg-3 control-label">Primer Apellido</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido">
    </div>


    <label for="inputSegundoApellido" class="col-lg-3 control-label">Segundo Apellido</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido">
    </div>


    <label for="inputTercerApellido" class="col-lg-3 control-label">Casada</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="casada" placeholder="Casada">
    </div>


    <label for="inputCui" class="col-lg-3 control-label">Fecha de Nacimiento</label>
    <div class="col-lg-8">
         <input type="text" id="nacimiento" class="form-control" style="cursor:pointer" placeholder="Fecha de nacimiento" disalbed="false" >
    </div>


    <label for="inputCui" class="col-lg-3 control-label">No. De CUI</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="cui" placeholder="No. De CUI">
    </div>


    <label for="inputFotografia" class="col-lg-3 control-label">Fotografía</label>
    <div class="col-lg-8">
        <input type="file" class="form-control" id="fotografia">
    </div>


    <label for="inputFirma" class="col-lg-3 control-label">Firma</label>
    <div class="col-lg-8">
        <input type="file" class="form-control" id="firma">
    </div>

   <label for="inputFirma" class="col-lg-3 control-label">Genero</label>
    <div class="col-lg-8">
       <form action="" class="formulario">
          <div class="radio" >
     
            <input type="radio" name="sexo" id="genero_hombre">
            <label for="genero_hombre">Hombre</label>
        
            <input type="radio" name="sexo" id="genero_mujer">
            <label for="genero_mujer">Mujer</label>
        
          </div>
        </form>
    </div>

    <label for="inputFirma" class="col-lg-3 control-label">Activar</label>
    <div class="col-lg-8">
     
    <form action="" class="formulario">
      <div class="checkbox">
        <input type="checkbox" name="checkbox" id="activo">
        <label for="activo">Activo</label>
      </div>
    </form>
    </div>
    </div>




  

<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>

<div class="botones_1">
  <input type="button"  class="btn btn-success " style="float:right;padding:10px 16px" onclick="Guardar()" name="name" value="Guardar y continuar"> 
</div>
<div class="botones_2" style="display:none" >
   <a   class="btn btn-danger " style="float:right;padding:10px 16px" href="index_principal.php" >Salir</a>  
  <input type="button"  class="btn btn-info " style="float:right;padding:10px 16px" onclick="ver_modal(id_usuario);" name="name" value="Información Adicional"> 
  <input type="button"  class="btn btn-info " style="float:right;padding:10px 16px" onclick="Guardar()" name="name" value="Nuevo Usuario">
  
</div>


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>



<script type="text/javascript">

var nombre1,nombre2,apellido1,apellido2,casada,nacimiento,cui,genero,firma
var id_usuario

function validar(){
  nombre1         = document.getElementById('nombre1').value;
  nombre2         = document.getElementById('nombre2').value;
  apellido1       = document.getElementById('apellido1').value;
  apellido2       = document.getElementById('apellido2').value;
  casada          = document.getElementById('casada').value;
  nacimiento      = document.getElementById('nacimiento').value;
  cui             = document.getElementById('cui').value;
  genero_hombre   = document.getElementById('genero_hombre').checked;
  genero_mujer    = document.getElementById('genero_mujer').checked;
  activo          = document.getElementById('activo').checked;
  Firma           = document.getElementById('firma').value;


  if (nombre1==''){mensaje('Usuario','Ingrese el primer nombre','error',2000); return 0}
  if (apellido1==''){mensaje('Usuario','Ingrese el primer apellido','error',2000); return 0}
  if (nacimiento==''){mensaje('Usuario','Ingrese la fecha de nacimiento','error',2000); return 0}
  if (cui==''){mensaje('Usuario','Ingrese el CUI del usuario','error',2000); return 0}
  if (genero_hombre==false && genero_mujer==false ){mensaje('Usuario','Seleccione el genero del usuario','error',2000); return 0}
  return 1;
}



function Guardar(){
if (validar()==false){return 0;}

$('.bloqueo').show(0);
  factivo=0;
  if (genero_hombre==true){
    genero=1
  }
  if (genero_mujer==true){
    genero=2
  }
   if (activo==true){
    factivo=1;
  }

alert(firma);

		$.ajax({
		type:"POST",
		url: "includes/usuarios/usu_func.php",
		data: "tipo=GUARDAR&nombre1="+nombre1+"&nombre2="+nombre2+"&apellido1="+apellido1+
          "&apellido2="+apellido2+"&casada="+casada+"&nacimiento="+nacimiento+
          "&cui="+cui+"&genero="+genero+"&activo="+factivo+"&firma="+firma,
			success: function(resp){
        alert(resp);
        var resp = resp.split("|");
        $('.bloqueo').hide(0);

        if (resp[0]>=0){
          $('.botones_1').hide(0);
          $('.botones_2').show(0);
          id_usuario=resp[2];
          ver_modal(id_usuario);
          mensaje('Usuario',resp[1].trim() ,'success',4000); 
        }else{
          mensaje('Usuario',resp[1].trim(),'error',4000); 
        }
        

			}
		});

}

function ver_modal(usuario){
  pantalla_modal("Información Extra","includes/usuarios/usu_dat2.php?u="+usuario);
}

$( '#nacimiento' ).pickadate({  
  monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
  monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
  weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
  today: 'Hoy',
  clear: 'Limpiar',
  formatSubmit: 'dd/mm/yyyy',
  format:'dd/mm/yyyy',
  selectMonths: true,
  selectYears: true,
  selectYears: 80 
  }
)  
</script>
