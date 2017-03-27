<?php include("plantilla.php");?>


<body>

	<div class="contenido_contenedor">
	<!--INDICA LA UBIACIÓN DEL LA PÁGINA-->
		<ul class="breadcrumb" style="margin-bottom: 5px;">
	    <li><a href="index_principal.php">Inicio</a></li>
	    <!-- <li><a href="javascript:void(0)">Library</a></li> -->
			<!-- CAMBIA LA INFORMACIÓN DE LA PÁGINA ACTUAL  -->
			<?php
			if (isset($_GET['mod']) &&  $_GET['mod']==1){	echo '<li class="active">Nuevo Tipo de Cuenta</li>';}
			?>

		</ul>

		<!-- <div class="alert alert-dismissable alert-warning" style="margin:0px">
	    <button type="button" class="close" data-dismiss="alert"  data-toggle="tooltip" data-placement="bottom" title="cerrar">×</button>
	    <h4>Alerta</h4>
	    <p>Es posible que el documento solicitado se encuentre en uso actualmente, vuelva a intentarlo más tarde.</p>
		</div> -->
		<div class="	 container-fluid">

					<div class="contenido_datos">
						<?php
						if (isset($_GET['mod']) && $_GET['mod']==1){ include('includes/agencias/cajas/caj_dat.php');}
						?>



			</div>

		</div>

	</div>



</body>





<script>
cargar_material()

</script>
