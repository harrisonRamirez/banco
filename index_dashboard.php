<?php include("plantilla.php");?>


<body>

	<div class="contenido_contenedor">
	<!--INDICA LA UBIACIÓN DEL LA PÁGINA-->
		<ul class="breadcrumb" style="margin-bottom: 5px;">
	    <li><a href="index_principal.php">Inicio</a></li>
	    <li><a href="index_dashboard.php">Dashboard</a></li>
			<?php
			if (isset($_GET['mod']) && $_GET['mod']==1){	echo '<li class="active">Usuarios</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==2){	echo '<li class="active">Clientes</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==3){	echo '<li class="active">Empresas</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==4){	echo '<li class="active">Tipo de Cuenta</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==5){	echo '<li class="active">Agencia</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==6){	echo '<li class="active">Cajas</li>';}
			if (isset($_GET['mod']) && $_GET['mod']==99){	echo '<li><a>Base de Datos</a></li><li class="active">Historial de Instrucciones</li>';}
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
						if (isset($_GET['mod']) && $_GET['mod']==1){ include('includes/dashboard/dash_usu.php');}
						if (isset($_GET['mod']) && $_GET['mod']==2){ include('includes/dashboard/dash_cli.php');}
						if (isset($_GET['mod']) && $_GET['mod']==3){ include('includes/dashboard/dash_emp.php');}
						if (isset($_GET['mod']) && $_GET['mod']==4){ include('includes/dashboard/dash_tip_cta.php');}
						if (isset($_GET['mod']) && $_GET['mod']==5){ include('includes/dashboard/dash_age.php');}
						if (isset($_GET['mod']) && $_GET['mod']==6){ include('includes/dashboard/dash_caj.php');}
						if (isset($_GET['mod']) && $_GET['mod']==99){ include('includes/dashboard/dash_bd_sql.php');}
						if (isset($_GET['mod']) && $_GET['mod']==7){ include('includes/dashboard/dash_tra.php');}
						?>
						<?php
						//SI NO EXISTE NINGUN MOD SELECCIONADO SE MOSTRARA LO SIGUIENTE
						if (!isset($_GET['mod'])){?>
							<!--Titulo-->
							<div class="" style="float:left">
							  <span class="icono mdi-device-data-usage"></span>
							</div>
							<div class="titulo">
							Dashboard <br />
							<small class="subtitulo">Información General del Sistema</small>
							</div>

							<p>
								<a href="?mod=1">Usuarios</a>
							</p>
							<p>
								<a href="?mod=2">Clientes</a>
							</p>
							<p>
								<a href="?mod=3">Empresas</a>
							</p>
							<p>
								<a href="?mod=4">Tipo de Cuenta</a>
							</p>
							<p>
								<a href="?mod=5">Agencia</a>
							</p>
							<p>
								<a href="?mod=6">Cajas</a>
							</p>
							<h3>BASE DE DATOS</h3>
							<p>
								<a href="?mod=99">Historial SQL</a>
							</p>


						<?php }?>


			</div>

		</div>

	</div>



</body>





<script>

cargar_material()

</script>
