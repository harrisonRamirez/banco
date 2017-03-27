

function cargar_material(){

                $.material.init();
                $(".shor").noUiSlider({
                    start: 40,
                    connect: "lower",
                    range: {
                        min: 0,
                        max: 100
                    }
                });

                $(".svert").noUiSlider({
                    orientation: "vertical",
                    start: 40,
                    connect: "lower",
                    range: {
                        min: 0,
                        max: 100
                    }
                });

            };
//Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function carga_modal(icono,titulo,modulo,datos){
    $.get( modulo, datos ).done(function( data ) {
            $("#source-modal pre").html(data);
            $("#source-modal .modal-title").html('<span class="'+icono+'" style="font-size:25px"></span> '+titulo);
            $("#source-modal").modal();
             cargar_material()
  });
}
