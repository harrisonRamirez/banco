<!--Titulo-->
<div class="" style="float:left">
  <span class="icono mdi-editor-attach-money"></span>
</div>
<div class="titulo">
Reporte de Cuentas <br />
<small class="subtitulo">Reporte del estado de cuentas</small>
</div>


<?php
$sql = "SELECT  *  from cta_tip";
$result = odbc_exec($Conexiones , $sql);
?>



<table class="table">
	<tr>
		<td>Cuenta</td>
		<td><input type="text"  class="form-control" id="cuenta"  onblur="cuentar(this);"> <span id="cuentat"></span></td>
    
	</tr>
	<tr>
		<td>Fecha</td>
		<td><input type="text"  class="form-control" id="fecha1" placeholder="Fecha Inicio" style="width:45%; float:left"> <input type="text"  class="form-control" id="fecha2" placeholder="Fecha Final"  style="width:45%; float:right;"></td>
	</tr>
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
  fecha1=document.getElementById('fecha1').value;
  fecha2=document.getElementById('fecha2').value;
  	
  if (cuenta==''){
  	alert("Debe de ingresar una cuenta");
  	return;
  }
  if (fecha1>fecha2){
  	alert("La fecha final no puede ser menor de la fecha inicial");
  	return;
  }


	$.ajax({
		type:"POST",
		url: "includes/cuentas/cta_rep_det.php",
		data:"cuenta="+cuenta+"&fecha1="+fecha1+"&fecha2="+fecha2,
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
