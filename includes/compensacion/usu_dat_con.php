<div class="clave_generada"></div>
<table width="100%" >
  <tr>
    <td>
      Contraseña
    </td>
    <td>
      <input type="password" class="form-control" id="con1" maxlength="10" placeholder="Contraseña">
    </td>
  </tr>
  <tr>
    <td>
      Confirmar Contraseña
    </td>
    <td>
      <input type="password" class="form-control" id="con2" maxlength="10" placeholder="Confirmar Contraseña">
    </td>
  </tr>

</table>

<table width="100%" class="table table-striped" >
  <tr>
    <td>
       <form action="" class="formulario">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="cambio">
            <label for="cambio">Requiere cambio</label>
          </div>
        </form>
    </td>
    <td>
            <form action="" class="formulario">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="con_activa">
            <label for="con_activa">Activo</label>
          </div>
        </form>
    </td>
    <td width="300px  ">
      <table width="100%">
        <tr>
          <td style="padding-right:10px" width="100px">
              Caducidad
          </td>
          <td>
            <input type="text" id="caduca" class="form-control" style="cursor:pointer" placeholder="Fecha de caducidad" disalbed="false" >

          </td>
        </tr>
      </table>
    </td>

  </tr>
</table>

<div class="alert alert-warning">
  Una contraseña almacenada no puede ser repetida otra vez
</div>

<!-- Simple checkbox with label -->


<input type="button" style="float:right" class="btn btn-success" name="name" onclick="contrasenna_guardar()" value="Guardar Cambios">
<input type="button" style="float:right" class="btn btn-primary" name="name" onclick="contrasenna_crear()" value="Generar Contraseña">
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>


<script type="text/javascript">

function contrasenna_crear(){
 var clave= password(10);
 document.getElementById('con1').value=clave
 document.getElementById('con2').value=clave
 document.getElementById('con_activa').checked=true
 document.getElementById('cambio').checked=true
    $('.clave_generada').html('<div class="alert alert-info"><b>Clave Generada: </b>'+clave+'</div>')
}

var clave1,clave2
function validar(){
  clave1=document.getElementById('con1').value;
  clave2=document.getElementById('con2').value;
  if (clave1!=clave2 || clave1=='' || clave2==''){
    return 0;
  }else{
    return 1;
  }
}

  function contrasenna_guardar(){
 if (validar()==0){mensaje('Usuario','Contraseñas incorrectas','error',4000); return 0;}
  var cambio=document.getElementById('cambio').checked;
  var activo=document.getElementById('con_activa').checked;
  if (cambio==true){scambio=1;}else{scambio=0;}
  if (activo==true){sactivo=1;}else{sactivo=0;}
  var caduca=document.getElementById('caduca').value;
  var usuario='<?php echo $id_usuario;?>';

  // $('.bloqueo').show(0);
    $.ajax({
      type:"POST",
      url: "includes/usuarios/usu_func.php",
      data:"tipo=CLAVE&usuario="+usuario+"&clave="+clave1+"&cambio="+scambio+"&caduca="+caduca+"&activo="+sactivo,
      async: false, cache:false,   //BLOQUEA PÁGINA MIENTRAS SE EJECUTA
        success: function(resp){
          var resp = resp.split("|");
            if (resp[0]>=0){
              mensaje('Usuario',resp[1].trim() ,'success',4000); 
            }else{
              mensaje('Usuario',resp[1].trim(),'error',4000); 
            }
        }
      });
  }


function password(length, special) {
  var iteration = 0;
  var password = "";
  var randomNumber;
  if(special == undefined){
      var special = false;
  }

  while(iteration < length){
    randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
    if(!special){
      if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
      if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
      if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
      if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
    }
    iteration++;
    password += String.fromCharCode(randomNumber);
  }
  return password;
}


$( '#caduca' ).pickadate({  
  monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
  monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
  weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
  today: 'Hoy',
  clear: 'Limpiar',
  formatSubmit: 'dd/mm/yyyy',
  format:'dd/mm/yyyy',
  selectMonths: true,
  selectYears: true,
  selectYears: 60 
  });


</script>