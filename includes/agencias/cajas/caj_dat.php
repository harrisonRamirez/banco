
<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Cajas <br />
<small class="subtitulo">Apertura de Cajas</small>
</div>

<!-- Grupo de elementos-->

<div class="form-group">
    <label for="inputAgencias" class="col-lg-3 control-label">Agencias</label>
    <div class="col-lg-8">
      <br />
      <?php 
          $sql = "SELECT nombre FROM age_dat";
          $result = odbc_exec($Conexiones , $sql);
          if ($result > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
          {
            ?>
            <select id="id_age">
              <option>Seleccione una Agencia</option>
              <?php
            do{
            echo '<option values="'.odbc_result($result,'id_age').'">'.odbc_result($result,'nombre').'</option>';
              }while(odbc_fetch_row($result));
          }
          else
          {
              echo "No hubo resultados";
          }
       ?>
       </select>
    </div>
</div>

<div class="form-group">
    <label for="inputNombre" class="col-lg-3 control-label">Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
    </div>
</div>
<div class="form-group">
         <label for="inputDescripcion" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-8">
        <input type="textarea" class="form-control" id="desc" placeholder="Descripción">
    </div>
</div>
<div class="form-group">
    <label for="inputCantMinima" class="col-lg-3 control-label">Cantidad Mínima</label>
    <div class="col-lg-8">
        <input type="number" class="form-control" id="can_min" placeholder="Cantidad Mínima">
    </div>
</div>
<div class="form-group">
    <label for="inputCantMaxima" class="col-lg-3 control-label">Cantidad Máxima</label>
    <div class="col-lg-8">
        <input type="number" class="form-control" id="can_max" placeholder="Cantidad Máximo">
    </div>
</div>
<div class="form-group">
         <label for="inputActivo" class="col-lg-3 control-label">Activo</label>
          <div class="col-lg-8">
            <br />
            <input type="checkbox" id="activo" value="0" />
          </div> 
</div>
<br>
<div class="" style="clear:both">
</div>
<input type="button" style="float:right; " class="btn btn-success " name="name"  onclick="Guardar()" value="Guardar">



<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>





<script type="text/javascript">

var id_age,nombre,desc,can_min,can_max,activo


function validar(){
  p_id_age = document.getElementById('id_age').options.selectedIndex;
  id_age  = document.getElementById('id_age').options[p_id_age].value;
  nombre  = document.getElementById('nombre').value;
  can_min = document.getElementById('can_min').value;
  can_max = document.getElementById('can_max').value;
  activo = document.getElementById('activo').value;

  if (p_id_age==''){mensaje('Caja','Seleccione una agencia','error',2000); return 0}
  if (nombre==''){mensaje('Caja','Ingrese el nombre','error',2000); return 0}
  if (can_min==''){mensaje('Caja','Ingrese la Cantidad Mínima','error',2000); return 0}
  if (can_max==''){mensaje('Caja','Ingrese la Cantidad Máxima','error',2000); return 0}
  return 1;
}


function Guardar(){
  if (validar()==false){return 0;}
    $.ajax({
    type:"POST",
    url: "includes/agencias/cajas/caj_dat_func.php",
    data:"tipo=1&p_id_age="+p_id_age+"&nombre="+nombre+"&desc="+desc+"&can_min="+can_min+"&can_max="+can_max+"&activo="+activo,
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
