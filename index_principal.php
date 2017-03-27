<?php include("plantilla.php");?>




<body>

	<div class="contenido_contenedor">
	<!--INDICA LA UBIACIÓN DEL LA PÁGINA-->
		<ul class="breadcrumb" style="margin-bottom: 5px;">
	    <li><a href="javascript:void(0)">Inicio</a></li>
	    <!-- <li><a href="javascript:void(0)">Library</a></li> -->
	    <li class="active">Ingreso de usuario</li>
		</ul>

		<!-- <div class="alert alert-dismissable alert-warning" style="margin:0px">
	    <button type="button" class="close" data-dismiss="alert"  data-toggle="tooltip" data-placement="bottom" title="cerrar">×</button>
	    <h4>Alerta</h4>
	    <p>Es posible que el documento solicitado se encuentre en uso actualmente, vuelva a intentarlo más tarde.</p>
		</div> -->
		<?php  if($age_codigo==''){?>
		<div class="alert alert-dismissable alert-danger" style="margin-top:0px; margin-bottom:0px">
		    <strong>OBLIGATORIO: </strong>SE DEBEN DE SELECCIONAR LA <B>AGENCIA</B>.
		</div>
		<?php } ?>
		
		<?php  if($caj_codigo==''){?>
		<div class="alert alert-dismissable alert-danger" style="margin-top:0px">
		    <strong>OBLIGATORIO: </strong>SE DEBEN DE SELECCIONAR LA <B>CAJA</B>.
		</div>
		<?php } ?>
			

		<div class="contenido_separado container-fluid">

				<div class="row">
			  	<div class="col-md-12 " >
					<div class="contenido_datos">
						<?php include('includes/general/gen_caj.php');?>
					</div>

				</div>
			</div>

			<div class="row">
			  	<div class="col-md-12 " style="padding-top:10px" >
					<div class="contenido_datos">
						<?php include('includes/general/gen_variables.php');?>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="padding-top:10px">
					<div class="contenido_datos">
						<?php include('gen_ico.php');?>
					</div>
				</div>
			</div>

		</div>

	</div>



</body>





<script>
// Codigo para visualizar la ayuda del contenedor
//  (function(){
//
//     var $button = $("<div id='source-button' class='btn btn-default btn-xs'> <span class='mdi-action-help' style='color:rgb(255, 84, 0)'></span></div>").click(function(){
//         var index =  $('.bs-component').index( $(this).parent() );
//         $.get(window.location.href, function(data){
//             var html = $(data).find('.bs-component').eq(index).html();
//             html = cleanSource(html);
//             $("#source-modal pre").text(html);
// 						$("#source-modal .modal-title").html('<span class="mdi-action-help" style="font-size:25px"></span> Ayuda');
//             $("#source-modal").modal();
//         })
//
//     });
//
//     $('.bs-component [data-toggle="popover"]').popover();
//     $('.bs-component [data-toggle="tooltip"]').tooltip();
//
//     $(".bs-component").hover(function(){
//         $(this).append($button);
//         $button.show();
//     }, function(){
//         $button.hide();
//     });
//
//     function cleanSource(html) {
//         var lines = html.split(/\n/);
//
//         lines.shift();
//         lines.splice(-1, 1);
//
//         var indentSize = lines[0].length - lines[0].trim().length,
//             re = new RegExp(" {" + indentSize + "}");
//
//         lines = lines.map(function(line){
//             if (line.match(re)) {
//                 line = line.substring(indentSize);
//             }
//
//             return line;
//         });
//
//         lines = lines.join("\n");
//
//         return lines;
//     }
//
//     $(".icons-material .icon").each(function() {
//         $(this).after("<br><br><code>" + $(this).attr("class").replace("icon ", "") + "</code>");
//     });
//
// })();

//modal.js   dist/js/modal.js
cargar_material()

</script>
