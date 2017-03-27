<?php include("plantilla.php");?>
<body>
	<div class="contenido_contenedor">
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="index_principal.php">Inicio</a></li>
			<li><a href="index_agencia.php">Agencia</a></li>
				<?php
				if (isset($_GET['mod']) && $_GET['mod']==1){echo '<li class="active">Nuevo Agencia</li>';}
				if (isset($_GET['mod']) && $_GET['mod']==2){echo '<li class="active">Nueva Cuenta</li>';}
				?>
		</ul>
		<div class="container-fluid">
			<div class="contenido_datos">
				<?php
					if (isset($_GET['mod']) && $_GET['mod']==1){include('includes/agencias/age_dat.php');}
				?>
			</div>
		</div>
	</div>
</body>

<script>
cargar_material()
</script>
