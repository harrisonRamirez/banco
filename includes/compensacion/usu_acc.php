<!--Titulo-->
<?php
    $sql = "SELECT  acc_dat.*,count(rol_acc.id_rol) accesos from acc_dat left join rol_acc on acc_dat.id_acc =rol_acc.id_acc 
            group by acc_dat.id_acc,acc_dat.nombre,acc_dat.DESCRIPCION,acc_dat.ID_MOD,acc_dat.LINK,acc_dat.ACTIVO order by id_mod";
    $result = odbc_exec($Conexiones , $sql)
?>

<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
ACCESOS <br />
<small class="subtitulo">Información de los accesos</small>
</div>


<!-- Grupo de elementos-->



<table class="table table-striped table-hover">
    <tr>
      <th>NOMBRE</th>
      <th>DESCRIPCIÓN</th>
      <th>LINK</th>
      <th>NO. ROLES</th>
      <th>ACTIVO</th>
    </tr>

    <?php
      do{
        ?>
        <tr >
      
      <?php 
        echo '<td>'.odbc_result($result,'NOMBRE').'</td>';
        echo '<td>'.odbc_result($result,'DESCRIPCION').'</td>';
        echo '<td>'.odbc_result($result,'link').'</td>';
        echo '<td><span class="badge">'.odbc_result($result,'accesos').'</span></td>';
        echo '<td>
                 <form action="" class="formulario">
                  <div class="checkbox" onClick="activar_rol('."'".odbc_result($result,'ID_ACC')."'".');" style="cursor:pointer">
                    <input type="checkbox" name="checkbox" id="'.odbc_result($result,'ID_ACC').'" ';
                    if (odbc_result($result,'ACTIVO')==1){echo 'checked';}
        echo      '><label for="'.odbc_result($result,'ID_ACC').'">Activo</label>
                  </div>
                </form>
              ';
        echo '<a class="btn btn-primary">Editar</a>
              </td>';
        echo '</tr>';
      }while(odbc_fetch_row($result));
    ?>
   
</table>

  

<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<script type="text/javascript">

    function activar_rol(rol){
      // pantalla_modal("Información Extra","includes/usuarios/usu_dat2.php?u="+usuario);
    }

</script>
