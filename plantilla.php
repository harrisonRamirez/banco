<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include("plantilla_conexion.php");?>
<?php include("plantilla_seguridad.php");?>
<?php include("plantilla_verificar.php");?>


	<meta charset="utf-8">
	<head>
	<title>
		Proyecto Bancario
	</title>
	<link rel="stylesheet" href="estilos/estilo_principal.css">
	<link href="estilos/bootstrap.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="dist/js/jquery-1.11.3.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="dist/js/modal.js"></script>
		<script src="dist/js/tooltip.js"></script>
		<script src="dist/js/tab.js"></script>

				<!-- MENSAJE -->
				<script src="js/sweetalert-dev.js"></script>
				<link rel="stylesheet" href="ESTILOS/sweetalert.css">

				<link href="estilos/pnotify.custom.min.css" rel="stylesheet">
				<script src="js/pnotify.custom.min.js"></script>


				<script src="js/pagina.js"></script>

				<!-- DATE PICKER -->
				<script src="Extras/pickadate.js-3.5.3/lib/picker.js"></script>
			    <script src="Extras/pickadate.js-3.5.3/lib/picker.date.js"></script>
			    <script src="Extras/pickadate.js-3.5.3/lib/legacy.js"></script>
				<script src="Extras/pickadate.js-3.5.3/lib/picker.time.js"></script>
				<link rel="stylesheet" href="Extras/pickadate.js-3.5.3/lib/themes/default.css" id="theme_base">
				<link rel="stylesheet" href="Extras/pickadate.js-3.5.3/lib/themes/default.date.css" id="theme_date">

</head>

<script>
	function mensaje (titulo,mensaje,tipo){
	  PNotify.prototype.options.delay = 2000;
	  new PNotify({
	      title: titulo,
	      text: mensaje,
	      type: tipo,
	      icon: 'mdi-alert-error'

	  });
	}
	function pantalla_modal(titulo,pagina){
	    $('.modal').show(0);
	    $('.contenido-titulo').html(titulo)	;

		$(".contenido-dato").load(pagina,
			{valor1:'primer valor', valor2:'segundo valor'}, 
				function(response, status, xhr) {
					if (status == "error") {
						var msg = "Error!, algo ha sucedido: ";
						 $(".contenido-dato").html(msg + xhr.status + " " + xhr.statusText);
				}
			}
		);
	}
	function pantalla_modal_cerrar(){
		$('.contenido-titulo').html('')	;
		$(".contenido-dato").html('');
		$('.modal').hide(0);

	}
</script>


<!-- VENTANA DE MODAL PARA VISUALIZAR INFORMACIÓN EXTRA -->
<div class="modal">
	<div class="contenido">
		<div style="float:right; padding:10px; ">
			<span span class="mdi-navigation-close" style="cursor:pointer" onclick="pantalla_modal_cerrar()"></span>
		</div>

		<div class="contenido-titulo">
			
		</div>
		<div class="contenido-dato">
			<img src="images/252.gif" alt="" />
		</div>
	</div>
</div>
<!-- BLOQUEO DE LA PANTALLA PARA EL INGRESO DE INFORMACIÓN -->
<div class="bloqueo">
	<div class="mensaje">
		<div class="alert alert-default" style="color:rgb(121, 121, 121);font-size:18px;border-radius:8px;background-color:#fff" >
  		Procesando
		  <p>  </p>
		<img src="images/252.gif" alt="" />
  
		</div>

	</div>
</div>



	<!--BARRA LATERIAL-->
	<div class="contenido_superior">
			<!--NOTIFICACIONES-->
			<div class="notificaciones">
				<span class="mdi-device-data-usage" ></span>
				<a href="index_principal.php">
				<span style="	vertical-align: middle;display:inline-table;height:33px; margin-right:20px">Banco Chiquimula </span>
				</a>
				<span class="mdi-action-announcement" data-toggle="tooltip" data-placement="bottom" title="Informe de Eventos"></span>
				<span class="badge" style="background-color:rgba(199, 0, 0,1)">1</span>
				<span class="mdi-action-swap-vert" data-toggle="tooltip" data-placement="bottom" title="Conexión Base de datos"></span>
			</div>
			<div style="position:fixed; top:40px; right:0px; background-color:rgba(16, 62, 195, 0.9); padding:0px 10px 7px 20px; border-radius:0px 0px 0px 5px ">
			<span>
				

			</span>
				
			</div>
	</div>
	<div class="contenido_lateral">
		<?php include("plantilla_menu.php");?>
	</div>
