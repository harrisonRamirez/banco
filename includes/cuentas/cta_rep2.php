<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-editor-attach-money"></span>
</div>
<div class="titulo">
Cuentas por Agencia <br />
<small class="subtitulo">Reporte de cuentas por agencia</small>
</div>


<?php
$sql = "SELECT  *  from cta_tip";
$result = odbc_exec($Conexiones , $sql);
?>



<table class="table">
	<tr>
		<td></td>
		<td><input type="button" style="float:right; " class="btn btn-success" name="name"  onclick="Generar()" value="Generar"></td>
	</tr>
</table>


<div class="" style="clear:both">

</div>




<div class="Pantalla_Modal_Cuadro">

</div>
<!--Evita que el cuadro de contorno quede recortado-->
<div class="" style="clear:both"></div>





<script type="text/javascript">
 cuenta='';


function Generar(){

	$.ajax({
		type:"POST",
		url: "includes/cuentas/cta_rep_det2.php",
			success: function(resp){
				$('.Pantalla_Modal_Cuadro').html(resp);
			}
	});
}



function cuentar(e){
  cuenta='';
  if (e.value.trim()!=''){
    
    document.getElementById(e.id+"t").innerHTML ='<img src="images/252.gif" alt="" />';
    $.ajax({
    type:"POST",
    url: "includes/transaccion_cheque/tra_chq_func.php",
    data: "tipo=CUENTA&cuenta="+e.value,
      success: function(resp){ 
        if (resp.trim()!=''){
           var resp = resp.split("|");  
            document.getElementById(e.id+"t").innerHTML =resp[1];

              cuenta=resp[0];               

          }else{
            document.getElementById(e.id+"t").innerHTML ='<i style="color:red">CUENTA NO EXISTENTE</i>';
          }
        }
      });
  }else{
    document.getElementById(e.id+"t").innerHTML ='';
  }
}



$( '#fecha1' ).pickadate({  
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
$( '#fecha2' ).pickadate({  
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
