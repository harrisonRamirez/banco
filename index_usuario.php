<?php include("plantilla.php");?>


<body>

	<div class="contenido_contenedor">
	<!--INDICA LA UBIACIÓN DEL LA PÁGINA-->
		<ul class="breadcrumb" style="margin-bottom: 5px;">
	    <li><a href="index_principal.php">Inicio</a></li>
	    <!-- <li><a href="javascript:void(0)">Library</a></li> -->
	    <li><a href="#">Usuarios</a></li>

			<!-- CAMBIA LA INFORMACIÓN DE LA PÁGINA ACTUAL  -->
			<?php
			if ($_GET['mod']==1){	echo '<li class="active">Nuevo</li>';}
			if ($_GET['mod']==2){	echo '<li class="active">Administrar</li>';}
			if ($_GET['mod']==3){	echo '<li class="active">Roles</li>';}
			
			?>

		</ul>

		<!-- <div class="alert alert-dismissable alert-warning" style="margin:0px">
	    <button type="button" class="close" data-dismiss="alert"  data-toggle="tooltip" data-placement="bottom" title="cerrar">×</button>
	    <h4>Alerta</h4>
	    <p>Es posible que el documento solicitado se encuentre en uso actualmente, vuelva a intentarlo más tarde.</p>
		</div> -->
		<div class="container-fluid">

					<div class="contenido_datos">
						<table width="100%">
							<tr>
								<td>
										<?php
										if ($_GET['mod']==1){ include('includes/usuarios/usu_dat.php');}
										if ($_GET['mod']==2){ include('includes/usuarios/usu_adm.php');}
										if ($_GET['mod']==3){ include('includes/usuarios/usu_rol.php');}
										if ($_GET['mod']==4){ include('includes/usuarios/usu_acc.php');}
										?>
								</td>
								<td width="200px" valign="top">
									<?php
										include('includes/usuarios/usu_info.php');										
									?>
								</td>
							</tr>

						</table>




					</div>

		</div>

	</div>



</body>

