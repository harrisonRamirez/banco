<!--Titulo-->
<?php
    $sql = "SELECT  * from rol_dat";
    $result = odbc_exec($Conexiones , $sql)
?>

<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Roles <br />
<small class="subtitulo">Información de los roles</small>
</div>


<!-- Grupo de elementos-->



<table class="table table-striped table-hover">
    <tr>
      <th>NOMBRE</th>
      <th>DESCRIPCIÓN</th>
      <th>ACTIVO</th>
    </tr>

    <?php
      do{
        ?>
        <tr >
      
      <?php 
        echo '<td>'.odbc_result($result,'NOMBRE').'</td>';
        echo '<td>'.odbc_result($result,'DESCRIPCION').'</td>';
        echo '<td>
                 <form action="" class="formulario">
                  <div class="checkbox" onClick="activar_rol('."'".odbc_result($result,'ID_ROL')."'".');" style="cursor:pointer">
                    <input type="checkbox" name="checkbox" id="'.odbc_result($result,'ID_ROL').'" ';
                    if (odbc_result($result,'ACTIVO')==1){echo 'checked';}
        echo      '><label for="'.odbc_result($result,'ID_ROL').'">Activo</label>

                   <input type="button" name="button" id=button_"'.odbc_result($result,'ID_ROL').'>
                   <label for="button_'.odbc_result($result,'ID_ROL').'">Editar</label>
                  </div>
                </form>
              </td>';

        echo '</tr>';
      }while(odbc_fetch_row($result));
    ?>
    <tr>
      <td></td>
      <td></td>
      <td>
        <input type="button" class="btn btn-success" value="Nuevo Rol">
      </td>
    </tr>
</table>

  

<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<script type="text/javascript">

    function activar_rol(rol){
      // pantalla_modal("Información Extra","includes/usuarios/usu_dat2.php?u="+usuario);
    }

</script>
