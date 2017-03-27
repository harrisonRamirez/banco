<!--Titulo-->
<?php
    $sql = "SELECT  id_emp,patente,nombre,ACTIVO,ID_USU
      from emp_dat";
    $result = odbc_exec($Conexiones , $sql)
?>

<div class="" style="float:left">
  <span class="icono mdi-action-account-circle"></span>
</div>
<div class="titulo">
Datos de las Empresas <br />
<small class="subtitulo">Información de las Empresas</small>
</div>


<!-- Grupo de elementos-->



<table class="table table-striped table-hover">
    <tr>
      <th>CODIGO</th>
	  <th>PATENTE DE COMERCIO</th>
      <th>NOMBRE</th>
	  <th>ACTIVO</th>
	  <th>ID_USU</th>
    </tr>

    <?php
      do{
        ?>
        <tr onClick="ver_modal('<?php echo odbc_result($result,'id_emp');?>');" style="cursor:pointer">
      
      <?php 
        echo '<td>'.odbc_result($result,'ID_emp').'</td>';
        echo '<td>'.odbc_result($result,'patente').'</td>';
        echo '<td>'.odbc_result($result,'NOMBRE').'</td>';
        echo '<td>'.odbc_result($result,'ACTIVO').'</td>';
		echo '<td>'.odbc_result($result,'id_usu').'</td>';
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


function ver_modal(id_emp){
  pantalla_modal("Información Extra","includes/empresas/emp_dat2.php?empresa="+id_emp);
}


