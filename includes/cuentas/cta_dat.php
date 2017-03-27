<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos de la Cuenta <br />
<small class="subtitulo">Información general sobre la cuenta</small>
</div>


<?php
$sql = "SELECT  *  from cta_tip";
$result = odbc_exec($Conexiones , $sql);
?>

<!-- Grupo de elementos-->
<input type="hidden" class="form-control" id="inputText" placeholder="Usuario">

<div class="form-group">
    <label for="inputPrimerNombre" class="col-lg-3 control-label">Código Cliente</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="cliente" placeholder="Código del Cliente">
    </div>
</div>
<div class="form-group">
    <label for="inputSegundoNombre" class="col-lg-3 control-label">Tipo de Cuenta</label>
    <div class="col-lg-8">
      <div class="form-group">
              <select class="form-control" id="select">
                  <?php
                  do{
                    echo '<option onClick="seleccionar('.odbc_result($result,'id_tip').')">'.odbc_result($result,'nombre').'</option>';
                  }while(odbc_fetch_row($result));
                  ?>
              </select>
      </div>

    </div>
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
tipo=0;
function seleccionar(e){
  alert(e);
  tipo=e;
}
function Guardar(){
  var cliente=document.getElementById('cliente').value;

		$.ajax({
		type:"POST",
		url: "includes/cuentas/cta_fun.php",
		data:"tipo=1&cliente="+cliente+"&tipo_cta="+tipo,
			success: function(resp){
				$('.Pantalla_Modal_Cuadro').html(resp);
			}
		});
}

</script>
