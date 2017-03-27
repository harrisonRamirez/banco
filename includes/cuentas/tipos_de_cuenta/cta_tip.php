
<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Tipos de Cuenta <br />
<small class="subtitulo">Creación de tipo de cuenta</small>
</div>

<!-- Grupo de elementos-->

<input type="hidden" class="form-control" id="usuario" value="1" />

<div class="form-group">
    <label for="inputNombre" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
    </div>
</div>
<div class="form-group">
         <label for="inputTiposRetiros" class="col-lg-3 control-label">Retiros permitidos</label>
          <div class="col-lg-8">
            <br />
            <input type="checkbox" id="ret_bol" value="0" /> Retiro con boleta <br />
            <input type="checkbox" id="ret_lib" value="0" /> Retiro con libreta<br />
            <input type="checkbox" id="ret_che" value="0" /> Retiro con cheque<br />
          </div> 
</div>
<div class="form-group">
         <label for="inputTiposDepositos" class="col-lg-3 control-label">Depositos permitidos</label>
          <div class="col-lg-8">
            <br />
            <input type="checkbox" id="dep_bol" value="0" /> Deposito con boleta <br />
            <input type="checkbox" id="dep_che" value="0" /> Deposito con cheque<br />
            <input type="checkbox" id="dep_efe" value="0" /> Deposito con efectivo<br />
          </div> 
</div>
<div class="form-group">
         <label for="inputTiposDepositos" class="col-lg-3 control-label">¿Obligatorio enlace a otra cuenta?</label>
          <div class="col-lg-8">
            <br />
            <select id="enl_cta">
                <option>Seleccione una opción</option>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
          </div> 
</div>
<div class="form-group">
    <label for="inputInteres" class="col-lg-3 control-label">Interes</label>
    <div class="col-lg-8">
      <br />
      <?php 
          $sql = "SELECT I.id_int, I.interes, TI.nombre FROM int_dat I , int_tip TI WHERE I.id_int_tip = TI.id_int_tip;";
          $result = odbc_exec($Conexiones , $sql);
          if ($result > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
          {
            ?>
            <select id="id_int">
              <option>Seleccione una opción</option>
              <?php
            do{
            echo '<option values="'.odbc_result($result,'id_int').'">'.odbc_result($result,'interes').' '.odbc_result($result,'nombre').'</option>';
              }while(odbc_fetch_row($result));
          }
          else
          {
              echo "No hubo resultados";
          }
       ?>
       </select>
    </div>
<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->

<br>
<div class="" style="clear:both">
</div>
<input type="button" style="float:right; " class="btn btn-success " name="name"  onclick="Guardar()" value="Guardar">



<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>





<script type="text/javascript">

var usuario,id_int,p_id_int,nombre,ret_bol,ret_lib,ret_che,dep_bol,dep_che,dep_efe,enl_cta


function validar(){
  usuario = document.getElementById('usuario').value;
  p_id_int = document.getElementById('id_int').options.selectedIndex;
  id_int  = document.getElementById('id_int').options[p_id_int].value;
  nombre  = document.getElementById('nombre').value;
  ret_bol = document.getElementById('ret_bol').value;
  ret_lib = document.getElementById('ret_lib').value;
  ret_che = document.getElementById('ret_che').value;
  dep_bol = document.getElementById('dep_bol').value;
  dep_che = document.getElementById('dep_che').value;
  dep_efe = document.getElementById('dep_efe').value;
  p_enl_cta = document.getElementById('enl_cta').options.selectedIndex;
  enl_cta = document.getElementById('enl_cta').options[p_enl_cta].value;

  if (nombre==''){mensaje('Tipo de cuenta','Ingrese el nombre','error',2000); return 0}
  if (p_enl_cta==''){mensaje('Tipo de cuenta','Ingrese un enlace si es necesario','error',2000); return 0}
  if (p_id_int==''){mensaje('Tipo de cuenta','Seleccione el interes','error',2000); return 0}
  return 1;
}


function Guardar(){
  if (validar()==false){return 0;}
    $.ajax({
    type:"POST",
    url: "includes/cuentas/tipos_de_cuenta/cta_tip_func.php",
    data:"tipo=1&usuario="+usuario+"&p_id_int="+p_id_int+"&nombre="+nombre+"&ret_bol="+ret_bol+"&ret_lib="+ret_lib+"&ret_che="+ret_che+"&dep_bol="+dep_bol+"&dep_che="+dep_che+"&dep_efe="+dep_efe+"&p_enl_cta="+p_enl_cta,
      success: function(resp){
        mensaje('Tipo de cuenta',resp,'success',4000);
      }
    });
}

/*function Guardar(){
  var usuario = document.getElementById('usuario').value;
  var id_int  = document.getElementById('id_int').options[p_id_int].value;
  var p_id_int = document.getElementById('id_int').options.selectedIndex;
  var nombre  = document.getElementById('nombre').value;
  var ret_bol = document.getElementById('ret_bol').value;
  var ret_lib = document.getElementById('ret_lib').value;
  var ret_che = document.getElementById('ret_che').value;
  var dep_bol = document.getElementById('dep_bol').value;
  var dep_che = document.getElementById('dep_che').value;
  var dep_efe = document.getElementById('dep_efe').value;
  var p_enl_cta = document.getElementById('enl_cta').options.selectedIndex;
  var enl_cta = document.getElementById('enl_cta').options[p_enl_cta].value;
  


$.ajax({
    type:"POST",
    url: "includes/cuentas/tipos_de_cuenta/cta_tip_func.php",
    data:"tipo=1&usario="+usario+"&id_int="+id_int+"&nombre="+nombre+"&ret_bol="+ret_bol+"&ret_lib="+ret_lib+"&ret_che="+ret_che+"&dep_bol="+dep_bol+"&dep_che="+dep_che+"&dep_efe="+dep_efe+"&p_enl_cta="+p_enl_cta,
      success: function(resp){
        $('.Pantalla_Modal_Cuadro').html(resp);
      }
    });
}*/

</script>
