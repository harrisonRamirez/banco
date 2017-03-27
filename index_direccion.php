<?php include("plantilla.php");?>
<body>
	<div class="contenido_contenedor">
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="index_principal.php">Direcciones</a></li>
				<?php
				if (isset($_GET['mod']) && $_GET['mod']==1){echo '<li class="active">Direcciones</li>';}
				?>
		</ul>
		<div class="container-fluid">
			<div class="contenido_datos">
				<?php
					if (isset($_GET['mod']) && $_GET['mod']==1){include('includes/direccion/dir_dat.php');}
				?>
			</div>
		</div>
	</div>
</body>





<script>
cargar_material()
</script>
