<?php
	$this->load->view('Complement/header');
    ?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">


<div id="main" role="main">
    <div id="ribbon">
        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"
                data-placement="bottom" data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <ol class="breadcrumb">
            <li>Evaluaciones</li>

        </ol>
    </div>

    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa-fw fa fa-graduation-cap"></i>
                    Listado-Preguntas Correctas Examen.
                </h1>

            </div>

        </div>

        <section id="widget-grid" class="">
            <div class="row">
                <article class="col-lg-11">
                    <div class="jarviswidget jarviswidget-color-darken">
                        <header>
                            <span class="widget-icon"> </span>
                            <h2> Listado-Preguntas Correctas Examen.</h2>
                        </header>
                        <div>
                            <div id="imprimir">
                                <div class="widget-body" id="calendarioExamen">
                                    <div class="row visibleCalendarioExamen">
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">


                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:auto">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Pregunta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach($listaExamen as $key => $item ) { ?>
                                                    <tr>
                                                        <td><?=($key+1)?></td>
                                                        <td><?=$item->GLPregunta;?>

                                                            <?php foreach($item->Respuestas as $key => $respuesta) : ?>
                                                            <?php if ($respuesta->LGCorrecta == 1) : ?>


                                                            <?=trim(strip_tags($respuesta->GLRespuesta,'<p><table><tr><td><th><tbody><tfoot><strong><u>'))?>


                                                            <?php endif;?>
                                                            <?php endforeach;?>

                                                        </td>
                                                    </tr>
                                                    <?php } ?>



                                                </tbody>
                                                </tfoot>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </article>
    </div>
    </section>
</div>
</div>


<!-- <script>
function imp(elemento){
  var ventana = window.open('', 'PRINT', 'height=400,width=600');
  ventana.document.write('<html><head><title>' + document.title + '</title>');
  ventana.document.write('</head><body >');
  ventana.document.write(elemento.innerHTML);
  ventana.document.write('</body></html>');
  ventana.document.close();
  ventana.focus();
  ventana.print();
  ventana.close();
  return true;
}

   



</script> -->

<!-- NAV VAR -->
<!-- <?php $this->load->view('Complement/footer');?> -->
<script src="<?=base_url();?>assets/js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?=base_url();?>assets/js/libs/AjaxUpload.2.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.js"></script> -->




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!--script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script-->
<script src="<?=base_url();?>assets/js/table-button.js"></script>


<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    });


    cargardatos()
});



function cargardatos() {


    //$("#respuesta").empty();
    var respuestas = (<?=json_encode($listaExamen)?>);
    console.log(respuestas);
    $.each(respuestas, function(index, item) {


        console.log(item)


        $("#respuesta").append("<tr>" +
            "<th>" + (index + 1) + "</th>" +
            "<th>" + item.GLPregunta + "</th>" +
            "<tr>");
    })


}
</script>

<!-- <script type="text/javascript">
$(document).on(function() {
    $('#tablita').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 de 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            'pdfHtml5'
        ]
    });
}); 

</script>-->


<script src="<?=base_url();?>assets/js/moment.min.js"></script>