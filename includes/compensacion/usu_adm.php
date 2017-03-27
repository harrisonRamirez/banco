<!--Titulo-->
<?php
    $sql = "SELECT  id_usu,usuario, (APELLIDO1 ||' '|| APELLIDO2 || ' ' ||  DECODE(CASADA ,NULL,'',CASADA) ||', '|| NOMBRE1 ||' '|| NOMBRE2)NOMBRE
      from usu_dat";
    $result = odbc_exec($Conexiones , $sql)
?>

<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos Personales <br />
<small class="subtitulo">Información personal del usuario</small>
</div>


<!-- Grupo de elementos-->



<table class="table table-striped table-hover">
    <tr>
      <th>CODIGO</th>
      <th>USUARIO</th>
      <th>NOMBRE</th>
    </tr>

    <?php
      do{
        ?>
        <tr onClick="ver_modal('<?php echo odbc_result($result,'USUARIO');?>');" style="cursor:pointer">
      
      <?php 
        echo '<td>'.odbc_result($result,'ID_USU').'</td>';
        echo '<td>'.odbc_result($result,'USUARIO').'</td>';
        echo '<td>'.odbc_result($result,'NOMBRE').'</td>';
        echo '</tr>';
      }while(odbc_fetch_row($result));
    ?>
</table>

  

<!-- onClick ='carga_modal("icono mdi-action-account-circle","CONTRASEÑA","usu_con.php", { name: "John", time: "2pm" })' -->


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<!-- LIMITADOR -->
<div class="" style="clear:both"></div>


<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>



<script type="text/javascript">


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
  selectYears: 60 
  }
)  
</script>
