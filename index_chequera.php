<?php include("plantilla.php");?>
<body>
	<div class="contenido_contenedor">
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="index_principal.php">Inicio</a></li>
			<li><a href="index_chequera.php">Nueva chequera</a></li>
				<?php
				if (isset($_GET['mod']) && $_GET['mod']==1){echo '<li class="active">Nueva Chequera</li>';}
				?>
		</ul>
		<div class="container-fluid">
			<div class="contenido_datos">
				<?php
					if (isset($_GET['mod']) && $_GET['mod']==1){include('includes/chequera/nueva_cheq.php');}
				?>
			</div>
		</div>
	</div>
</body>

<script>
cargar_material()
</script>
